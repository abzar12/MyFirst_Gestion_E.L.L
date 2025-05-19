<?php

try {
    require_once("connection.php");
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