<?php
session_start();
require_once("connection.php");
//get the code of colonne
$IdAdmin = $_GET['code'];
// get the Name of table
$TableName = $_GET["tableName"];
// select the previous table 
$stmt = $conn->prepare("SELECT * FROM $TableName WHERE ID=:id");
$stmt->bindParam(':id', $IdAdmin);
$stmt->execute();
$Result = $stmt->fetch(PDO::FETCH_ASSOC);
try {
    if (isset($_POST['modifyAdmin'])) {
        $IdAdmi = $_POST['IdAdmin'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $Email = $_POST['email'];
        $Birthday = $_POST['birthday'];
        $Country = $_POST['country'];
        $Number = $_POST['number'];

        $stmt = $conn->prepare("UPDATE $TableName SET Nom=:Nom, Prenom=:Prenom, Email=:Email, DateNaissance=:Birthday, Pays=:Country, Telephone=:Number WHERE ID= :ID ");
        $stmt->bindValue(':Nom', $firstName);
        $stmt->bindValue(':Prenom', $lastName);
        $stmt->bindValue(':Email', $Email);
        $stmt->bindValue(':Birthday', $Birthday);
        $stmt->bindValue(':Country', $Country);
        $stmt->bindValue(':Number', $Number);
        $stmt->bindValue(':ID', $IdAdmin);
        $stmt->execute();
        if ($TableName === "Teacher") {
            header("Location: teacher.php?success=True");
            exit();
        }
        if ($TableName === "Admin") {
            header("Location: administrateur.php?success=True");
            exit();
        }

    }
} catch (Throwable $th) {
    die("error de saisir:" . $th->getMessage());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="">ID_Admin:</label> <label for=""><?php echo $Result['ID']; ?></label>
        <input type="hidden" value="<?php echo $Result['ID']; ?>" name="IdAdmin"><br>
        <label for="">First Name :</label>
        <input type="text" value="<?php echo $Result['Nom']; ?>" name="firstname"><br>
        <label for="">Last Name :</label>
        <input type="text" value="<?php echo $Result['Prenom']; ?>" name="lastname"><br>
        <label for="">Email :</label>
        <input type="email" value="<?php echo $Result['Email']; ?>" name="email"><br>
        <label for="">Birthday :</label>
        <input type="text" value="<?php echo $Result['DateNaissance']; ?>" name="birthday"><label for=""> dd/mm/yyyy</label><br>
        <label for="">Country :</label>
        <input type="text" value="<?php echo $Result['Pays']; ?>" name="country"><br>
        <label for="">Number :</label>
        <input type="text" value="<?php echo $Result['Telephone']; ?>" name="number"><br>
        <button type="submit" name="modifyAdmin">Sauvegarder</button>
    </form>
</body>

</html>