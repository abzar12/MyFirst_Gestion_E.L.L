<?php

try {
  $conn = new PDO("mysql::host=localhost ; dbname=Gestion_Eudiant", 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST['login'])) {
    $Email = $_POST['ac_email'];
    $password = $_POST['ac_password'];
    $stmt = $conn->prepare("select Id from users where Email= :Email and Password= :password ");
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user =$stmt->fetch();
    if ($stmt->rowCount() > 0) {
      session_start();
      $_SESSION['user'] = $Email;
      $_SESSION["UserId"] = $user["Id"];
      header("Location:dashbord.php");
      exit();
    } else {
      $error="Désolé, il semble que l'email ou le mot de passe soit incorrect.";
    }
  }
} catch (PDOException $th) {
  die("erreur de la connection" . $th->getMessage());
}


?>
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
    <div class="container_form">
      <form method="POST" action="">
        <div class="A1">
          <p>LOGIN</p>
          <div class="A row ">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email </label>
            <div class="col-em-10">
              <input type="email" class="I1 form-control" id="inputEmail3" name="ac_email" required>
            </div>
          </div>
          <div class="A row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class=" col-em-10">
              <input type="password" class="I1 form-control" id="inputPassword3" name="ac_password" required>
            </div>
          </div>
          <p id="ac_incorect" name="ac_incorect" style="color:red; font-size:14px; margin:0; border:none;"><?php echo $error; ?></p>
          <button type="submit" class="S1 btn" name="login">Sign in</button>
        </div>
      </form>
    </div>
  </header>
  <!-- MY FOOTER -->
  <footer class="">
    <nav class=" navbar  bg-dark navbar-dark ">
      <div class="ac-footer container-fluid">
        <div class="ac_footer1 col-md-4">
          <p style="color:white;">Copyright © 2024<span style="margin:3px"> E.L.L </span> Tous droits réservés</p>
        </div>
        <div class="ac_footer2 col-md-4">
          <p style="color:white; margin-left:0px;  margin-right:0px;"> <ion-icon style="color: rgb(23, 176, 23);" name="location-outline"></ion-icon> Situé à: Alajo, Accra-Ghana</p>
        </div>
        <div class="ac_footer3 col-md-4 ">
          <a style="margin-left: 35px" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-instagram"></ion-icon></a>
          <a style="margin-left: 35px" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-facebook"></ion-icon></a>
          <a style="margin-left: 35px" href=""><ion-icon style="color: rgb(23, 176, 23);" name="logo-tiktok"></ion-icon></a>
          <a style="margin-left: 35px" href=""><ion-icon style="color: rgb(23, 176, 23);" name="mail"></ion-icon></a>
        </div>
      </div>
    </nav>
  </footer>
  <!-- Bootstrap js-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>