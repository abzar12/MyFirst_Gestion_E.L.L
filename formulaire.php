<?php
session_start();
require_once("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";


try {
  if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Save'])) {
    $Prenom = trim($_POST['prenom']);
    $Nom = trim($_POST['nom']);
    $Birthday = trim($_POST['date']);
    $Email = trim($_POST['email']);
    $Formation = trim($_POST['formation']);
    $Langue = trim($_POST['langue']);
    $Country = trim($_POST['pays']);
    $WhatsApp_Number = trim($_POST['telWhatsapp']);
    $Number = trim($_POST['tel']);
    $Duration = trim($_POST['dure']);
    $Depart = trim($_POST['mois']);
    $Ville = trim($_POST['ville']);

    $error = [];
    if (empty($Prenom) || empty($Nom) || empty($Email) || empty($Formation) || empty($Ville) || empty($Country) || empty($WhatsApp_Number) || empty($Duration)) {
      $error[] = "All field is required except Ghana Number";
    } else {
      $Email = filter_var($Email, FILTER_SANITIZE_EMAIL);

      $stmt = $conn->prepare("insert into Inscription_Etudiant (Nom, Prenom, Email, Formation, Telephone, Telephone_Whatsapp, Date_Naissance, Dure, Langue, Ville, Pays, Date_Depart) values (:Nom, :Prenom, :Email, :Formation, :Telephone, :Telephone_Whatsapp, :Birthday, :Dure, :Langue, :Ville, :Country, :Depart)");
      $stmt->bindParam(':Nom', $Nom);
      $stmt->bindParam(':Prenom', $Prenom);
      $stmt->bindParam(':Email', $Email);
      $stmt->bindParam(':Formation', $Formation);
      $stmt->bindParam(':Telephone', $Number);
      $stmt->bindParam(':Telephone_Whatsapp', $WhatsApp_Number);
      $stmt->bindParam(':Birthday', $Birthday);
      $stmt->bindParam(':Dure', $Duration);
      $stmt->bindParam(':Langue', $Langue);
      $stmt->bindParam(':Ville', $Ville);
      $stmt->bindParam(':Country', $Country);
      $stmt->bindParam(':Depart', $Depart);
      $stmt->execute();

      // send message unsing Gmail on a director acount
      $mail = new PHPMailer(true);
      try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "abzarcamara9@gmail.com";
        $mail->Password = "xbdmdaftrkaweupi";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = "587";

        $mail->setFrom("testELL@test.com", "Moussa");
        $mail->addAddress("abzarcamara9@gmail.com", "Abzar");

        //Content
        $mail->Subject = "New Student";
        $mail->Body    = "Good Morning Abzar Camara you have a new student : $Nom $Prenom\n" .
          "Email: $Email";

        $mail->send();
      } catch (Exception $th) {
        die("MESSAGE COULDN'T BE SEND, ERROR" . $th->getMessage());
      }

      try {

        $stmt = $conn->query("select Id from users WHERE Role =  'Staff' ");
        $Result = $stmt->fetch(PDO::FETCH_ASSOC);
        $Director = $Result['Id'];
        $message = "un nouveau étudiant $Nom $Prenom avec un Email de : $Email a été inscrit";
        $req = "insert into Message (Id_Admin, ID_ET, Email, Message) values(:ID_Admin , :Nom, :Email, :Message)";
        $stmt = $conn->prepare($req);
        $Nom_Prenom_ET = $Nom . " " . $Prenom;
        $stmt->bindParam(':ID_Admin', $Director);
        $stmt->bindParam(':Nom', $Nom_Prenom_ET);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Message', $message);
        $stmt->execute();
      } catch (Exception $th) {
        die("MESSAGE COULDN'T BE SEND, ERROR" . $th->getMessage());
      }


      // $stmt = $conn->prepare("SELECT ID FROM Students WHERE Nom =:Nom AND Prenom =:Prenom AND TelephoneWhatsapp =:TelephoneWhatsapp ");
      // $stmt->execute([
      //   ':Nom' => $Nom,
      //   ':Prenom' => $Prenom,
      //   ':TelephoneWhatsapp' => $WhatsApp_Number
      // ]);
      // $Student_Id = $stmt->fetch();
      // foreach ($Student_Id as $Student_key);
      // $stmt = $conn->prepare("insert into NoteEtudiant (Student_Id, Nom , Prenom, Classroom ) values (:ID, :Nom , :Prenom, :Classroom)");
      // $stmt->bindParam(':ID', $Student_key);
      // $stmt->bindParam(':Nom', $Nom);
      // $stmt->bindParam(':Prenom', $Prenom);
      // $stmt->bindParam(':Classroom', $Classroom);
      // $stmt->execute();
      echo "<script>alert('The Student has been saved successfully')</script>";
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
  </body>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="navbar.css">
  <title>Sign-ELL-Up</title>
</head>

<body class=" bg-gray-900 font-[Open-Sans]">
  <header class="banner text-white bg-[url(img/1f38ebb7-32f8-414a-a395-c0a9df5982e6.JPG)] bg-center repeat-none h-[450px] w-full bg-cover">
    <nav class="z-1">
      <div class="ac-navbar h-[35px] bg-[rgb(0,0,0,0.5)] backdrop-blur-[3] h-[55px] text-[16px] container-fluid flex align-center m-auto justify-between items-center pl-3 pr-3 ">
        <a class="Logo navbar-brand uppercase align-center" href="Accueil.php"><span>E.L.L</span></a>
        <div class="">
          <i class="text-white button_toggel border border-white p-1  jutify-center align-center text-[20px] fas fa-bars block lg:hidden"></i>
        </div>
        <div class=" hidden lg:block">
          <ul class="hover:pb-4 flex justify-center relative align-center text-[16px] text gap-[30px] transition-[padding] duration-300 ease-in">
            <li class=" ">
              <a class=" uppercase font-[Lora] hover:text-[rgb(0,120,4)] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" aria-current="page" href="Accueil.php">Accueil</a>
            </li>
            <ul class="">
              <li class="">
              <button type="button" onclick="show()" class="uppercase hover:text-[rgb(0,120,4)] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent">Formation</button>
                <ul class=" absolute bg-stone-800 text-white ">
                  <li><a class="ac_dropdown m-3 uppercase font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="Cnormal.php">Cours Normal</a></li>
                  <li><a class="ac_dropdown m-3 uppercase font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="Cspeciaux.php">Cours Speciaux</a></li>
                  <li><a class="ac_dropdown m-3 uppercase font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="Cinformatique.php">Cours Informatique</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="ac_dropdown m-3 uppercase font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="Dmarketing.php">Digital Marketing</a></li>
                </ul>
              </li>
            </ul>
            <li class="">
              <a class=" uppercase active hover:text-[rgb(0,120,4)] font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="apropos.php">A propos</a>
            </li>
            <li class="">
              <a class="uppercase mr-[40px] hover:text-[rgb(0,120,4)] font-[Lora] transition-[padding] duration-300 ease-in hover:pb-4 hover:border-[rgb(23,176,23)] border-b hover-pb-4 border-transparent" href="Login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
      <div class=" block w-full text-center  align-center justify-center absolute top-[52px] lg:hidden text-white">
        <ul class="button_menu ac_nav">
          <li class=" me-3 text-wrap ">
            <a class="ac_nav-link hover:text-[rgb(0,120,4)] uppercase" aria-current="page" href="Accueil.php">Accueil</a>
          </li>
          <ul class="ac_navbar-nav">
            <li class="">
              <button type="button" onclick="show()" class="uppercase hover:text-[rgb(0,120,4)]">Formation</button>

              </a>
              <ul class=" bg-transparent">
                <li><a class="ac_dropdown hover:text-[rgb(0,120,4)]" href="Cnormal.php ">Cours Normal</a></li>
                <li><a class="ac_dropdown hover:text-[rgb(0,120,4)]" href="Cspeciaux.php">Cours Speciaux</a></li>
                <li><a class="ac_dropdown hover:text-[rgb(0,120,4)]" href="Cinformatique.php">Cours Informatique</a></li>
                <li>
                  <hr class="ac_dropdown-divider hover:text-[rgb(0,120,4)]">
                </li>
                <li><a class="ac_dropdown hover:text-[rgb(0,120,4)]" href="Dmarketing.php">Digital Marketing</a></li>
              </ul>
            </li>
          </ul>

          <li class="ac_nav-item me-3 ">
            <a class="ac_nav-link uppercase hover:text-[rgb(0,120,4)] active" href="apropos.php">A propos</a>
          </li>
          <li class="ac_nav-item me-3 ">
            <a class="ac_nav-link uppercase hover:text-[rgb(0,120,4)]" href="Login.php">Login</a>
          </li>
        </ul>

      </div>
    </nav>
    <div class="bg-white/40 w-full h-[1px] "></div>
    <div class="h1_head flex text-center justify-center align-center w-full top-0">
      <h1 class=" mt-[150px] text-[2rem]">Inscription...</h1>
    </div>
  </header>
  <div class="section flex justify-center items-center mt-9 md:mt-auto md:h-screen">
    <form action="" method="post" id="formsignUp" class="grid grid-cols-1 md:grid md:grid-cols-2 ml-auto mr-auto md:w-[620px] text-center backdrop-blur-md bg-white right-40 rounded-lg border-2 border-black border-solid">
      <div class="md:col-span-2 text-center mt-5">
        <label class="p-0 mt-5 font-[Lora] text-[25px] md:w-[150px] text-[rgb(0,120,4)] border-b-[rgb(0,120,4)]  border-b">INSCRIRE</label>
      </div>

      <div class="ac_form1 container md:block w-[300px] px-4 mx-auto ">
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Prenom :</label>
            <input type="text" required name="prenom" placeholder="first name" class="rounded-md border align-center pl-2 border-solid border-black w-full h-[30px] ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Email :</label>
            <input type="text" required name="email" placeholder="Email" class="rounded-md border border-solid border-black w-full h-[30px] pl-2">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left h-[54px]">
            <label for="" class="text-[18px]">Formation :</label>
            <select id="role" required name="formation" required class="rounded-md border border-solid border-black w-full h-[30px] pl-1 ">
              <option value="Anglais Normal" selected>Anglais normal</option>
              <option value="Anglais Intensifs">Anglais intensif</option>
              <option value="Anglais Professionnel">Anglais professionnel</option>
              <option value="TOEFL">TOEFL</option>
              <option value="IELTS">IELTS</option>
              <option value="Informatique">Informatique</option>
              <option value="Marketing Digital">Marketing Digital</option>
            </select>
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]" class="">Numero :</label>
            <input type="text" required name="telWhatsapp" placeholder="WhatsApp Number" class="rounded-md border border-solid border-black w-full pl-2 h-[30px] ">
          </div>
        </div>
        <div class="col-span-2 ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Durée :</label><br>
            <select required name="dure" id="dure" class="rounded-md border border-solid border-black w-full h-[30px] pl-2">
              <option value="1 Mois">1 Mois</option>
              <option value="2 Mois">2 Mois</option>
              <option value="3 Mois" selected>3 Mois</option>
              <option value="4 Mois">4 Mois</option>
              <option value="5 Mois">5 Mois</option>
              <option value="6 Mois">6 Mois</option>
              <option value="6 ou 7 Mois">6 Mois à 1ans</option>
            </select><br>
          </div>
        </div>
        <div class="ac_row p-2 ">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Ville :</label>
            <input type="text" required name="ville" placeholder="Ville" class="rounded-md border border-solid border-black w-full h-[30px] pl-2 ">
          </div>
        </div>
        <div class="hidden md:block ac_col text-left">
          <a href="Accueil.php"><i class="fa-solid font-bold fa-arrow-left text-black "></i> Go Page Accueil</a>
        </div>
        <div class=" md:hidden ac_row p-2 ">
          <div class="ac_col text-right">
            <button type="button" id="nextbutton" onclick="showFormNext()" class="w-[60px] h-[25px] font-bold rounded-sm border border-black font-[Lora] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Next</button>
          </div>
        </div>
      </div>
      <div class="ac_form1 hidden container   md:block w-[300px] px-4 mx-auto ">
        <div class="ac_row p-2 ">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Nom :</label>
            <input type="text" required name="nom" placeholder="last name" class="rounded-md border border-solid border-black w-full h-[30px] pl-2 ">
          </div>
        </div>
        <div class="ac_row p-2 ">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Date de Naissance :</label>
            <input type="date" required name="date" placeholder="Birthday" class="rounded-md border border-solid border-black w-full h-[30px] pl-2 ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="langue">Langue préférée</label><br>
            <select id="Langue" required name="langue" class="rounded-md border border-solid border-black w-full h-[30px] pl-2   ">
              <option value="">Langue</option>
              <option value="Français">Français</option>
              <option value="Arabe">Arabe</option>
              <option value="Autre">Autre</option>
            </select>
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Country :</label>
            <select id="role" required name="pays" class="rounded-md border border-solid border-black w-full h-[30px] pl-2   ">
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
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Numero :</label>
            <input type="text" required name="tel" placeholder="Number" class="rounded-md border border-solid border-black w-full h-[30px] pl-2 ">
          </div>
        </div>
        <div class="ac_row p-2">
          <div class="ac_col text-left">
            <label for="" class="text-[18px]">Quand pensez-vous venir :</label>
            <input type="date" required name="mois" class="rounded-md border border-solid border-black w-full h-[30px] pl-2 ">
          </div>
        </div>
        <div class=" md:hidden p-2 ">
          <div class="ac_col flex justify-between text-left">
            <button type="button" onclick="showFormBack()" class="w-[60px] ml-0 h-[25px] font-bold rounded-sm border border-black font-[Lora] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Back</button>
            <button type="submit" name="Save" class="w-[60px] h-[25px] font-bold rounded-sm border border-black font-[Lora] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Save</button>
          </div>
        </div>
        <div class="block md:hidden ac_col text-left">
          <a href="Accueil.php"><i class="fa-solid font-bold fa-arrow-left text-black "></i> Go Page Accueil</a>
        </div>
      </div>
      <label class="md:col-span-2 text-center">
        <?php if (!empty($error)) {
          foreach ($error as $errors) {
            echo "<div style='color: red;'>$errors</div>";
          }
        }; ?></label> <br>
      <div class="md:col-span-2 hidden md:block text-center">
        <button type="submit" name="Save" class=" w-[150px] border-2 rounded-md  mt-5 mb-5 p-1 pr-1 border-solid border-[rgba(0,120,5,0.468)] font-[Lora] bg-[rgba(0,120,5,0.468)] text-[rgba(0,0,0,0.82)] hover:bg-[rgb(0,120,4)] transition-colors duration-300">Save</button>
      </div>
    </form>
  </div>
</body>
<script>
  const ac_dropdown_menu = document.querySelectorAll('.ac_dropdown');
  function show() {
    ac_dropdown_menu.forEach(menu => {
      menu.classList.toggle('open');
    })
  }

  let currentPart = 0;
  const parts = document.querySelectorAll('.ac_form1');

  function showPart(index) {
    parts.forEach((part, i) => {
      part.classList.toggle('hidden', i !== index);
    });
  }

  function showFormNext(){
    let isValid = true;
    const currentFields = parts[currentPart].querySelectorAll('input', 'select');
    currentFields.forEach((currentField) =>{
      if(!currentField.checkValidity()){
        isValid = false;
        currentField.reportValidity();
      }
    })
    if(isValid && currentPart < currentFields.length - 1){
      currentPart++;
      showPart(currentPart);
    }
  }
  function showFormBack(){
    if(currentPart > 0){
      currentPart--;
      showPart(currentPart);
    }
  }


  // function showFormNext() {
  //   nextbutton.addEventListener('click', function() {
  //     const CurrenField = ac_form1[CurrenPart].querySelectorAll('input', 'select');
  //     let isValid = true;
  //     CurrenField.forEach((fields) => {
  //       if (!fields.checkValidity()) {
  //         isValid = false;
  //         field.reportValidity();
  //       }
  //     });
  //     if (isValid) {
  //       ac_form2.classList.remove('hidden');
  //       CurrenPart++;
  //       ac_form1.classList.add('hidden');
  //     }
  //   })
  // }


  // }

  // function showFormBack() {
  //   ac_form2.classList.add('hidden');
  //   ac_form1.classList.remove('hidden');
  // }
</script>
<link href="asset/css//dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="asset/js/" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="Cspeciauxjava.js">
</script>

</html>