<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";


try {
  require_once("connection.php");
} catch (PDOException $th) {
  die("connection error" . $th->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Save"])) {

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

  // 
  $Nom = filter_var($Nom, FILTER_SANITIZE_STRING);
  $Prenom = filter_var($Prenom, FILTER_SANITIZE_STRING);
  $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
  $Telephone = filter_var($Telephone, FILTER_SANITIZE_NUMBER_INT);
  $Telephone_Whatsapp = filter_var($Telephone_Whatsapp, FILTER_SANITIZE_NUMBER_INT);
  $Dure = filter_var($Dure, FILTER_SANITIZE_STRING);
  $Langue = filter_var($Langue, FILTER_SANITIZE_STRING);
  $Ville = filter_var($Ville, FILTER_SANITIZE_STRING);
  $Pays = filter_var($Pays, FILTER_SANITIZE_STRING);
  $Formation = filter_var($Formation, FILTER_SANITIZE_STRING);


  if (
    empty($Prenom) || empty($Nom) || empty($Telephone) || empty($Telephone_Whatsapp) || empty($Date_Naissance) || empty($Date_Depart) || empty($Dure) || empty($Langue) || empty($Ville) || empty($Pays) || empty($Formation)
  ) {
    $errors = "Merci de remplir tous les champs";
    // if (!isset($_POST['contrat'])) {
    //   $error[] = 'Vous devez accepter les termes et conditions.';
    // }
  } elseif (
    strlen($Nom) < 2 || strlen($Prenom) < 2 || strlen($Telephone) < 7 || strlen($Telephone_Whatsapp) < 7 || strlen($Langue) < 3 || strlen($Ville) < 3 || strlen($Pays) < 3
  ) {
    $errors = "Vérifiez bien les informations.";
  } else {

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
        echo "<script>alert('ERROR D'ENREGISTREMENT OK')</script>";
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

        echo "<script> alert('DONNER ENREGISTRER VOUS SEREZ CONTACT BIENTOT')</script>";
      } catch (PDOException $th) {
        die("error" . $th->getMessage());
      }
    } catch (\Throwable $th) {
      echo "errro2" . $th->getMessage();
    }
  }
}

session_unset();
session_destroy();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  Bootstrap CSS -->
  <title>GESTION_D'INSTITUT</title>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="styleNormal.css">
  <link rel="stylesheet" href="input.css">
</head>

<body>
  <header class="banner">
    <nav class="ac-navbar navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
        <div class="button_toggel">
          <ion-icon name="menu-outline" class="button_icon"></ion-icon>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class=" navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item me-3 text-wrap">
              <a class="nav-link text-uppercase" aria-current="page" href="Accueil.php">Accueil</a>
            </li>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item active text-uppercase" href="Cnormal.php">Cours Normal</a></li>
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
              <a class="nav-link  text-uppercase" href="Login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="button_menu ">
        <ul class="navbar-navb">
          <li class="nav-item me-3 text-wrap">
            <a class="nav-link  text-uppercase" aria-current="page" href="Accueil.php">Accueil</a>
          </li>
          <ul class="navbar-nav navbar-navdrop">
            <li class="nav-item dropdown">
              <a class="navlink-navdrop nav-link active dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark bg-transparent" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item active" href="Cnormal.php">Cours Normal</a></li>
                <li><a class="dropdown-item" href="Cspeciaux.php">Cours Speciaux</a></li>
                <li><a class="dropdown-item" href="Cinformatique.php">Cours Informatique</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="Dmarketing.php">Digital Marketing</a></li>
              </ul>
            </li>
          </ul>

          <li class="nav-item me-3 ">
            <a class="nav-link text-uppercase" href="apropos.php">A propos</a>
          </li>
          <li class="nav-item me-3 ">
            <a class="nav-link text-uppercase" href="Login.php">Login</a>
          </li>
        </ul>

      </div>
    </nav>
    <form method="POST">
      <div class="principale container">
        <div class="part2 active">
          <div class="part2head">
            <h5 class="text-uppercase">Inscription</h5>
            <label class="text-uppercase" style="font-size:15px"><?php echo $errors; ?></label>
          </div>
          <div class="partA">
            <div class="colA1">
              <label for="nom" class="onlyNom">Nom</label><br>
              <input class="input" type="text" id="nom" name="nom" placeholder="Taper votre Nom" Required><br>
              <label for="email">Email</label><br>
              <input class="input" type="email" name="email" id="email" placeholder="@gmail.com" Required><br>
              <label for="tel">Telephone</label><br>
              <input class="input" type="tel" name="tel" id="tel" placeholder="+233 XXXXXXXX" required><br>
            </div>
            <div class="colA2">
              <label for="prenom" class="onlyNom">Prenom</label><br>
              <input type="text" name="prenom" id="prenom" placeholder="Taper votre Nom" required><br>
              <label for="formation">Formation</label><br>
              <select name="formation" id="formation" require>
                <optgroup label="ANGLAIS">
                  <option value="anglais_normal" selected>Anglais normal</option>
                  <option value="anglais_intensifs">Anglais intensif</option>
                  <option value="anglais_professionnel">Anglais professionnel</option>
                  <option value="TOEFL">TOEFL</option>
                  <option value="IELTS">IELTS</option>
                </optgroup>

                <optgroup label="INFORMATIQUE">
                  <option value="gr1">groupe1</option>
                  <option value="gr1">groupe2</option>
                  <option value="gr1">groupe3</option>
                </optgroup>
                <optgroup label="DIGITAL MARKETING">
                  <option value="gr1">groupe1</option>
                </optgroup>
              </select><br>
              <label for="telWhatsapp">Téléphone Whatsapp:</label><br>
              <input type="tel" name="telWhatsapp" id="telWhatsapp" placeholder="+233 XXXXXXXX" required><br>
            </div>

          </div>
          <div class="button_Back1">
            <button type="button" onclick="nextStep()">Next</button>
          </div>

        </div>
        <div class="part2 special">
          <div class="partB">
            <div class="colB1">
              <label for="date">Date de Naissance</label><br>
              <input class="input" type="date" name="date" id="date" required><br>
              <label for="langue">Langue préférée</label><br>
              <input class="input" type="text" name="langue" placeholder="Taper votre langue" list="langue" required><br>
              <datalist class="input" id="langue">
                <option value="Français" selected>
                <option value="Arabe">
              </datalist>
              <label for="pays">Pays</label><br>
              <input class="input" type="text" placeholder="Taper votre pays" list="pays" name="pays" required>
              <datalist class="input" id="pays">
                <option value="Côte d'Ivoire">
                <option value="Burkina Faso">
                <option value="Mali">
                <option value="Guinée">
                <option value="Togo">
                <option value="Niger">
                <option value="Cameroun">
                <option value="Bénin">
                <option value="Sénégal">
                <option value="Autre">
              </datalist><br>
            </div>
            <div class="colB2">
              <label for="dure">Durée</label><br>
              <select name="dure" id="dure" required>
                <option value="1 Mois">1 Mois</option>
                <option value="2 Mois">2 Mois</option>
                <option value="3 Mois" selected>3 Mois</option>
                <option value="4 Mois">4 Mois</option>
                <option value="5 Mois">5 Mois</option>
                <option value="6 Mois">6 Mois</option>
                <option value="6 ou 7 Mois">6 Mois à 1ans</option>
              </select><br>
              <label for="ville">Ville</label><br>
              <input type="text" id="ville" placeholder="Taper votre ville" name="ville" required><br>
              <label for="mois">Quand pensez-vous venir</label><br>
              <input type="date" name="mois" id="mois">
            </div>

          </div>
          <div class="colB3 special">
            <div class="" style="display: flex; align-items:center;">
              <input type="checkbox" name="contrat" id="contrat" required class="input special">
              <label for="contrat" style="font-size: 18px; margin-left:10px">D'accord pour les termes de condition</label>
            </div>
            <div class="partB_button">
              <button class="button_Back" type="button" onclick="prevStep()">Back</button>
              <button class="button_BackEven b" name="Save" type="submit"> Envoyé</ion-icon></button>
            </div>
          </div>
        </div>

      </div>

      </div>
      </div>
    </form>
  </header>

  <section class="section1">
    <div class="conatiner-fluid">
      <div class="ac_card card">
        <div class="ac_card_body  card-body">
          <h5 class="card-title"><span>|</span> Apprendre l'anglais au Ghana</h5>

          <p class="P1 card-text">Ne laissez plus la barrière de la langue freiner vos rêves ! Que ce soit pour voyager, avancer dans votre carrière ou réussir vos examens, apprendre l'anglais n'a jamais été aussi simple.</p>
          <p class="P2">Que vous soyez débutant ou avancé, notre école vous accompagne avec des classes d'expression orale pour une pratique active et naturelle. Nos enseignants, compétents et professionnels, vous garantissent un apprentissage efficace dans une ambiance conviviale</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ac_3colum py-5">
    <div class="container-fluid" style="overflow: hidden;">
      <div data-aos="zoom-in-down" class="ac_3 row">
        <h3 style="text-align: center; color:rgb(0, 120, 4);  font-family:auto; text-decoration:underline; font-weight: bold;">NOS COURS </h3>
        <div class=" col-md-6">
          <p class="CR1">COURS NORMAUX</p>
          <table class="ac_3_A1">
            <th class="text-uppercase">Nombre de Mois</th>
            <th class="text-uppercase">Nommbre d'Heure</th>
            <th class="text-uppercase">Montant</th>
            <tr>
              <td>1 Mois</td>
              <td>3 heures</td>
              <td> 70.000 FCFA</td>
            </tr>
            <tr>
              <td>2 Mois</td>
              <td>3 heures</td>
              <td>120.000 FCFA</td>
            </tr>
            <tr>
              <td>3 Mois</td>
              <td>3 heures</td>
              <td>180.000 FCFA</td>
            </tr>
            <tr>
              <td>1 Mois</td>
              <td>6 heures</td>
              <td>110.000 FCFA</td>
            </tr>
            <tr>
              <td>2 Mois</td>
              <td>6 heures</td>
              <td>140.000 FCFA</td>
            </tr>
            <tr>
              <td>3 Mois</td>
              <td>6 heures</td>
              <td>210.000 FCFA</td>
            </tr>
          </table>
        </div>
        <div class=" col-md-6">
          <p class="CR2">PROGRAMME LONGUE DUREE</p>
          <table class="ac_3_A2">
            <th class="text-uppercase">Nombre de Mois</th>
            <th class="text-uppercase">Nommbre d'Heure</th>
            <th class="text-uppercase">Montant</th>
            <tr>
              <td>6 Mois</td>
              <td>3 heures</td>
              <td>210.000 FCFA</td>
            </tr>
            <tr>
              <td>6 Mois</td>
              <td>6 heures</td>
              <td>320.000 FCFA</td>
            </tr>
            <tr>
              <td>9 Mois</td>
              <td>3 heures</td>
              <td>260.000 FCFA</td>
            </tr>
            <tr>
              <td>12 Mois</td>
              <td>3 heures</td>
              <td>320.000 FCFA</td>
            </tr>
          </table>
        </div>
        <div class="ac_3_A2 col-md-6">
          <p class="text-uppercase CR2"> LOGEMENT: est payable minimum pour 3 Mois </p>
          <table style="margin-bottom:15px;">
            <th class="text-uppercase">CHAMBRE</th>
            <th>TARIF PAR MOIS</th>
            <tr>
              <td style="background-color:rgba(128, 128, 128, 0.462);">Une personne par chambre</td>
              <td style="background-color:rgba(128, 128, 128, 0.462);">100.000 FCFA</td>
            </tr>
            <tr>
              <td>une personne par chambre (climatisée)</td>
              <td>200.000 FCFA</td>
            </tr>
            <tr>
              <td style="background-color:rgba(128, 128, 128, 0.462);">Une personne par chambre</td>
              <td style="background-color:rgba(128, 128, 128, 0.462);">200.000 FCFA</td>
            </tr>
            <tr>
              <td>2 personnes par chambre</td>
              <td>40.000 FCFA</td>
            </tr>
            <tr>
              <td style="background-color:rgba(128, 128, 128, 0.462);">2 personne par chambre</td>
              <td style="background-color:rgba(128, 128, 128, 0.462);">50.000 FCFA</td>
            </tr>
            <tr>
              <td>Famille d'accueil(vivre avec une famille Ghanéen)</td>
              <td>500.000 FCFA(Nourriture inclus 3 repas du jours )</td>
            </tr>
            <tr>
              <td style="background-color:rgba(128, 128, 128, 0.462);">Famille d'accueil(vivre avec une famille Ghanéen)</td>
              <td style="background-color:rgba(128, 128, 128, 0.462);">600.000 FCFA(Nourriture inclus 3 repas du jours )</td>
            </tr>

          </table>
        </div>
        <div class="col-md-6">
          <p class="CR2 text-uppercase">Tarifs et Informations</p>

          <table>
            <thead>
              <tr>
                <th class=" text-uppercase">Élément</th>
                <th class="text-uppercase">Coût</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2 livres d'anglais</td>
                <td>10.000 FCFA</td>
              </tr>
              <tr>
                <td>Frais d'inscription</td>
                <td>5.000 FCFA</td>
              </tr>
              <tr>
                <td>Visites touristiques</td>
                <td>50.000 FCFA (par mois)</td>
              </tr>
            </tbody>
          </table>

          <p class="note"><span class="highlight">NB :</span> Les frais sont <strong>non remboursables</strong> une fois payés.</p>
          <p>Les cours se tiennent dans des <strong>salles bien meublées et climatisées</strong> au sein de l’établissement.</p>
          <p>Une <strong>pause-café quotidienne</strong> est offerte pour le confort des apprenants.</p>

        </div>
        <a class="ac_3_INS" href="Formulaire.php">Passer a L'Inscription</a>
      </div>
    </div>
  </section>
  <section class="ac_4colum py-">
    <div class="container">
      <div class="ac_4 rom">

      </div>
    </div>
  </section>
  <section class="ac_4_colum">
    <div class="container">

      <div class="ac_row_col4 row" style="overflow: hidden;">
        <h3 data-aos="zoom-in"><span>H</span>oraire</h3>
        <div data-aos="fade-left" class="col-md-6">
          <ul>
            <p data-aos="fade-right" style="color:rgb(0, 120, 4); font-size:large; width:249px; ">3 heures de cours théoriques : </p>
            <li>Grammaire <p>Pour maîtriser les règles essentielles de la langue</p>
            </li>
            <li>Prononciation <p>Pour parler avec clarté et fluidité </p>
            </li>
            <li>Vocabulairse <p>Pour enrichir votre lexique et mieux vous exprimer</p>
            </li>
            <li>Lecture/Dictée <p>Pour renforcer vos compétences en compréhension écrite </p>
            </li>
            <li>Ecoute <p>Pour améliorer votre compréhension orale </p>
            </li>
            <li>Expressions <p> Pour vous aider à construire des phrases fluides et naturelles</p>
            </li>
          </ul>
        </div>
        <div data-aos="fade-right" class="col-md-6">
          <ul>
            <p data-aos="fade-left" style="color:rgb(0, 120, 4); font-size:large; width:249px; ">3 Heures de pratique orale :</p>
            <li>Debats <p>Pour argumenter et structurer vos idées en anglais</p>
            </li>
            <li>Translations <p>Pour renforcer votre compréhension bilingue et votre précision</p>
            </li>
            <li>Discussions <p>Pour améliorer votre fluidité dans des échanges interactifs</p>
            </li>
            <li>Jeux linguistiques <p>Pour apprendre tout en s’amusant dans une ambiance détendue</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- MY FOOTER -->
  <!-- MY FOOTER -->
  <footer class="">
    <nav class="navbar footera  bg-dark navbar-dark ">
      <div class="ac-footer container-fluid">
        <div class="ac_footer1 col-md-4">
          <p style="color:white; margin:auto; ">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p>
        </div>
        <div class="ac_footer2 col-md-4">
          <p style="color:white; margin:auto;"> <ion-icon style="color: rgb(23, 176, 23);" name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
        </div>
        <div class="ac_footer3 col-md-4 ">
          <a class="aion" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-instagram"></ion-icon></a>
          <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-facebook"></ion-icon></a>
          <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-tiktok"></ion-icon></a>
          <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="mail"></ion-icon></a>

        </div>
        <span> <ion-icon name="call-sharp"></ion-icon>Phone: +233 24 473 7721</span>

      </div>
    </nav>
  </footer>
  <footer>
    <nav class="navbar2 footerb  bg-dark navbar-dark ">
      <div class="footer container-fluid">
        <div class="footer1 col-md-12">
          <p style=" ">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p>
          <p style=""> <ion-icon name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
          <span style=" "> <ion-icon style="margin:auto 15px;" name="call-sharp"></ion-icon>Phone: +233 24 473 7721</span>
          <a class="aion" href=""><ion-icon style="" name="logo-instagram"></ion-icon></a>
          <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
          <a href=""><ion-icon name="logo-tiktok"></ion-icon></a>
          <a href=""><ion-icon name="mail"></ion-icon></a>
        </div>
      </div>
    </nav>
  </footer>
  <!-- Bootstrap js-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="asset/js/bootstrap.bundle.min.js"></script>
  <script src="Cnormaljava.js"></script>
  <script>

  </script>
</body>

</html>