<?php
 $img1="img/5e5bf906-9f48-4ca7-ac84-b43629aa99d4.JPG";
 $img2="img/1f38ebb7-32f8-414a-a395-c0a9df5982e6.JPG";
 $img3="img/4562df8d-080c-4bea-bd5c-ceef0eac07dd.JPG"; 
 $img4="img/IMG_2206.JPG";
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>GESTION_D'INSTITUT</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styleapropos.css">
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
                <a class="nav-link text-uppercase active " href="apropos.php">A propos</a>
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
                      <a class="navlink-navdrop  nav-link  dropdown-toggle text-uppercase" data-bs-toggle="dropdown" href="formatiom.php" role="button" aria-expanded="false">Formation</a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-transparent" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item " href="Cnormal.php">Cours Normal</a></li>
                             <li><a class="dropdown-item " href="Cspeciaux.php">Cours Speciaux</a></li>
                             <li><a class="dropdown-item " href="Cinformatique.php">Cours Informatique</a></li>
                             <li><hr class="dropdown-divider"></li>
                             <li><a class="dropdown-item" href="Dmarketing.php">Digital Marketing</a></li>
                        </ul>
                      </li>
                  </ul>
                  
                  <li class="nav-item me-3 ">
                    <a class="nav-link text-uppercase active" href="apropos.php">A propos</a>
                  </li>
                  <li class="nav-item me-3 ">
                    <a class="nav-link text-uppercase" href="Login.php">Login</a>
                  </li>
                </ul>

            </div>
          </nav>
          <div class="h1_head">
          <h1>À propos de nous...</h1>
          </div>
    </header>
        <div class="section1 py-5">
          <div class="container">
            <div class="ac_row row">
            <h2><span>ENGLISH LANGUAGE LABORATORY</span></h2>
            <p>À ELL, nous croyons  l'apprentissage de l'anglais doit être accessible, engageant et efficace pour tous. Que vous commenciez tout juste ou que vous souhaitiez perfectionner vos compétences, notre équipe de professeurs dévoués est là pour vous aider à atteindre vos objectifs.</p>
        <div class="mission">
            <h3>Notre Mission</h3>
            <p>Notre mission est d'offrir une éducation de qualité en anglais, en équipant nos étudiants des compétences nécessaires pour réussir dans leur vie personnelle, professionnelle et académique. Nous mettons l'accent sur la communication pratique et les applications réelles de la langue.</p>
        </div>
        <div class="choix_ecole">
            <h3>Pourquoi Choisir Notre École ?</h3>
            <ul>
                <li>Des enseignants expérimentés et passionnés par l'enseignement.</li>
                <li>Des cours interactifs qui rendent l'apprentissage amusant et efficace.</li>
                <li>Des horaires flexibles pour s'adapter à vos besoins.</li>
                <li>Un environnement d'apprentissage convivial et soutenant.</li>
                <li>Des tarifs abordables, sans frais cachés.</li>
                <li>Une classe orale quotidienne pour améliorer la communication.</li>
                <li>Différents clubs gratuits : <b>Debate Club, Reading Club, Dance Club, English club, Sport Club.</b></li>
            </ul>
        </div>
            </div>
          </div>
        </div>
        <div class="section2">
          <div class="container">
              <div class="ac_card card mb-3 ">
                 <div class="ac_row row g-0">
                   <div class="col-md-5">
                     <div class="card-body">
                       <h5 class="card-title">Message au Directeur</h5><br>
                       <p>
                       <p>Monsieur le Directeur,</p>
                       Bienvenue à English Language Laboratory Institute (E.L.L), la meilleure école d’anglais au Ghana !

                       Nos enseignants expérimentés et nos programmes sur mesure vous offrent les compétences et la confiance nécessaires pour réussir. Que vous soyez débutant et souhaitiez renforcer vos bases ou avancé et préparant un examen important, nous avons un programme adapté à vos besoins.
                       
                       Nous sommes fiers des progrès remarquables de nos étudiants au fil des ans et convaincus qu'avec votre travail acharné et votre détermination, vous atteindrez également vos objectifs.
                       
                       Merci d’avoir choisi E.L.L ! N’hésitez pas à nous contacter pour toute question ou assistance. Nous avons hâte de vous accueillir très bientôt
                       </p>
                       <p class="signature">Cordialement, <br> Mr Alhassan Keita</p>
                     </div>
                   </div>
                   <div class="col-md-7">
                     <img src="img/Computer5.jpg" class="img-fluid rounded-start" alt="...">
                   </div>
                 </div>
              </div>
          </div>
        </div>
        <section class="ac_section2 py-5">
          <div class="container">
            <div class="ac_row_staff row g-5">
              <h3 style="text-align:center;">Rencontrez Notre Équipe: </h3>
              <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text">
                    <p>Enseignant d'anglais</p>
                    <p>Jane est une enseignante certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture</p>
                </div>
                  
                </div>
             </div>
             <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text">
                    <p>Enseignant d'anglais</p>
                    <p>Jane est une enseignante certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture.</p>
                </div>
                  
                </div>
             </div>
             <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text"> 
                    <p>Enseignante d'anglais</p>
                    <p>Jane est une enseignante certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture.</p>
                </div>
                 
                </div>
             </div>
             <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text">
                    <p>Enseignants d'anglais</p>
                    <p>Jane est un enseignant certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture.</p>
                </div>
                  
                </div>
             </div>
             <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text">
                    <p>Enseignante d'anglais</p>
                    <p>Jane est une enseignante certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture.</p>
                 </div>
                  
                </div>
             </div>
             <div class="card" >
              <img src="img/temp_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nom Prenom</h5>
                  <div class="text">
                    <p>Enseignante d'anglais</p>
                    <p>Jane est une enseignante certifiée qui adopte une approche ludique et engageante pour l'enseignement de la grammaire et de l'écriture.</p>
                </div>
                  
                </div>
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
    <script src="CInformatiquejava.js"></script>
    <script>
    
</script>
  </body>
</html>