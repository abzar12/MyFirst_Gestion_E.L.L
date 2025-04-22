<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php"; 

$conn = new PDO("mysql::host=localhost; dbname=Gestion_Eudiant", 'root', '');
try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
  die("connection error" . $th->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $Nom = $_POST['nom'];
  $Prenom = $_POST['prenom'];
  $Email = $_POST['email'];
  $Formation = $_POST['formation'];
  $Telephone = $_POST['tel'];
  $Telephone_Whatsapp = $_POST['telWhatsapp'];
  $Date_Naissance = $_POST['date'];
  $Dure = $_POST['dure'];
  $Langue = $_POST['langue'];
  $Ville = $_POST['ville'];
  $Pays = $_POST['pays'];
  $Date_Depart = $_POST['mois'];

  $error = [];
  if (empty($Nom)) {
    $error[] = " le champ NOM est incorrect";
  }
  if (empty($Prenom)) {
    $error[] = "le champ PRENOM est incorrect";
  }
  if (empty($Email)) {
    $error[] = "le champ VILLE est incorrect";
  }
  if (empty($Telephone)) {
    $error[] = "le champ TELEPHONE est incorrect";
  }
  if (empty($Telephone_Whatsapp)) {
    $error[] = "le champ TELEPHONE WHATSAPP est incorrect";
  }
  if (empty($Date_Naissance)) {
    $error[] = "la DATE DE NAISSANCE est incorrect";
  }
  if (empty($Ville)) {
    $error[] = "le champ VILLE est incorrect";
  }
  if (empty($Pays)) {
    $error[] = "le champ PAYS est incorrect";
  }
  if (empty($Formation)) {
    $error[] = "le champ FORMATION est incorrect";
  }
  if (empty($Langue)) {
    $error[] = "le champ LANGUE est incorrect";
  }
  if (empty($Dure)) {
    $error[] = "le champ DUREE est incorrect";
  }
  if (empty($Date_Depart)) {
    $error[] = "le champ QUANT PENSEZ_VOUS VENIR est incorrect";
  }
  // if (!isset($_POST['contrat'])) {
  //   $error[] = 'Vous devez accepter les termes et conditions.';
  // }

  session_start();

  if (count($error) > 0) {
    // Stocker les erreurs dans la session
    $_SESSION['errors'] = $error;

    // Récupérer la page précédente (celle qui a envoyé le formulaire)
    $previousPage = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

    // Redirection vers la page qui a envoyé
    header("Location: $previousPage");
    exit();
  } else {
    $Nom = filter_var($Nom, FILTER_SANITIZE_STRING);
    $Prenom = filter_var($Prenom, FILTER_SANITIZE_STRING);
    $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
    $Telephone = filter_var($Telephone, FILTER_SANITIZE_NUMBER_INT);
    $Telephone_Whatsapp = filter_var($Telephone_Whatsapp, FILTER_SANITIZE_NUMBER_INT);
    $Date_Naissance = filter_var($Date_Naissance, FILTER_SANITIZE_STRING);
    $Date_Depart = filter_var($Date_Depart, FILTER_SANITIZE_STRING);
    $Dure = filter_var($Dure, FILTER_SANITIZE_STRING);
    $Langue = filter_var($Langue, FILTER_SANITIZE_STRING);
    $Ville = filter_var($Ville, FILTER_SANITIZE_STRING);
    $Pays = filter_var($Pays, FILTER_SANITIZE_STRING);
    $Formation = filter_var($Formation, FILTER_SANITIZE_STRING);


    try {
      $req = "insert into Inscription_Etudiant (Nom, Prenom, Email, Formation, Telephone, Telephone_Whatsapp, Date_Naissance, Dure, Langue, Ville, Pays, Date_Depart) values (:Nom, :Prenom, :Email, :Formation, :Telephone, :Telephone_Whatsapp, :Date_Naissance, :Dure, :Langue, :Ville, :Pays, :Date_Depart)";
      $stmt = $conn->prepare($req);

      $stmt->bindParam(':Nom', $Nom);
      $stmt->bindParam(':Prenom', $Prenom);
      $stmt->bindParam(':Email', $Email);
      $stmt->bindParam(':Formation', $Formation);
      $stmt->bindParam(':Telephone', $Telephone);
      $stmt->bindParam(':Telephone_Whatsapp', $Telephone_Whatsapp);
      $stmt->bindParam(':Date_Naissance', $Date_Naissance);
      $stmt->bindParam(':Dure', $Dure);
      $stmt->bindParam(':Langue', $Langue);
      $stmt->bindParam(':Ville', $Ville);
      $stmt->bindParam(':Pays', $Pays);
      $stmt->bindParam(':Date_Depart', $Date_Depart);
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

        $stmt = $conn->query("select Id from users WHERE Role =  'Staff'");
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


        if (!empty($_SERVER['HTTP_REFERER'])) {
          $previousPage = $_SERVER['HTTP_REFERER'];

          // Vérifier si 'success=true' est déjà dans l'URL pour éviter les doublons
          if (strpos($previousPage, 'success=true') === false) {
            $separator = (strpos($previousPage, '?') !== false) ? "&" : "?";
            $previousPage .= $separator . "success=true";
          }

          // Redirection propre
          header("Location: $previousPage");
          exit();
        }
      } catch (PDOException $th) {
        echo "error" . $th->getMessage();
      }
    } catch (\Throwable $th) {
      echo "errro2" . $th->getMessage();
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  Bootstrap CSS -->
  <title>Validation</title>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="banner">
    <nav class="ac-navbar navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class=" navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item me-3 text-wrap">
              <a class="nav-link text-uppercase" aria-current="page" href="Accueil.php">Accueil</a>
            </li>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item text-uppercase" href="Cnormal.php">Cours Normal</a></li>
                  <li><a class="dropdown-item text-uppercase" href="Cspeciaux.php">Cours Speciaux</a></li>
                  <li><a class="dropdown-item text-uppercase" href="Cinformatique.php">Cours Informatique</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item text-uppercase" href="Dmarketing.php">Digital Marketing</a></li>
                </ul>
              </li>
            </ul>
            <li class="nav-item me-3 ">
              <a class="nav-link text-uppercase" href="apropos.php">A propos</a>
            </li>
            <li class="nav-item me-3 ">
              <a class="nav-link active text-uppercase" href="Login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- MY FOOTER -->

  <!-- Bootstrap js-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>