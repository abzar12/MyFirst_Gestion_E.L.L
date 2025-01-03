
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>Formulaire D'Inscription</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleFormulaire.css">
  </head>
  <body>
    <header class="banner">
        <nav class="ac-navbar navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
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
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item text-uppercase" href="Dmarketing.php">Digital Marketing</a></li>
                    </ul>
                  </li>
              </ul>
              <li class="nav-item me-3 ">
                <a class="nav-link text-uppercase" href="Acceuil.php">A propos</a>
              </li>
              <li class="nav-item me-3 ">
                <a class="nav-link text-uppercase" href="Login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
        </nav>
</header>
        <section class="ac_4colum ">
          <div class="container-fluid " style="">
          <form action="function.php" method="post" style="display: flex;justify-content: center; align-item:center;">
<div class="principal" >
<h3 class="text-uppercase" style="text-align:center; border-bottom: 1px outset rgba(189, 185, 185, 0.5); font-weight:bolder; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Inscription</h3>
  <div class="part" style="display:flex;">
    <div class="part1">
        <label for="name">Nom</label><br>
        <input class="input" type="text" id="name" name="name" placeholder="Abzar"><br>
        
        <label for="email" >Email</label><br>
        <input class="input" type="email" name="email" id="email" placeholder="@gmail.com"><br>
        <label for="tel" >Telephone</label><br>
        <input class="input" type="tel" name="tel" id="tel" placeholder="+233 XXXXXXXXX"><br>
        <label for="date">Date de Naissance</label><br>
        <input class="input" type="date" name="date" id="date"><br>
        <label for="langue" >Langue préférée</label><br>
        <input class="input" type="text"  name="langue" list="langue"><br>
        <datalist class="input" id="langue">
            <option value="Français" selected>
            <option value="Arabe">
        </datalist>
        <label for="pays" >Pays</label><br>
        <input class="input" type="text" list="pays" name="pays">
        <datalist class="input"  id="pays" >
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
        </datalist> <br>
      
    </div>
    <div class="part2">
        <label for="prenom" >Prenom</label><br>
        <input type="text" name="prenom" id="prenom " placeholder="Camara"><br>
        <label for="formation">Formation</label> <br>
        <select name="formation" id="formation">
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
                <option value="gr1">groupe2</option>
                <option value="gr1">groupe3</option>
            </optgroup>
        </select><br>
        <label for="telWhatsapp">Téléphone Whatsapp:</label><br>
        <input type="tel" name="Whatsapp" id="telWhatsapp" placeholder="+233 XXXXXXXXX"><br>
        <label for="duré">Durée</label>
        <select name="duré" id="duré">
            <option value="1 Mois">1 Mois</option>
            <option value="2 Mois">2 Mois</option>
            <option value="3 Mois" selected>3 Mois</option>
            <option value="4 Mois">4 Mois</option>
            <option value="5 Mois">5 Mois</option>
            <option value="6 Mois">6 Mois</option>
            <option value="6 ou 7 Mois">6 Mois à 1ans</option>
        </select> <br>
        <label for="ville">Ville</label><br>
        <input type="text" id="ville" name="ville"><br>
        <label for="moment_de_depart ">Quand pensez-vous venir</label><br>
        <input type="month" name="mois" id="mement_de_depart">
     </div>
    </div>
        <!-- --------------terme agree--------- -->

    
    <div class="part3" style="margin-top: auto; margin-left: 0; ">
        <input type="checkbox" name="contrat" id="contrat" class="a1">
            <span for="contrat"style="color:black;">D'accord pour les termes de condition</span> <br>
            <button class="button" >envoyer</button>
        </div>
   
</div>
        
    </form>
          </div>
        </section>
         <!-- MY FOOTER -->

    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
  </body>
</html>