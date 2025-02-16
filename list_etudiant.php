<?php
session_start();
       

 try {
        $conn= new PDO ("mysql:host=localhost; dbname=Gestion_Eudiant", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare and execute the SQL query
        $stmt=$conn->prepare("SELECT * FROM Inscription_Etudiant");
        $stmt->Execute();
        $result=$stmp->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $th) {
       die("connection failed" .$th->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTE DES ETUDIANTS</title>
</head>
<body>
    <h2>the list of Studiant</h2>
    <?php if(count($result)>0);?>
    <table style="border:1px solid black;">
        <th >
            <td style="border:1px solid black; width:150px;">NOM</td>
            <td style="border:1px solid black; width:150px;">PRENOM</td>
            <td style="border:1px solid black; width:150px;">EMAIL</td>
        </th>
        <?php foreach($result as $row): ?>
        <tr>
            <td style="border:1px solid black; width:150px;"> <?= htmlspecialchars($row["ID"]);?> </td>
            <td style="border:1px solid black; width:150px;"> <?= htmlspecialchars($row["Nom"]);?> </td>
            <td style="border:1px solid black; width:150px;"> <?= htmlspecialchars($row["Prenom"]);?> </td>
            <td style="border:1px solid black; width:150px;"> <?= htmlspecialchars($row["Email"]);?> </td>
        </tr>
        <?php endforeach ; ?>
    </table> 
</body>
</html>