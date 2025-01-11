
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>GESTION_D'INSTITUT</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleStep.css">
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
                <a class="nav-link active text-uppercase" href="Login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="button_menu ">
            <ul class="navbar-navb">
                  <li class="nav-item me-3 text-wrap">
                    <a class="nav-link active text-uppercase" aria-current="page" href="Accueil.php">Accueil</a>
                  </li>
                  <ul class="navbar-nav navbar-navdrop">
                      <li class="nav-item dropdown">
                      <a class="navlink-navdrop nav-link  dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-transparent" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item " href="Cnormal.php">Cours Normal</a></li>
                             <li><a class="dropdown-item" href="Cspeciaux.php">Cours Speciaux</a></li>
                             <li><a class="dropdown-item" href="Cinformatique.php">Cours Informatique</a></li>
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

        <form action="FormulaireRET.php" method="post">
        <div class="principale container">
            <div class=" part2 active">
              <div class="partA">
                 <div class="colA1">
                 <label for="nom" require>Nom</label><br>
                 <input class="input" type="text" id="nom" name="nom" placeholder="Taper votre Nom" Required><br>
                 <label for="email" >Email</label><br>
                     <input class="input" type="email" name="email" id="email" placeholder="@gmail.com" Required><br>
                     <label for="tel" >Telephone</label><br>
                    <input class="input" type="tel" name="tel" id="tel" placeholder="+233 XXXXXXXXX" required><br>
                 </div>
                 <div class="colA2">
                    <label for="prenom" >Prenom</label><br>
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
                        <button class="button_Back1" type="submit" > Envoyé</ion-icon></button>
                    </div>
                </div>
            </div>
                 
             </div>
             
             </div>
        </div>
      </form>
    </header>
    
            <section class="ac_3colum py-5">
                  <div class="container-fluid">
                    <div class="ac_3 row">
                       <h3 style="text-align: center; color:rgb(210, 105, 30);  font-family:auto; text-decoration:underline; font-weight: bold;">NOS COURS </h3>
                      <div class=" col-md-6">
                      <p class="CR1">COURS NORMAUX</p>
                        <table class="ac_3_A1">
                          <th class="text-uppercase">Nombre de Mois</th>
                          <th class="text-uppercase">Nommbre d'Heure</th>
                          <th class="text-uppercase">Montant</th>
                          <tr>
                            <td>1 Mois</td>
                            <td>3 heures</td>
                            <td> 70.000  FCFA</td>
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
                      <div class=" col" style="">
                      <p class="CR1">COURS PROFESSIONNEl</p>
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

                    </div>
                  </div>
            </section>
<!-- MY FOOTER -->

    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <script>
       let currentpart = 0;

function showpart(partIndex) {
    const parts = document.querySelectorAll('.part2');
    parts.forEach((part, index) => {
        part.classList.toggle('active', index === partIndex);
    });
}

function nextStep() {
    const parts = document.querySelectorAll('.part2');
    const currentFields = parts[currentpart].querySelectorAll('input, select, textarea');

    // Vérifier si tous les champs requis sont valides
    let isValid = true;
    currentFields.forEach((field) => {
        if (!field.checkValidity()) {
            isValid = false;
            field.reportValidity(); // Affiche le message d'erreur du navigateur
        }
    });

    // Si tous les champs sont valides, passer à l'étape suivante
    if (isValid && currentpart < parts.length - 1) {
        currentpart++;
        showpart(currentpart);
    }
}

function prevStep() {
    if (currentpart > 0) {
        currentpart--;
        showpart(currentpart);
    }
}

    </script>
<script >
    const button_toggel= document.querySelector('.button_toggel');
     const button_menu = document.querySelector('.button_menu');
if (button_toggel && button_menu) {
  button_toggel.addEventListener('click', () => {
        button_menu.classList.toggle('open');
    });
} else {
    console.error('Required elements not found in the DOM.');
}</script>
  </body>
</html>