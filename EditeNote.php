<?php

$Level = $_GET["level"];
if ($Level === "") {
    header("Location:NoteEtudiant.php");
} else {
    require_once("connection.php");
    $stm = $conn->prepare("SELECT * FROM NoteEtudiant Where Classroom= :level ");
    $stm->bindParam(':level', $Level);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Etudiants </title>
</head>

<body>

    <section class="section1">
        <div class="container">
            <?php if (count($result) <= 0) {
                header("Location:NoteEtudiant.php");
            } else {  ?>
                <form action="UpdateNote.php" method="POST">
                    <table class="table display nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Student_Id</th>
                                <th scope="col">First_Name</th>
                                <th scope="col">Last_Name</th>
                                <th scope="col">Classroom</th>
                                <th scope="col">Dictation</th>
                                <th scope="col">Vocabulary</th>
                                <th scope="col">Expression</th>
                                <th scope="col">Pronunciation</th>
                                <th scope="col">Orale</th>
                                <th scope="col">Reading</th>
                                <th scope="col">Grammar</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $row): ?>
                            <tbody>
                                <tr>
                                    <td><input type="text" disabled style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Student_Id']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Nom]" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Nom']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Prenom]" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Prenom']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Classroom]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Classroom']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Dictation]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Dictation']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Vocabulary]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Vocabulary']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Expression]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Expression']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Pronunciation]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Pronunciation']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Orale]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Orale']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Reading]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Reading']); ?>"></input></td>
                                    <td><input type="text" name="students[<?= $row['Student_Id'] ?>][Grammar]" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Grammar']); ?>"></input></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php }; ?>

                    <button type="submit">Save</button>
                </form>

        </div>

    </section>

</body>

</html>