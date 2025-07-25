<?php
session_start();

try {
    require_once("connection.php");
    if (isset($_POST['logIn'])) {
        $Email = $_POST['EmailAD'];
        $password = $_POST['PasswordAD'];
        $stmt = $conn->prepare("select Id from users where Email= :Email and Password= :password ");
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            session_start();
            $_SESSION['user'] = $Email;
            $_SESSION["UserId"] = $user["Id"];
            header("Location:dashbord.php");
            exit();
        } else {
            $error[] = "Sorry, looks like that’s the wrong email or password.";
        }
    }
} catch (PDOException $th) {
    die("erreur de la connection" . $th->getMessage());
}
if (isset($_POST['signUp'])) {
    try {
        $Nom =trim($_POST['NomAD']);
        $Prenom =trim($_POST['PrenomAD']);
        $password =trim(password_hash($_POST['PasswordAD'], PASSWORD_BCRYPT, ['cost' => 12]));
        $Email =trim($_POST['EmailAD']);
        $Number =trim($_POST['NumberAD']);
        $Role =trim($_POST['RoleAD']);
        $error=[];
        if(empty($Nom) || empty($Prenom) || empty($password) || empty($Email) || empty($Number)){
            $error[]= "All fields are required";
            header("Location:".$_Server['PHP_SELF']);
            exit();
        }else{
            // Check if email exists using prepared statement
            $check = $conn->prepare("SELECT ID FROM users WHERE Email = ?");
            $check->execute([$Email]);

           if ($check->rowCount()> 0) {
               $_SESSION['message'] = "This email is already in use";
               header("Location: ".$_SERVER['PHP_SELF']);
               exit();
    }
        $stmt = $conn->prepare("insert into users (Nom, Prenom, Email, Number, Role, Password) VALUES(:Nom, :Prenom, :Email,:Number, :Role, :Password)");
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom', $Prenom);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Number', $Number);
        $stmt->bindParam(':Role', $Role);
        $stmt->bindParam(':Password', $password);
        $stmt->execute();
        if($stmt){
            echo ("<script>alert('Enregistrer')</script>");
        }else echo "error";
        header("Location: user.php");
    }
    } catch (Throwable $th) {
        die("eroror".$th->getMessage());
    }
}
$message= $_SESSION['message'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign-ELL-Up</title>
</head>
<body class="bg-[rgba(0,0,0,0.87)]">
    <div class="section flex w-[800px] ml-auto mr-auto  bg-white right-40 mt-10 rounded-lg border-2 border-black border-solid h-[600px]">
        <img src="img/logimag.jpg" alt="" class="bg-center bg-cover bg-no-repeat h-full rounded-lg bg-opacity-40">
        <form action="" method="POST" id="formsignUp" class="">
            <h1 class="ml-auto mr-auto text-center text-[25px] text-[rgb(0,120,4)] border-b-[rgb(0,120,4)] pt-9 border-b-2 w-60">SIGN UP</h1>
            <div class="container  m-5 p-3  md:w-[400px] :w-[350px] px-4 mx-auto ">
                <div class="ac_row p-2 g-4">
                    <div class="ac_col">
                        <input type="text" name="NomAD" placeholder="first name"  class="rounded-md border-b border-solid border-black w-full p-2 ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="text" name="PrenomAD" placeholder="last name"  class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <div style="color: red;"><?php echo $message ;?></div>
                        <input type="email" name="EmailAD" placeholder="your Email"  class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="password" name="PasswordAD" placeholder="password"  class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="text" name="NumberAD" placeholder="+233 XXXXXXXX"  class="rounded-md border-b border-solid border-black w-full p-2 ">
                    </div>
                    <p><?php if(!empty($error)){foreach($error as $errors){echo "<div style='color: red;'>$errors</div>";}} ;?></p>
                    
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <select id="role" name="RoleAD" class="rounded-md p-2 border-b border-solid border-black w-full pl-2   ">
                            <option value="Teacher">Teacher</option>
                            <option value="Staff">Admin</option>
                            <option value="Director">Director</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="signUp" class="ac_button w-[200px] border-2 rounded-md mt-5 relative right-0  p-1 pr-1 border-solid border-[rgba(0,120,5,0.468)] ml-[90px] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">sign up</button>
            </div>
        </form>
    </div>
</body>
</html>