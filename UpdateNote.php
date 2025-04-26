<?php 
require_once("connection.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $students = $_POST['students'] ?? [];
   
}
try {
    $stmt =$conn->prepare("UPDATE NoteEtudiant SET Nom= :FirsName, Prenom= :LastName, Classroom=:Classroom, Dictation= :Dictation, Vocabulary= :Vocabulary, Expression= :Expression, Pronunciation= :Pronunciation, Orale= :Orale, Reading= :Reading, Grammar= :Grammar WHERE Student_Id= :Student_Id");

foreach ($students as $studentId => $row) {
    $stmt->execute([
        ':Student_Id' => $studentId,
        ':FirsName' => $row['Nom'],
        ':LastName' => $row['Prenom'],
        ':Classroom' => $row['Classroom'],
        ':Dictation' => $row['Dictation'],
        ':Vocabulary' => $row['Vocabulary'],
        ':Expression' => $row['Expression'],
        ':Pronunciation' => $row['Pronunciation'],
        ':Orale' => $row['Orale'],
        ':Reading' => $row['Reading'],
        ':Grammar' => $row['Grammar'],
    ]);
    
}
} catch (\Throwable $th) {
   die("erreur d'enregistrement".$th->getMessage());
}

header("Location:NoteEtudiant.php?success=true");
?>