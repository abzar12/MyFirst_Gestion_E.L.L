<?php
try {
    require_once("connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code= $_POST['code'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $Telephone = $_POST['Telephone'];
    $Dure = $_POST['Dure'];
    $Pays = $_POST['Pays'];
    $stmt= $conn->prepare("UPDATE Inscription_Etudiant SET Nom=:Nom,  Prenom=:Prenom,  Email=:Email,  Telephone_Whatsapp=:Telephone,  Dure=:Dure, Pays=:Pays WHERE ID =:code");
    $stmt->bindValue(':code', $code);
    $stmt->bindValue(':Nom', $Nom);
    $stmt->bindValue(':Prenom', $Prenom);
    $stmt->bindValue(':Email', $Email);
    $stmt->bindValue(':Telephone', $Telephone);
    $stmt->bindValue(':Dure', $Dure);
    $stmt->bindValue(':Pays', $Pays);
    $stmt->execute();
    header("Location:dashbord.php?success=True");
    exit();
}
} catch (Throwable $th) {
    die("error de suppremetion: ".$th->getMessage());
}

?>