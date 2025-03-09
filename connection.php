<?php
$conn= new PDO("mysql::host=localhost ; dbname=Gestion_Eudiant", "root", "");
try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException  $th){
    die("connexion error").$th->getMessage();
}
?>