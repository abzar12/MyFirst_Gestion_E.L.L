<?php

try {
    $conn = new PDO("mysql::host=localhost; dbname=Gestion_eudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException  $th) {
    die("error de la connection" . $th->getMessage());
}
try {
    $code = $_GET['code'];
$stmt = $conn->prepare("DELETE FROM Inscription_Etudiant WHERE ID=:id");
$stmt->bindValue(':id', $code);
$stmt->execute();
header("Location:dashbord.php");
} catch (\Throwable $thc) {
    die("error de la supprimetion" . $thc->getMessage());
}

?>