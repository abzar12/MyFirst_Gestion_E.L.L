
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>GESTION_D'INSTITUT</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styleSpeciaux.css">
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
                         <li><a class="dropdown-item active text-uppercase" href="Cspeciaux.php">Cours Speciaux</a></li>
                         <li><a class="dropdown-item text-uppercase" href="Cinformatique.php">Cours Informatique</a></li>
                         <li><hr class="dropdown-divider"></li>
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
                      <a class="navlink-navdrop active nav-link  dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-transparent" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item " href="Cnormal.php">Cours Normal</a></li>
                             <li><a class="dropdown-item active" href="Cspeciaux.php">Cours Speciaux</a></li>
                             <li><a class="dropdown-item" href="Cinformatique.php">Cours Informatique</a></li>
                             <li><hr class="dropdown-divider"></li>
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
    <section class="ac_col1 py-" data-aos="zoom-out" >
        <div class="container">
            <div class=" row">
                <div class=" col-md-12" data-aos="" style="">
                      <p class="CR2">COURS PROFESSIONNEl</p>
                        <table class="ac_3_A1" style="margin:auto;">
                          <th class="text-uppercase">Nombre de Mois</th>
                          <th class="text-uppercase">Nommbre d'Heure</th>
                          <th class="text-uppercase">Montant Administrateur</th>
                          <th class="text-uppercase">Montant Individus</th>
                          <tr>
                            <td>1 Mois</td>
                            <td>3 heures</td>
                            <td> 290.000  FCFA</td>
                            <td> 270.000  FCFA</td>
                          </tr>
                          <tr>
                          <td>1 Mois</td>
                            <td>5 heures</td>
                            <td> 370.000  FCFA</td>
                            <td> 350.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>2 Mois</td>
                            <td>3 heures</td>
                            <td>450.000 FCFA</td>
                            <td> 430.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>2 Mois</td>
                            <td>5 heures</td>
                            <td>560.000 FCFA</td>
                            <td> 540.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>3 Mois</td>
                            <td>3 heures</td>
                            <td>670.000 FCFA</td>
                            <td> 650.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>3 Mois</td>
                            <td>5 heures</td>
                            <td>840.000 FCFA</td>
                            <td> 820.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>2 Semaines</td>
                            <td>3 heures</td>
                            <td>220.000 FCFA</td>
                            <td> 200.000  FCFA</td>
                          </tr>
                          <tr>
                            <td>2 Semaines</td>
                            <td>5 heures</td>
                            <td>250.000 FCFA</td>
                            <td> 230.000  FCFA</td>
                          </tr>
                        </table>
                      </div>
                      <div class="ac_3_A2 col-md-6" data-aos="fade-right">
                      <p class="text-uppercase CR2" > LOGEMENT: est payable minimum pour 3 Mois </p>
                          <table style="margin-bottom:15px;">
                            <th class="text-uppercase" >CHAMBRE</th>
                            <th>TARIF PAR MOIS</th>
                          <tr> 
                            <td style="background-color:rgba(128, 128, 128, 0.462);"><b>1 MOIS</b> Un Appartement menblé Climatisé</td>
                            <td style="background-color:rgba(128, 128, 128, 0.462);">320.000 FCFA</td>
                          </tr>
                          <tr> 
                            <td ><b>2 MOIS</b> Un Appartement menblé Climatisé</td>
                            <td>200.000 FCFA</td> 
                          </tr>
                          <tr> 
                          <td style="background-color:rgba(128, 128, 128, 0.462);"><b>2 SEMAINES</b> Un Appartement menblé Climatisé</td>
                          <td style="background-color:rgba(128, 128, 128, 0.462);">200.000 FCFA</td>
                          </tr>
                          <tr> 
                          <td ><b>3 MOIS</b> Un Appartement menblé Climatisé</td>
                          <td>800.000 FCFA</td> 
                          </tr>
                         </table>
                      </div>
                      <div class="col-md-6" data-aos="fade-left">
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
                </div>
        </div>
    </section>
    <section class="ac_col2 py-5">
        <div class="container" id="avantg">
            <div class="row">
                <div class=" col-md-7 py-5" >
                    <p class="highlight text-uppercase">Avantages</p>
                    <ul >
                        <li ><b>Préparation aux examens :</b> TOEFL, IELTS,TOEIC, SAT,COMPUTER LAB,ETC</li>
                        <li><b>Visite touristique</b> à payer 50.000 FCFA a l’intérieur d’Accra pour 4 visites</li>
                        <li><b>Enseignement personnalisé</b> pour progresser à votre rythme</li>
                        <li><b>A l’extérieur d’Accra comme :</b> Cape Coast, Akosombo, etc, 20.000 FCFA supplémentaires</li>
                        <l>Lorem ipsum dolor sit amet consectetur adipisicing elit.</l>
                    </ul>
                </div>
                <div class="ac_ col-md-5">
                    <p>je suis <b class="text-uppercase">Oumou Touré </b>je temoigne que cette institut est la bonne au ghana. <span>vueillez regarder la video</span></p>
                    <video  weidth="300" height="250" controls> 
                      <source src="" type="video/mp4" ></source>
                      <source src="" type="video/ogg" ></source>
                    </video>
                </div>
            </div>
        </div>
    </section>
    <section class="ac_4_colum">
              <div class="container">
              
                <div class="ac_row_col4 row">
                    <h3 data-aos="zoom-in"><span>H</span>oraire</h3>
                      <div data-aos="fade-left" class="col-md-6">
                      <ul>
                      <p data-aos="fade-right" style="color:rgb(0, 120, 4); font-size:large; width:249px; ">3 heures de cours théoriques : </p>
                        <li>Grammaire <p>Pour maîtriser les règles essentielles de la langue</p> </li>
                        <li>Prononciation <p>Pour parler avec clarté et fluidité </p> </li>
                        <li>Vocabulairse <p>Pour enrichir votre lexique et mieux vous exprimer</p> </li>
                        <li>Lecture/Dictée <p>Pour renforcer vos compétences en compréhension écrite </p> </li>
                        <li>Ecoute <p>Pour améliorer votre compréhension orale </p> </li>
                        <li>Expressions <p> Pour vous aider à construire des phrases fluides et naturelles</p> </li>
                      </ul>
                      </div>
                      <div data-aos="fade-right" class="col-md-6">
                        <ul>
                        <p data-aos="fade-left" style="color:rgb(0, 120, 4); font-size:large; width:249px; ">3 Heures de pratique orale :</p>
                        <li>Debats <p>Pour argumenter et structurer vos idées en anglais</p></li>
                        <li>Translations <p>Pour renforcer votre compréhension bilingue et votre précision</p></li>
                        <li>Discussions <p>Pour améliorer votre fluidité dans des échanges interactifs</p></li>
                        <li>Jeux linguistiques <p>Pour apprendre tout en s’amusant dans une ambiance détendue</p> </li>
                        </ul>
                  </div>
                 </div>
                </div>
            </section>
    
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
    <script src="Cspeciauxjava.js"></script>
    <script>
    
</script>
  </body>
</html>