<?php
session_start();
try {
    require_once("connection.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["forgot"])) {
        $email = $_POST["EmailAD"];
        $stmt = $conn->prepare("SELECT ID, Nom ,Prenom From users WHERE Email = ?");
        $stmt->execute(["$email"]);
        $userINFO = $stmt->fetch();
        if (!$userINFO ) {
            $_Eroor = "Sorry! no account associated with this email";
        } else {
            $_SESSION["token"] = bin2hex(random_bytes(3));
            $token = $_SESSION["token"];
            $_SESSION["expire"] = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $expires = $_SESSION["expire"];
            $stmt = $conn->prepare("INSERT INTO ResetPassword (Email, Token, expires_at) VALUES ( :email, :token :expire)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expire', $expires);
            try{
                $to = "$email";
                $subject= "ELL OTP OTP";
                $message = "Your code (OTP) is: $token avaible for 1 hour";
                $headers = "From: abzarcamara3.com";
                if(mail($to,$subject,$message,$headers)){
                    $_SESSION["email"] = $email;
                   header("Location:forgot-password-OTP.php");
                    exit();
                }
            }catch(PDOException $th){
                die("EMAIL ERROR" .$th->getMessage());
            }
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
                        <input type="email" name="EmailAD" placeholder="Your Email" class="font-merriweather w-full rounded-md border border-solid border-black  p-2   ">
                    </div>
                </div>
                <h1 class="m-0 border-0 text-red-900 text-[13px]"><?php echo $_Eroor; ?></h1>
            </div>
            <button type="submit " name="forgot" class="w-full border-2 rounded-md  mt-5 mb-[15px]  p-1 border-solid border-[rgba(0,120,5,0.468)]  bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Log In</button>
            <a href="login.php"><i class="fa-solid fa-arrow-left text-black "></i>
                Go back</a>
    </div>
    </form>
    </div>


</body>

</html>