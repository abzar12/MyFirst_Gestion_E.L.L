<?php
session_start();
require_once("connection.php");
 // getting the name of table;
       
if (isset($_POST['signUp'])) {
    try {
        if (isset($_GET['tableName'])) {
            $_SESSION['tableName'] = $_GET['tableName'];
        }
        
        // Utilisation de la session même si GET n’est plus là
        if (isset($_SESSION['tableName'])) {
            $tablename = $_SESSION['tableName'];
        } else {
            echo "<script> alert ('Aucune table sélectionnée.')</script>";
        }
        

        $Nom = trim($_POST['NomAD']);
        $Prenom = trim($_POST['PrenomAD']);
        $Email = trim($_POST['EmailAD']);
        $Number = trim($_POST['NumberAD']);
        $Birthday = trim($_POST['DateAD']);
        $Country = trim($_POST['CountryAD']);
        $error = [];
        if (empty($Nom) || empty($Prenom) || empty($Birthday) || empty($Email) || empty($Number)) {
            $error[] = "All fields are required";
            $_SESSION['error']= $error;
            header("Location:" .$_SERVER['PHP_SELF']);
            // if ($tableName === "Teacher") {
            //     header("Location: teacher.php?code=false");
            // }
            // if ($tableName === "Admin") {
            //     header("Location: administrateur.php?code=false");
            // }
            exit();
        } else {
            // Check if email exists using prepared statement
            $check = $conn->prepare("SELECT ID FROM $tablename WHERE Email = ?");
            $check->execute([$Email]);

            if ($check->fetch() >= 1) {
                $error[] = "This email is already in use";
                //echo $_SESSION['tableName'];
                 $_SESSION['error']= $error;

                 header("Location:" .$_SERVER['PHP_SELF']);
                // if ($tableName === "Teacher") {
                //     header("Location: teacher.php?code=true");
                //     exit();
                // }
                // if ($tableName === "Admin") {
                //     header("Location: administrateur.php?code=true");
                     exit();
                // }
            } else {
                $stmt = $conn->prepare("insert into $tablename (Nom, Prenom, Email, DateNaissance, Pays, Telephone) VALUES(:Nom, :Prenom, :Email, :Birthday, :Country, :Number)");
                $stmt->bindParam(':Nom', $Nom);
                $stmt->bindParam(':Prenom', $Prenom);
                $stmt->bindParam(':Email', $Email);
                $stmt->bindParam(':Birthday', $Birthday);
                $stmt->bindParam(':Country', $Country);
                $stmt->bindParam(':Number', $Number);
                $stmt ->execute();
                if ($tablename === "Teacher") {
                    header("Location: teacher.php?code=True");
                    exit();
                }
                if ($tablename === "Admin") {
                    header("Location: administrateur.php?code=True");
                    exit();
                }
            }
        }
    } catch (Throwable $th) {
        die("eroror" . $th->getMessage());
    }
}

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
    <title>Add Administrator</title>
</head>

<body class="bg-[rgba(0,0,0,0.87)]">
    <div class="section flex w-[800px] ml-auto mr-auto  bg-white right-40 mt-10 rounded-lg border-2 border-black border-solid h-[600px]">
        <img src="img/logimag.jpg" alt="" class="bg-center bg-cover bg-no-repeat h-full rounded-lg bg-opacity-40">
        <form action="" method="POST" id="formsignUp" class="">
            <h1 class="ml-auto mr-auto text-center text-[25px] text-[rgb(0,120,4)] border-b-[rgb(0,120,4)] pt-3 border-b-2 w-60">Administrator</h1>
            <div class="container  m-5 p-3  md:w-[400px] :w-[350px] px-4 mx-auto ">
                <div class="ac_row p-2 g-4">
                    <div class="ac_col">
                        <input type="text" name="NomAD" placeholder="first name" class="rounded-md border-b border-solid border-black w-full p-2 ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="text" name="PrenomAD" placeholder="last name" class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">


                        <input type="email" name="EmailAD" placeholder="your Email" class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="date" name="DateAD" placeholder="Birthday" class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>
                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="text" name="CountryAD" placeholder="Country" class="rounded-md border-b border-solid border-black w-full p-2   ">
                    </div>
                </div>

                <div class="ac_row p-2">
                    <div class="ac_col">
                        <input type="text" name="NumberAD" placeholder="+233 XXXXXXXX" class="rounded-md border-b border-solid border-black w-full p-2 ">
                    </div>
                </div>
                <a href="administrateur.php"> <i class="fa-solid fa-arrow-left text-black ml-5"></i>Go back</a>
                <p>
                    <?php if (!empty($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $e) {
        echo "<div style='color: red;'>$e</div>";
    }
    unset($_SESSION['error']);
}?></p>
                <button type="submit" name="signUp" class="ac_button w-[200px] border-2 rounded-md mt-5 relative right-0  p-1 pr-1 border-solid border-[rgba(0,120,5,0.468)] ml-[90px] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">sign up</button>
            </div>
        </form>
    </div>
</body>

</html>