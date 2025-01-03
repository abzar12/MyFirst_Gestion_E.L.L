
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <title>GESTION_D'INSTITUT</title>
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
        </nav>
        <div class="container_form">
        <form>
           <div class="A1">    
            <p>LOGIN</p>
               <div class="A row ">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Email </label>
                   <div class="col-em-10">
                     <input type="email" class="I1 form-control" id="inputEmail3">
                   </div>
               </div>
                 <div class="A row mb-3">
                   <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                   <div class=" col-em-10">
                     <input type="password" class="I1 form-control" id="inputPassword3">
                   </div>
                 </div>
               <button type="submit" class="S1 btn">Sign in</button>
           </div> 
         </form>
         </div>
         </header>
<!-- MY FOOTER -->

    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
  </body>
</html>