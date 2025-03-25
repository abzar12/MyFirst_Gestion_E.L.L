<?php

try {
    $conn = new PDO("mysql::host=localhost; dbname=Gestion_eudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    die("error de la connection" . $th->getMessage());
}
$code = $_GET['code'];
echo "je suis le code" . $code;
$stmt = $conn->prepare("SELECT*FROM Inscription_Etudiant WHERE ID=:code");
$stmt->bindValue(':code', $code);
$stmt->execute();
$ETUDIANT = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>

<body>
    <form action="modifier.php" method="POST">
        <table class="table display nowrap" id="Mytable" style="border: 1px solid black;">
                <?php foreach($ETUDIANT as $row) ?>
                <tr>
                    <th scope="col">CODE</th>
                    <td><input type="text" placeholder="Change de Values" name="code" value="<?= htmlspecialchars($row['ID']) ;?>"></td>
                </tr>
                <tr>
                    <th scope="col">First_Name</th>
                    <td><input type="text" placeholder="Change de Values" name="Nom" value="<?= htmlspecialchars($row['Nom']) ;?>"></td>
                </tr>
                <tr>
                    <th scope="col">Last_Name</th>
                    <td><input type="text" placeholder="Change de Values" name="Prenom" value="<?= htmlspecialchars($row['Prenom']) ;?>"></td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td><input type="text" placeholder="Change de Values" name="Email" value="<?= htmlspecialchars($row['Email']) ;?>"></td>
                </tr>
                <tr>
                    <th scope="col">WhatsApp</th>
                    <td><input type="text" placeholder="Change de Values" name="Telephone" value="<?= htmlspecialchars($row['Telephone_Whatsapp']) ;?>"></td>
                </tr>
                <tr>
                    <th scope="col">Duration</th>
                    <td><input type="text" placeholder="Change de Values" name="Dure" value="<?= htmlspecialchars($row['Dure']) ;?> "></td>
                </tr>
                <tr>
                    <th scope="col">Country</th>
                    <td><input type="text" placeholder="Change de Values" name="Pays" value="<?= htmlspecialchars($row['Pays']) ;?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit"  value="ENREGISTRER"></td>
                </tr>

    </form>
</body>

</html>