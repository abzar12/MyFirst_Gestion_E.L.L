<?php
session_start();
try {
    require_once("connection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatePassword"])){
        $newPassword = $_POST["newpassword"];
        $Password = $_POST["password"];
        if($newPassword === $Password){
              $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
             $stmt = $conn->prepare("UPDATE users SET Password WHERE Email= :Email");
        $stmt->bindParam(':email', $_SESSION["email"]);
        $stmt->execute();
        unset($_SESSION['token']);
        unset($_SESSION['expire']);
        unset($_SESSION['email']);
        echo "<script>alert(✅ Passwords match. Proceeding with registration...)</script>";
        exit();
        }else{
           $eroor = "❌ Passwords do not match.";
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

<body class="bg-[rgba(0,0,0,0.87)] flex items-center justify-center h-screen">
    <div class="section flex w-[300px] md:w-auto bg-white right-40 rounded-lg border-2 border-black border-solid h-auto">
        <form action="" method="POST" id="formsignIn" class=" w-[300px] m-5">
            <h1 class="ml-auto mr-auto text-center text-2xl pt-4 text-[rgb(0,120,4)] border-b-[rgb(0,120,4)] border-b-2 w-52">RESET PASWORD</h1>
            <div class="container  ml-auto mr-aut   pt-5  mx-auto ">
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="password" name="newpassword" placeholder="New Password" class="mb-5  font-merriweather w-full rounded-md border border-solid border-black p-2   ">
                        <input type="password" name="password" placeholder="Confirm New Password" class="font-merriweather w-full rounded-md border border-solid border-black  p-2   ">
                    </div>
                </div>
                <h1 class="m-0 border-0 text-red-900 text-[13px]"><?php echo $eroor; ?></h1>
            </div>
            <button type="submit " name="updatePassword" class="w-full border-2 rounded-md  mt-5 mb-[15px]  p-1 border-solid border-[rgba(0,120,5,0.468)]  bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Update</button>
    </div>
    </form>
    </div>


</body>

</html>