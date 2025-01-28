<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>GESTION_D'INSTITUT</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styleInformatique.css">
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
                    <li><a class="dropdown-item text-uppercase" href="Cnormal.php">Cours Normal</a></li>
                         <li><a class="dropdown-item text-uppercase" href="Cspeciaux.php">Cours Speciaux</a></li>
                         <li><a class="dropdown-item active text-uppercase" href="Cinformatique.php">Cours Informatique</a></li>
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item text-uppercase" href="Dmarketing.php">Digital Marketing</a></li>
                    </ul>
                  </li>
              </ul>
              <li class="nav-item me-3 ">
                <a class="nav-link text-uppercase" href="Acceuil.php">A propos</a>
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
                      <a class="navlink-navdrop active nav-link  dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-transparent" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item " href="Cnormal.php">Cours Normal</a></li>
                             <li><a class="dropdown-item " href="Cspeciaux.php">Cours Speciaux</a></li>
                             <li><a class="dropdown-item active" href="Cinformatique.php">Cours Informatique</a></li>
                             <li><hr class="dropdown-divider"></li>
                             <li><a class="dropdown-item" href="Dmarketing.php">Digital Marketing</a></li>
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
        </nav>
      <form action="FormulaireRET.php" method="post" data-aos="zoom-in">
         <div class="principale container">
            <div class=" part2 active">
              
              <div class="partA">
              <h3 class="text-uppercase">Inscription</h3><br>
                 <div class="colA1">
                 <label for="nom" class="onlyNom" >Nom</label><br>
                 <input class="input" type="text" id="nom" name="nom" placeholder="Taper votre Nom" Required><br>
                 <label for="email" >Email</label><br>
                     <input class="input" type="email" name="email" id="email" placeholder="@gmail.com" Required><br>
                     <label for="tel" >Telephone</label><br>
                    <input class="input" type="tel" name="tel" id="tel" placeholder="+233 XXXXXXXXX" required><br>
                 </div>
                 <div class="colA2">
                    <label for="prenom" class="onlyNom" >Prenom</label><br>
                    <input type="text" name="prenom" id="prenom" placeholder="Taper votre Nom" required><br>
                     <label for="formation">Formation</label><br>
                        <select name="formation" id="formation" require>
                            <optgroup label="ANGLAIS" >
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
                     <input type="tel" name="telWhatsapp" id="telWhatsapp" placeholder="+233 XXXXXXXXX" required><br>
                     <button class="button_Back1" type="button" onclick="nextStep()">Next</button>
                 </div>
              </div>
            </div>
             <div class="part2 ">
                <div class="partB">
                    <div class="colB1">
                        <label for="date">Date de Naissance</label><br>
                           <input class="input" type="date" name="date" id="date" required><br>
                        <label for="langue" >Langue préférée</label><br>
                          <input class="input" type="text"  name="langue" list="langue" required><br>
                        <datalist class="input" id="langue">
                            <option value="Français" selected>
                            <option value="Arabe">
                        </datalist>
                        <label for="pays" >Pays</label><br>
                        <input class="input" type="text" list="pays" name="pays" required>
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
                        </datalist><br>
                    </div>
                    <div class="colB2">
                        <label for="dure">Durée</label>
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
                        <input type="text" id="ville" name="ville" required><br>
                        <label for="mois">Quand pensez-vous venir</label><br>
                        <input type="date" name="mois" id="mois">
                    </div>
                    <div class="colB3">
                      <p><input type="checkbox" name="contrat" id="contrat" class="a1" style="width:18px; margin:0;">
                      <span for="contrat"style="color:black; font-size:12px">D'accord pour les termes de condition</span> <br></p>
                       
                        <button class="button_Back" type="button" onclick="prevStep()">Back</button>
                        <button class="button_Back1 b" type="submit" > Envoyé</ion-icon></button>
                    </div>
                </div>
            </div>
                 
             </div>
             
             </div>
         </div>
      </form>
        </div>
    </header>


     <!-- MY FOOTER -->
     <footer class="">
          <nav class="navbar footera  bg-dark navbar-dark ">
            <div class="ac-footer container-fluid">
              <div class="ac_footer1 col-md-4">
              <p style="color:white; margin:auto; ">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p></div>
              <div class="ac_footer2 col-md-4">
                <p style="color:white; margin:auto;">  <ion-icon style="color: rgb(23, 176, 23);" name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
              </div>
              <div class="ac_footer3 col-md-4 ">
                <a class="aion" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-instagram"></ion-icon></a>
                <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-facebook"></ion-icon></a>
                <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-tiktok"></ion-icon></a>
                <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="mail"></ion-icon></a>
                
              </div>
              <span > <ion-icon  name="call-sharp"></ion-icon>Phone: +233 24 473 7721</span>
              
            </div>
          </nav>
    </footer>
    <footer>
          <nav class="navbar2 footerb  bg-dark navbar-dark ">
            <div class="footer container-fluid">
              <div class="footer1 col-md-12">
              <p style=" ">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p>
              <p style="">  <ion-icon name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
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
    <script src="CInformatiquejava.js"></script>
    <script>
    
</script>
  </body>
</html>