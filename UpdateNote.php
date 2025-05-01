<?php 
require_once("connection.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $students = $_POST['students'] ?? [];
   
}
try {
    $stmt =$conn->prepare("UPDATE NoteEtudiant SET Dictation= :Dictation, Vocabulary= :Vocabulary, Expression= :Expression, Pronunciation= :Pronunciation, Orale= :Orale, Reading= :Reading, Grammar= :Grammar WHERE Student_Id= :Student_Id");

foreach ($students as $studentId => $row) {
    $stmt->execute([
        ':Student_Id' => $studentId,
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