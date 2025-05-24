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
    }
    $stmt = $conn->prepare("UPDATE NoteEtudiant SET Classroom = :Class_ET WHERE ID_ST = :ID") ;
            $stmt->bindParam(':Class_ET', $Classe);
            $stmt->bindParam(':ID', $IdStudent);
            $stmt->execute();
    if(!empty($Classe)){
        try {
            switch ($Classe){
                case 'Level 1': $Classe = 1;
                break;
                case 'Level 2': $Classe = 2;
                break;
                case 'Level 3': $Classe = 3;
                break;
                case 'Level 4': $Classe = 4;
                break;
                case 'Level 5': $Classe = 5;
                break;
                case 'Level 6': $Classe = 6;
                break;
                case 'INTER 1': $Classe = 7;
                break;
                case 'INTER 2': $Classe = 8;
                break;
                case 'INTER 3': $Classe = 9;
                break;
                case 'PROF 1': $Classe = 10;
                break;
                case 'PROF 2': $Classe = 11;
                break;
                case 'PROF 3': $Classe = 12;
                break;
            }
            $stmt = $conn->prepare("UPDATE Event_ST_Note_CL SET ID_Class = :Class_ET WHERE ID_ST = :ID") ;
            $stmt->bindParam(':Class_ET', $Classe);
            $stmt->bindParam(':ID', $IdStudent);
            $stmt->execute();
        } catch (\Throwable $th) {
            die("EROR WITH CLASSROOM".$th->getMessage());
        }
        header("Location:etudiant.php?success=True");
        exit();
    }else{
        echo "The value can not be NULL";
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edite Student</title>
</head>
<body>
<form action="" method="POST" class="section1 bg-gray-200 py-10 mx-auto overflow-x-auto text-sm">
                    <table class="table display nowrap   mx-10" id="myTable">
                        <thead >
                            <tr class="">
                                <th class="border" scope="col">Student_Id</th>
                                <th class="border" scope="col">Last_Name</th>
                                <th class="border" scope="col">First_Name</th>
                                <th class="border" scope="col">Birthday</th>
                                <th class="border" scope="col">Country</th>
                                <th class="border" scope="col">WhatsApp_Number</th>
                                <th class="border" scope="col">Number_Ghana</th>
                                <th class="border" scope="col">Classroom</th>
                                <th class="border" scope="col">Courses</th>
                                <th class="border" scope="col">Duration</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $row): ?>
                            <tbody>
                                <tr>
                                    <td class="border bg-red-200"><input type="text" name="ID" disabled style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['ID']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Nom" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Nom']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Prenom" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['Prenom']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="DateNaissance" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['DateNaissance']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Country" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Country']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="TelephoneWhatsapp" style="border: none; text-align:center; width:150px" value="<?= htmlspecialchars($row['TelephoneWhatsapp']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="TelephoneGhana" style="border: none; text-align:center; width:100px" value="<?= htmlspecialchars($row['TelephoneGhana']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Classe" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Class_Name']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Formation" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Formation']); ?>"></input></td>
                                    <td class="border bg-white"><input type="text" name="Dure" style="border: none; text-align:center; width:90px" value="<?= htmlspecialchars($row['Dure']); ?>"></input></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                        <h1><?php echo $Classe; ?></h1>
                        <button type="submit" class="w-20 border h-7 mb-3 border-[rgba(0,120,5,0.468)] ml-15 font-bold rounded-md cursor-pointer bg-[rgba(0,120,4,0.8)] text-white hover:bg-[rgb(0,120,4)]"><a href="etudiant.php">Cancel</a></button>
                    <button type="submit" class="w-20 border h-7 mb-3 border-[rgba(0,120,5,0.468)] ml-5 font-bold rounded-md cursor-pointer bg-[rgba(0,120,4,0.8)] text-white hover:bg-[rgb(0,120,4)]" name="UpdateStudent">Save</button>
                </form>
</body>
</html>