<?php

use PSpell\Dictionary;

$Level = $_GET["level"];
if ($Level === "") {
    header("Location:NoteEtudiant.php");
    exit();
} else {
    try{
         require_once("connection.php");
    $stm = $conn->prepare("SELECT NoteEtudiant.ID_ST, Students.Nom, Students.Prenom, Students.Classe,
                                  NoteEtudiant.Dictation, NoteEtudiant.Vocabulary, NoteEtudiant.Expression, NoteEtudiant.Pronunciation,
                                  NoteEtudiant.Orale, NoteEtudiant.Reading, NoteEtudiant.Grammar, NoteEtudiant.Moyenne
                                  From Students
                                  JOIN NoteEtudiant on Students.ID = NoteEtudiant.ID_ST
                            Where NoteEtudiant.Classroom = :level ");
    $stm->bindParam(':level', $Level);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $th){
        die("DATA BASE CAN'T DISPLAY".$th->getMessage());
    }
   
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="styleNote.css">
    <title>Modification des Etudiants </title>
</head>

<body>

    <section class="section1 bg-gray-200 py-10 ">
        <div class="container px-5 w-auto m-auto ">
            <?php if (count($result) <= 0) {
                header("Location:NoteEtudiant.php");
            } else {  ?>
                <form action="UpdateNote.php" method="POST" class="flex justify-center mx-auto  text-sm">
                    <div class=" overflow-x-auto">
                        <table class="table " id="myTable">
                            <thead>
                                <tr class="">
                                    <th class="border" scope="col">Student_Id</th>
                                    <th class="border" scope="col">First_Name</th>
                                    <th class="border" scope="col">Last_Name</th>
                                    <th class="border" scope="col">Classroom</th>
                                    <th class="border" scope="col">Dictation</th>
                                    <th class="border" scope="col">Vocabulary</th>
                                    <th class="border" scope="col">Expression</th>
                                    <th class="border" scope="col">Pronunciation</th>
                                    <th class="border" scope="col">Orale</th>
                                    <th class="border" scope="col">Reading</th>
                                    <th class="border" scope="col">Grammar</th>
                                </tr>

                            </thead>
                            <?php foreach ($result as $row): ?>

                                <tbody>

                                    <tr>
                                        <td><input class=" border" type="text" disabled style="text-align:center; width:100px" value="<?= htmlspecialchars($row['ID_ST']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" disabled  name="students[<?= $row['ID_ST'] ?>][Nom]" style="text-align:center; width:119px" value=" <?= htmlspecialchars($row['Nom']); ?> "></input></td>
                                        <td><input class="border border-b" type="text" disabled  name="students[<?= $row['ID_ST'] ?>][Prenom]" style="text-align:center; width:115px" value="<?= htmlspecialchars($row['Prenom']); ?>"></input></td>
                                        <td><input  class="border border-b" type="text" disabled  name="students[<?= $row['ID_ST'] ?>][Classe]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Classe']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Dictation]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Dictation']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Vocabulary]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Vocabulary']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Expression]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Expression']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Pronunciation]" style="text-align:center; width:100px" value="<?= htmlspecialchars($row['Pronunciation']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Orale]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Orale']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Reading]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Reading']); ?>"></input></td>
                                        <td><input class="border border-b" type="text" name="students[<?= $row['ID_ST'] ?>][Grammar]" style="text-align:center; width:90px" value="<?= htmlspecialchars($row['Grammar']); ?>"></input></td>
                                    <tr>
                                    <tr>
                                        <th>SOMME = </th>
                                        <td style="text-align:center; width:100px">
                                            <?php
                                            $note = [
                                                $row['Dictation'] ?? 00,
                                                $row['Vocabulary'] ?? 00,
                                                $row['Expression'] ?? 00,
                                                $row['Pronunciation'] ?? 00,
                                                $row['Orale'] ?? 00,
                                                $row['Reading'] ?? 00,
                                                $row['Grammar'] ?? 00
                                            ];
                                            $sommeNote = array_sum($note);
                                            $note =$sommeNote / 7;
                                             $MoyenneNote = round($note, 4);
                                             echo $sommeNote;
                                            // $idEtudiant = $row['ID_ST'];
                                            // try {
                                            //     $stmt = $conn->prepare("UPDATE NoteEtudiant SET Moyenne = :moyenne WHERE ID_ST = :id");
                                            //     $stmt->execute([
                                            //         'moyenne' => $MoyenneNote,
                                            //         'id' => $idEtudiant
                                            //     ]);
                                            // } catch (PDOException $e) {
                                            //     echo "Erreur lors de la mise à jour : " . $e->getMessage();
                                            // }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-[90px]">MOYENNE = </th>
                                        <td class="w-[50px]"><?= htmlspecialchars($MoyenneNote); ?></td>
                                    </tr>

                                </tbody>

                            <?php endforeach; ?>

                        <?php }; ?>
                    </div>
                    <button type="submit" class="w-20 border h-7 mb-3 border-[rgba(0,120,5,0.468)] font-bold rounded-md cursor-pointer bg-[rgba(0,120,4,0.8)] text-white hover:bg-[rgb(0,120,4)]">Save</button>

                </form>

        </div>

    </section>

</body>

</html>