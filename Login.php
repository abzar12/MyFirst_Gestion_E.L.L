<?php
session_start();
try {
  $conn = new PDO("mysql::host=localhost ; dbname=Gestion_Eudiant", 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST['logIn'])) {
    $Email = $_POST['EmailAD'];
    $password = $_POST['PasswordAD'];
    //trouver utilisateur
    $stmt = $conn->prepare("SELECT Id, Password FROM users WHERE Email = ? ");
    $stmt->execute([$Email]);
    $user =$stmt->fetch();

    if($user && password_verify($password, $user['Password'])) {
       $_SESSION["UserId"] = $user["Id"];
      header("Location:dashbord.php");
    } else {
      $error="Sorry, looks like that’s the wrong email or password.";
    }
  }
} catch (PDOException $th) {
  die("erreur de la connection" . $th->getMessage());
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>log-ELL-in</title>
</head>
<body class="bg-[rgba(0,0,0,0.87)]">
    <div class="section flex w-[600px] ml-auto mr-auto mt-[140px] bg-white right-40 rounded-lg border-2 border-black border-solid h-[450px]">
        <img src="img/logimag.jpg" alt="" class="bg-center bg-cover bg-no-repeat h-full rounded-lg bg-opacity-40">
        <form action="" method="POST" id="formsignIn" class=" w-[300px] m-5">
           <h1 class="ml-auto mr-auto text-center text-[25px] pt-4 text-[rgb(0,120,4)] border-b-[rgb(0,120,4)] border-b-2 w-40">LOG IN</h1>
            <div class="container  ml-auto mr-aut   pt-5  mx-auto ">
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="email" name="EmailAD" placeholder="Email" class="font-merriweather w-full rounded-md border-b border-solid border-black  p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="password" name="PasswordAD" placeholder="password" class="rounded-md w-full border-b border-solid border-black  p-2   ">
                    </div>
                </div>
                <a href="forget.php" class=""><button type="button">forgot password?</button></a>
                <h1 class="m-0 border-0 text-red-900 text-[13px]"><?php echo $error; ?></h1>
            </div>
            <button type="submit " name="logIn" class="w-full border-2 rounded-md  mt-5 mb-[60px]  p-1 border-solid border-[rgba(0,120,5,0.468)]  bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Log In</button>
            <a href="Accueil.php" ><i class="fa-solid fa-arrow-left text-black "></i>
            Go to home page</a>
    </div>
    </form>
    </div>

    
</body>
</html>