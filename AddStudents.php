<?php
session_start();
require_once("connection.php");

try {
  if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Save'])) {
    $Prenom = trim($_POST['Prenom']);
    $Nom = trim($_POST['Nom']);
    $Birthday = trim($_POST['Birthday']);
    $Email = trim($_POST['Email']);
    $Formation = trim($_POST['Formation']);
    $Classroom = trim($_POST['Classroom']);
    $Country = trim($_POST['Country']);
    $WhatsApp_Number = trim($_POST['WhatsApp_Number']);
    $Ghana_Number = trim($_POST['Ghana_Number']);
    $Duration = trim($_POST['Duration']);

    $error = [];
    if (empty($Prenom) || empty($Nom) || empty($Email) || empty($Formation) || empty($Classroom) || empty($Country) || empty($WhatsApp_Number)) {
      $error[] = "All field is required except Ghana Number";
    } else {
      $Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
// insertion de l'etudiant dans la table students 
      $stmt1 = $conn->prepare("insert into Students (Nom, Prenom, DateNaissance, Email, Country, TelephoneWhatsapp, TelephoneGhana, Class, Formation, Dure) values (:Nom, :Prenom, :Birthday, :Email, :Country,:TelephoneWhatsapp , :TelephoneGhana, :Classroom, :Formation, :Dure)");
      $stmt1->bindParam(':Nom', $Nom);
      $stmt1->bindParam(':Prenom', $Prenom);
      $stmt1->bindParam(':Birthday', $Birthday);
      $stmt1->bindParam(':Email', $Email);
      $stmt1->bindParam(':Country', $Country);
      $stmt1->bindParam(':TelephoneWhatsapp', $WhatsApp_Number);
      $stmt1->bindParam(':TelephoneGhana', $Ghana_Number);
      $stmt1->bindParam(':Classroom', $Classroom);
      $stmt1->bindParam(':Formation', $Formation);
      $stmt1->bindParam(':Dure', $Duration);
      $stmt1->execute();

      // selection l'etudiant enregistrer pour sauvegarder son class dans la table NoteEtudiant
      $stmt = $conn->prepare("SELECT ID, Class FROM Students WHERE Nom =:Nom AND Prenom =:Prenom AND TelephoneWhatsapp =:TelephoneWhatsapp ");
      $stmt->execute([
        ':Nom' => $Nom,
        ':Prenom' => $Prenom,
        ':TelephoneWhatsapp' => $WhatsApp_Number
      ]);
      // ID_ST c'est id de l'etudiant enregistrer 
      $Student_Id = $stmt->fetch();
      if($Student_Id){
        $stmt = $conn->prepare("insert into NoteEtudiant (ID_ST, Classroom ) values (:ID_ST, :Classroom)");
      $stmt->bindParam(':ID_ST', $Student_Id['ID']); 
      $stmt->bindParam(':Classroom', $Student_Id['Class']);
      $stmt->execute();
      }
      // apres inserer des etudiant dans la table Students et initialiser la note avec (ID_ST) qui est Id de l'etudiant et sa class dans la table NoteEtudiant;
      //donc on relier dans la table Even_ST_Note_Cl les deux champs ;
      // # 1 on doit recuperer ID de note dans la table NoteEtudiant;
      $stmt2 = $conn->prepare("SELECT ID_Note FROM NoteEtudiant WHERE ID_ST = :ID_ST");
      $stmt2->bindParam(':ID_ST', $Student_Id['ID']);
      $stmt2->execute();
      $ID_Note = $stmt2->fetch(); 
      if($ID_Note){
        // # 2 on doit recuperer ID de Class dans la table Classroom where Class_Name= $Student_Id['Class'];
      // Class_S
      $stmt = $conn->prepare("SELECT Class_ID FROM Classroom WHERE Class_Name = :Class_ST");// Class_ST=c'est la class de etudiant;
      $stmt->bindParam(':Class_ST', $Student_Id['Class']);
      $stmt->execute();
      $Class_ID = $stmt->fetch(); 
      $stmt = $conn->prepare("INSERT INTO Event_ST_Note_CL (ID_ST, ID_Note, ID_Class) 
                              VALUES(:ID_ST, :ID_Note, :ID_Class);
      ");
      $stmt->bindParam(':ID_ST', $Student_Id['ID']);
      $stmt->bindParam(':ID_Note', $ID_Note['ID_Note']);
      $stmt->bindParam(':ID_Class', $Student_Id['Class']);
      $stmt->execute(); 
        //foreach for students
      foreach ($Student_Id as $Student_key);
      echo "<script>alert('The Student has been saved successfully')</script>";
      }
      
      

    
    }
  }
} catch (PDOException $th) {
  die("ERROR" . $th->getMessage());
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Sign-ELL-Up</title>
</head>

<body class="bg-[rgba(0,0,0,0.87)] font-[Open-Sans]">
  <div class="section flex w-[620px] ml-auto mr-auto text-center bg-white right-40 mt-[100px] rounded-lg border-2 border-black border-solid h-[500px]">
    <form action="" method="POST" id="formsignUp" class="grid grid-cols-2 ">
      <div class="col-span-2 text-center mt-5">
        <label class="p-0 mt-5 font-[Lora] text-[25px] w-[150px] text-[rgb(0,120,4)] border-b-[rgb(0,120,4)]  border-b">Subscribe Student</label>
      </div>

      <div class="container   md:w-[300px] :w-[250px] px-4 mx-auto ">
        <div class="ac_row p-2">
          <div class="ac_col">
            <input type="text" name="Prenom" placeholder="first name" class="rounded-md border-b border-solid border-black w-full p-2 ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <input type="text" name="Email" placeholder="Email" class="rounded-md border-b border-solid border-black w-full p-2   ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <select id="role" name="Classroom" class="rounded-md p-2 border-b border-solid border-black w-full pl-2   ">
              <option value="">Classroom</option>
              <option value="1">Level 1</option>
              <option value="3">Level 3</option>
              <option value="2">Level 2</option>
              <option value="3">Level 3</option>
              <option value="4">Level 4</option>
              <option value="5">Level 5</option>
              <option value="6">Level 6</option>
              <option value="7">INTER 1</option>
              <option value="8">INTER 2</option>
              <option value="9">INTER 3</option>
              <option value="10">PROF 1</option>
              <option value="11">PROF 2</option>
              <option value="12">PROF 3</option>
            </select>
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <input type="text" name="WhatsApp_Number" placeholder="WhatsApp Number" class="rounded-md border-b border-solid border-black w-full p-2 ">
          </div>
        </div>
        <div class="col-span-2 ac_row p-2">
          <div class="ac_col">
            <input type="text" name="Duration" placeholder="1 months" class="rounded-md border-b border-solid border-black w-full p-2   ">
          </div>

        </div>
        <div class="ac_col text-left">
          <a href="etudiant.php"><i class="fa-solid fa-arrow-left text-black "></i> Go Back</a>
        </div>
      </div>
      <div class="container md:w-[300px] w-[250px] px-4 mx-auto ">
        <div class="ac_row p-2 ">
          <div class="ac_col">
            <input type="text" name="Nom" placeholder="last name" class="rounded-md border-b border-solid border-black w-full p-2 ">
          </div>
        </div>
        <div class="ac_row p-2 ">
          <div class="ac_col">
            <input type="date" name="Birthday" placeholder="Birthday" class="rounded-md border-b border-solid border-black w-full p-2 ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <select id="Formation" name="Formation" class="rounded-md p-2 border-b border-solid border-black w-full pl-2   ">
              <option value="">Formation</option>
              <option value="Class Normal">Class Normal</option>
              <option value="Class Intensif">Class Intensif</option>
              <option value="Professional Training ">Professional Training </option>
            </select>
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <select id="role" name="Country" class="rounded-md p-2 border-b border-solid border-black w-full pl-2   ">
              <option value="">Select Country</option>
              <option value="Mali">Mali</option>
              <option value="Niger">Niger</option>
              <option value="Guinée">Guinée</option>
              <option value="Togo">Togo</option>
              <option value="Sénégal">Sénégal</option>
              <option value="Bénin">Bénin</option>
              <option value="Cameroun">Cameroun</option>
              <option value="Coté d'ivoir">Coté d'ivoir</option>
              <option value="Tchad">Tchad</option>
              <option value="Congo">Congo</option>
              <option value="Gabon">Gabon</option>
              <option value="Congo(RDC)">Congo(RDC)</option>
            </select>
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col">
            <input type="text" name="Ghana_Number" placeholder="Ghana Number" class="rounded-md border-b border-solid border-black w-full p-2 ">
          </div>
        </div>
      </div>
      <label class="col-span-2 text-center">
        <?php if (!empty($error)) {
          foreach ($error as $errors) {
            echo "<div style='color: red;'>$errors</div>";
          }
        }; ?></label> <br>
      <div class="col-span-2 text-center">
        <button type="submit" name="Save" class=" w-[150px] border-2 rounded-md  mt-5 mb-5 p-1 pr-1 border-solid border-[rgba(0,120,5,0.468)] font-[Lora] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Save</button>
      </div>
    </form>
  </div>
</body>

</html>