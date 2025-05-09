<?php 
session_start();
require_once("connection.php");
$IdStudent = $_GET['code'];
$stmt= $conn->prepare("SELECT Students.*, Classroom.Class_Name
                       FROM Students 
                       JOIN NoteEtudiant ON  Students.ID = NoteEtudiant.ID_ST
                       JOIN Event_ST_Note_CL ON  NoteEtudiant.ID_Note = Event_ST_Note_CL.ID_Note
                       JOIN Classroom ON  Event_ST_Note_CL.ID_Class = Classroom.Class_ID
                       WHERE Students.ID = :Id");
$stmt->bindParam(':Id',$IdStudent);
$stmt->execute();
$result=$stmt->fetchAll();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['UpdateStudent'])){
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Birthday = $_POST['DateNaissance'];
    $Country = $_POST['Country'];
    $TelWhatsapp = $_POST['TelephoneWhatsapp'];
    $Formation = $_POST['Formation'];
    $TelGhana = $_POST['TelephoneGhana'];
    $Classe = $_POST['Classe'];
    $Dure = $_POST['Dure'];

    if(!empty($Nom) && !empty($Prenom) && !empty($Birthday) && !empty($Country) && !empty($TelWhatsapp) && !empty($Formation) && !empty($TelGhana) && !empty($Dure)){
        $stmt = $conn->prepare("UPDATE Students SET Nom = :Nom, Prenom = :Prenom, DateNaissance = :Birthday, Country = :Country, TelephoneWhatsapp = :TelWhatsapp, TelephoneGhana = :TelGhana, Formation = :Formation, Dure = :Dure WHERE ID= :ID");
    $stmt->bindParam(':ID',$IdStudent);
    $stmt->bindParam(':Nom',$Nom);
    $stmt->bindParam(':Prenom',$Prenom);
    $stmt->bindParam(':Birthday',$Birthday);
    $stmt->bindParam(':Country',$Country);
    $stmt->bindParam(':TelWhatsapp',$TelWhatsapp);
    $stmt->bindParam(':TelGhana',$TelGhana);
    /*$stmt->bindParam(':Classe',$Classe);*/
    $stmt->bindParam(':Formation',$Formation);
    $stmt->bindParam(':Dure',$Dure);
    $stmt->execute();
    header("Location:etudiant.php?success=True");
    exit();
    }
    if(!empty($Classe)){
        $stmt = $conn->prepare("UPDATE Event_ST_Note_CL SET ID_Class = :Class_ET WHERE ID_ST = :ID") ;
        $stmt->bindParam(':Class_ET', $Classe);
        $stmt->bindParam('ID', $IdStudent);
        $stmt->execute();
        header("Location:etudiant.php?success=True");
        exit();
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite Student</title>
</head>
<body>
<form action="" method="POST">
                    <table class="table display nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Student_Id</th>
                                <th scope="col">Last_Name</th>
                                <th scope="col">First_Name</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Country</th>
                                <th scope="col">WhatsApp_Number</th>
                                <th scope="col">Number_Ghana</th>
                                <th scope="col">Classroom</th>
                                <th scope="col">Courses</th>
                                <th scope="col">Duration</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $row): ?>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="ID" disabled style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['ID']); ?>"></input></td>
                                    <td><input type="text" name="Nom" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Nom']); ?>"></input></td>
                                    <td><input type="text" name="Prenom" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Prenom']); ?>"></input></td>
                                    <td><input type="text" name="DateNaissance" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['DateNaissance']); ?>"></input></td>
                                    <td><input type="text" name="Country" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Country']); ?>"></input></td>
                                    <td><input type="text" name="TelephoneWhatsapp" style="border: none; text-align:center; width:150px" value="<?= htmlspecialchars($row['TelephoneWhatsapp']); ?>"></input></td>
                                    <td><input type="text" name="TelephoneGhana" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['TelephoneGhana']); ?>"></input></td>
                                    <td><input type="text" name="Classe" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Class_Name']); ?>"></input></td>
                                    <td><input type="text" name="Formation" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Formation']); ?>"></input></td>
                                    <td><input type="text" name="Dure" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Dure']); ?>"></input></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <button type="submit" name="UpdateStudent">Save</button>
                </form>
</body>
</html>