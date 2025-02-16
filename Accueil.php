<?php
 $img1="img/5e5bf906-9f48-4ca7-ac84-b43629aa99d4.JPG";
 $img2="img/1f38ebb7-32f8-414a-a395-c0a9df5982e6.JPG";
 $img3="img/4562df8d-080c-4bea-bd5c-ceef0eac07dd.JPG"; 
 $img4="img/IMG_2206.JPG";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>E.L.L</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleAccueil.css">
  </head>
<body>
<header class="banner">
        <nav class="ac-navbar navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
          <div class="button_toggel">
          <ion-icon name="menu-outline" class="button_icon"></ion-icon>
          </div>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class=" navbar-nav ms-auto mb-2 mb-lg-0 ">
              <li class="nav-item me-3 text-wrap">
                <a class="nav-link active text-uppercase" aria-current="page" href="Accueil.php">Accueil</a>
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
                <a class="nav-link text-uppercase" href="apropos.php">A propos</a>
              </li>
              <li class="nav-item me-3 ">
                <a class="nav-link text-uppercase" href="Login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ----------------- my menu navbar----------------!-->
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
                    <a class="nav-link text-uppercase" href="apropos.php">A propos</a>
                  </li>
                  <li class="nav-item me-3 ">
                    <a class="nav-link text-uppercase" href="Login.php">Login</a>
                  </li>
                </ul>

        </div>
        </nav>
    <div class="ac_Acontainer ">
        <div class="A row col-12 ">
            <p>Bienvenue dans le meilleur institut d'anglais au Ghana</p>
            <h1>English language laboratory Institute</h1>
            <p>Apprendre l'anglais au Ghana n'a jamais été aussi facile Rejoignez le meilleur institut d'anglais au Ghana et débloquez le monde des opportunités avec nous.</p>
            <a href="Formulaire.php" class="ac_link link text-uppercase "> Inscription</a>
        </div>
    </div>
</header>
               <!-- le corps de la page  -->
                <section class="available py-5">
                  <div class="container">
                    <div class="row">
                    <div class="ac_card ac_animation1 mb-3">
                         <div class="row">
                           <div class="col-md-6 border-0 rounded-0">
                             <div class="card-body">
                               <h5 class="card-title">Qui sommes-nous?</h5>
                               <p class="card-text">E.L.L, situé à Accra, Ghana, est le choix privilégié pour ceux qui veulent apprendre l'anglais au Ghana.</p>
                               <p class="card-text"><span>Nous sommes guidée par une mission fondamentale.</span><br> rendre l’anglais accessible à tous. Nos enseignants, spécialement formés, comprennent les besoins uniques des francophones, lusophones et d’autres groupes linguistiques. Nous brisons les barrières de communication entre les peuples en offrant un apprentissage de l’anglais authentique et adapté à chaque individu.</p>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <img src="<?php echo $img2;?>" class="img_b1 img-fluid rounded-start" alt="Students">
                           </div>
                         </div>
                    </div>
                    </div>
                  </div>
                </section>
                <section class="ac_2colum">
                  <div class="container-fluid ">
                    <div class="ac_col ac_animation2 row ">
                      <div class="ac_col1 col m-2" >
                      <ion-icon class="ion-icon1" name="book"></ion-icon>
                      <h2>Certificat accrédité</h2>
                      <p>Nos programmes de formation délivrent des certificats accrédités, témoignant de votre maîtrise de la langue anglaise.</p></div>
                      <div class="ac_col2 col m-2 " >
                      <ion-icon class="ion-icon2" name="clipboard-outline"></ion-icon>
                      <h2 style="color: rgb(210, 105, 30)">Environnement propice</h2>
                      <p>Dans un environnement propice à l'apprentissage, nous favorisons la réussite de nos étudiants.</p></div>
                      <div class="ac_col3 col m-2" >
                      <ion-icon class="ion-icon3" name="school-sharp"></ion-icon>
                        <h2>Enseignants agréés</h2>
                      <p>Nos enseignants agréés sont des experts dévoués à vous guider vers la maîtrise de l'anglais. Faites équipe avec l'excellence.</div>
                    </div>
                  </div>
                </section>
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
                <section class="ac_4colum py-">
                  <div class="container">
                    <div class="ac_4 rom" >
                      <div class="b col-md-12" >
                      <p class="text-uppercase" > <b>LOGEMENT: est payable minimum pour 3 Mois </b></p>
                          <table style="margin-bottom:15px;">
                            <th class="text-uppercase" style="font-weight:bold" ><strong>CHAMBRE</strong></th>
                            <th>TARIF PAR MOIS</th>
                          <tr> 
                            <td style="background-color:rgba(128, 128, 128, 0.462);">Une personne par chambre</td>
                            <td style="background-color:rgba(128, 128, 128, 0.462);">100.000 FCFA</td>
                          </tr>
                          <tr> 
                            <td >une personne par chambre (climatisée)</td>
                            <td>200.000 FCFA</td> 
                          </tr>
                          <tr> 
                          <td style="background-color:rgba(128, 128, 128, 0.462);">Une personne par chambre</td>
                          <td style="background-color:rgba(128, 128, 128, 0.462);">200.000 FCFA</td>
                          </tr>
                          <tr> 
                          <td >2 personnes par chambre</td>
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
                      <a class="aaaa"href="Formulaire.php">Passer a L'Inscription</a>
                    </div>
                  </div>
                </section>
                <section class="ac_4_1colum py-3" >
                  <div class="container-fluid" >
                       <div class="row " >
                           <div class="col-md-6" style="">
                             <img src="<?php echo $img3;?>" class="img-fluid rounded-start" alt="...">
                           </div>
                           <div class="col-md-6">
                             <div class="card-body" style="text-align:start;">
                               <h5 class="card-title" style="text-align:center; font-weight:bold; font-size:1.5em;">Pourquoi nous choisir ?</h5>
                               <ul>
                               <div style="background-color:rgba(43, 43, 43, 0.47); color:black;font-weight:bold; margin:15px 25px 10px 5px; text-align:start;padding:25px 10px 10px 30px; border-radius:10px;"><ion-icon name="logo-ionic" style="color:black; margin:0px; padding:0px;"></ion-icon> 
                               <p class="card-text" style="margin:-25px 0px 0px 35px; padding:0px; text-align:start;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quas repudiandae eaque libero sapiente perspiciatis eos ex debitis et, ipsa tenetddur maxime quam voluptas reprehenderit.</p> </div>
                               <div style="background-color:rgba(43, 43, 43, 0.47); color:black;font-weight:bold; margin:5px -10px 0px 35px; text-align:start;padding:25px 10px 10px 30px; border-radius:10px;"><ion-icon name="logo-ionic" style="color:black; margin:0px; padding:0px;"></ion-icon>
                               <p class="card-text" style="margin:-25px 0px 0px 35px; padding:0px; text-align:start;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quas repudiandae eaque libero sapiente perspiciatis eos ex debitis et, ipsa tenetddur maxime quam voluptas reprehenderit</p></div>
                               <div style="background-color:rgba(43, 43, 43, 0.47); color:black;font-weight:bold; margin:15px 25px 10px 5px; text-align:start;padding:25px 10px 10px 30px; border-radius:10px;"><ion-icon name="logo-ionic" style="color:black; margin:0px; padding:0px;"></ion-icon> 
                               <p class="card-text" style="margin:-25px 0px 0px 35px; padding:0px; text-align:start;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quas repudiandae eaque libero sapiente perspiciatis eos ex debitis et, ipsa tenetddur maxime quam voluptas reprehenderit.</p> </div>
                               <div style="background-color:rgba(43, 43, 43, 0.47); color:black;font-weight:bold; margin:5px -10px 0px 35px; text-align:start;padding:25px 10px 10px 30px; border-radius:10px;"><ion-icon name="logo-ionic" style="color:black; margin:0px; padding:0px;"></ion-icon>
                               <p class="card-text" style="margin:-25px 0px 0px 35px; padding:0px; text-align:start;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quas repudiandae eaque libero sapiente perspiciatis eos ex debitis et, ipsa tenetddur maxime quam voluptas reprehenderit</p></div>
                             </div>
                           </div>
                           </div>
                    </div>
                  </div>
                </section>
                <section class="ac_5colum py-3">
                  <div class="container-fluid">
                    <div class="ac_col row " style="width:100%;">
                      <div class="ac_col5 col " style="border: 1px solid black;border-radius:20px;background-color: rgb(0, 120, 4);padding-left:50px;padding-right:50px;text-align:center;padding-bottom: 15px;margin-left:20px;margin-right:15px;margin-bottom: 5px;">
                        <h3 style="margin-top:10px; color:white; text-align:center; margin-bottom:15px;"> Cours d'anglais</h3>
                        <p style="margin-left:30px; margin-right:15px;  margin-bottom:15px; ">ELL offre une expérience immersive unique, combinant l’éducation linguistique avec une découverte culturelle inoubliable.</p>
                        <a href="Formulaire.php" style="border:1px solid black; border-radius:10px; text-decoration:none; color: black ;cursor: pointer;background-color: #D2691E; padding:5px">INSCRIRE</a>
                      </div>
                      <div class="ac_col5 col " style="border: 1px solid black;border-radius:20px;background-color: rgb(0, 120, 4);padding-left:50px;padding-right:50px;text-align:center;padding-bottom: 15px;margin-left:20px;margin-right:15px;margin-bottom: 5px;">
                        <h3 style="margin-top:10px; color:white; text-align:center;">TOEFL | IELTS | SAT</h3>
                        <p style="margin-left:30px; margin-right:15px; ">A E.L.L, préparez vos examens de langue anglaise standardisés les plus reconnus au monde : le TOEFL, l’IELTS et le SAT.</p>
                      </div>
                      <div class="ac_col5 col " style="border: 1px solid black;border-radius:20px;background-color: rgb(0, 120, 4);padding-left:50px;padding-right:50px;text-align:center;padding-bottom: 15px;margin-left:20px;margin-right:15px;margin-bottom: 5px;">
                        <h3 style="margin-top:10px; color:white; text-align:center; margin-bottom:15px;">Cours d' informatique</h3>
                        <p style="margin-left:30px; margin-right:15px; margin-bottom:15px; ">Nous proposons des programmes d’informatique conçus pour vous doter de compétences numériques essentielles.</p>
                        <a href="Cinformatiom.php" style="border:1px solid black; border-radius:10px; text-decoration:none; color: black ;cursor: pointer;background-color: #D2691E; padding:5px">INSCRIRE</a>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="ac_6colum py-5" >
                  <div class="container-fluid">
                    <div class="row" style="display:; justify-content: center; align-item:center; text-align: center; margin:auto;  ">
                    <div class="card" style="width: 18rem; text-decoration:none; padding:0px; border:none; background-color:transparent;">
                       <img src="<?php echo $img3;?>" alt="Director" style="border: 1px solid transparent; border-radius:15px; background-size: cover; background-repeat: no-repeat; background-position: center;" >
                       <div class="card-body">
                          <p>Hamath Dialllo</p>
                          <p>Directeur</p>
                       </div>
                     </div>
                     <div class="card" style="width: 18rem; text-decoration:none; padding:0px; border:none; background-color:transparent;">
                       <img src="<?php echo $img3;?>" alt="Director" style="border: 1px solid transparent; border-radius:15px; background-size: cover; background-repeat: no-repeat; background-position: center;" >
                       <div class="card-body">
                          <p>Hamath Dialllo</p>
                          <p>Directeur</p>
                       </div>
                     </div>
                     <div class="card" style="width: 18rem; text-decoration:none; padding:0px; border:none; background-color:transparent;">
                       <img src="<?php echo $img3;?>" alt="Director" style="border: 1px solid transparent; border-radius:15px; background-size: cover; background-repeat: no-repeat; background-position: center;" >
                       <div class="card-body " style="background-color:transparent; border-raduis:10px;">
                          <p>Hamath Dialllo</p>
                          <p>Directeur</p>
                       </div>
                     </div>
                     <div class="card" style="width: 18rem; text-decoration:none; padding:0px; border:none; background-color:transparent;">
                       <img src="<?php echo $img3;?>" alt="Director" style="border: 1px solid transparent; border-radius:15px; background-size: cover; background-repeat: no-repeat; background-position: center;">
                       <div class="card-body">
                          <p>Hamath Dialllo</p>
                          <p>Directeur</p>
                       </div>
                     </div>
                    </div>
                  </div>
                </section>
                  <!-- footer = le pied de la page -->
<footer class="">
      <nav class=" navbar  bg-dark navbar-dark ">
        <div class="ac-footer container-fluid">
          <div class="ac_footer1 col-md-4">
          <p style="color:white; margin:auto;">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p></div>
          <div class="ac_footer2 col-md-4">
            <p style="color:white; margin:auto;">  <ion-icon style="color: rgb(23, 176, 23);" name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
          </div>
          <div class="ac_footer3 col-md-4 ">
            <a class="aion" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-instagram"></ion-icon></a>
            <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-facebook"></ion-icon></a>
            <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-tiktok"></ion-icon></a>
            <a href=""><ion-icon style="color: rgb(23, 176, 23);" name="mail"></ion-icon></a>
            
          </div>
          <span style="color:white; margin:auto; font-size:16px "> <ion-icon style="color: rgb(23, 176, 23); margin:auto 15px;" name="call-sharp"></ion-icon>Phone: +233 24 473 7721</span>
          
      </div>
      </nav>
</footer>
    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <script src="AccueiljavaS.js"></script>
</body>
</html>