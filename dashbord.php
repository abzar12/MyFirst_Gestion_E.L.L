<?php
session_start();

require_once("connection.php");

if(!isset($_SESSION["UserId"])){
    header("Location:Login.php");
}
$UserId=$_SESSION["UserId"];
$stmt=$conn->prepare("SELECT * FROM users Where Id=:Id");
$stmt->bindParam(':Id', $UserId);
$stmt->execute();
$UserAll=$stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['LastName']= $UserAll["Nom"];
$_SESSION['FirstName']=$UserAll["Prenom"];
$_SESSION['UserRole'] = $UserAll["Role"];
$LastName =$_SESSION['LastName'];
$FirstName =$_SESSION['FirstName'];
$userRole = $_SESSION['UserRole'];
$img = "img/profile.JPG";
$img1 = "img/Computer.jpg";

$success = $_GET['success'];
if ($success == true) {
    echo ("<script>alert ('The information has been successfully updated') </script>");
}
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $stmt = $conn->prepare("SELECT * FROM Inscription_Etudiant");
    // $stmt->execute();
    // $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // nombre etudiant dans la base 
    $stmt = $conn->query("SELECT COUNT(*) AS TotalOfStudent FROM Inscription_Etudiant");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_ET = $result['TotalOfStudent'];
    $stmt = $conn->query("SELECT COUNT(*) AS TotalNewStudent FROM Students");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_new_Student = $result['TotalNewStudent'];
    $stmt=$conn->query("SELECT COUNT(*) AS TotalAdmin FROM Admin");
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    $Total_Admin=$result['TotalAdmin'];
    $stmt = $conn->query("SELECT COUNT(*) AS Total_Prof FROM teacher");
    $result_Prof = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_Prof = $result_Prof['Total_Prof'];


} catch (PDOException $th) {
    die("ERROR OF SELECT" . $th->getMessage());
}
try {
    // search on the data base
    $search = isset($_POST['query']) ? $_POST['query'] : "";
    if ($_POST['query'] == "") {
        $stmt = $conn->prepare("SELECT * FROM Inscription_Etudiant");
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("SELECT * FROM Inscription_Etudiant WHERE Nom LIKE ? OR Prenom Like ?");
        $stmt->execute(["%$search%", "%$search%"]);
    }

    $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    die("ERREUR DE RECHERCHE" . $th->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Dashbord.css">
    <title>Dashbord</title>
</head>

<body>
    <header>
        <div class="nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="ac_navbar">
                        <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
                        <form class="ac_form" action="">
                            <input type="text" placeholder="Nom OU Prenom" id="recherche">
                        </form>
                        <div class="ac_A1">
                            <p><?php echo "$LastName <br> $FirstName"  ;?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="ac_section1">
        <div class="container-fluid">
           
            <div class="ac_row row">
                <ul class="ac_menu nav  mb-3" id="pills-tab" role="tablist">
                    
                    <li class="active">
                        <a href="dashbord.php"><ion-icon name="speedometer-sharp" class="active"></ion-icon> Dashbord</a>
                    </li> 
                    <?php if($userRole === "Director" ||$userRole === "Staff")  {?>
                    <li>
                        <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon> Admin</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon> Students</a>
                    </li>
                    <?php if($userRole === "Director" ||$userRole === "Staff" ){?>
                    <li>
                        <a href="message.php"><ion-icon name="chatbox"></ion-icon> Message</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="teacher.php"><ion-icon name="person-circle" class="smallicon"></ion-icon> Teachers</a>
                    </li>
                    <?php if($userRole === "Director") {?>
                    <li>
                        <a href="user.php"><ion-icon name="person-circle-outline" class="smallicon"></ion-icon> Users</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="logOut.php"><ion-icon name="log-out"></ion-icon>Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <section class="ac_section2">
        <div class="container">
            <div class="ac_row2 row">
                <div class="card">
                    <div class="card-body">
                        <p><ion-icon name="book-sharp"></ion-icon></p>
                        <p> Total of Students  <?= $Total_new_Student . " "; ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p><ion-icon name="person-circle" class="smallicon"></ion-icon></p>
                        <p><?php echo $Total_Prof . ' '; ?>Teachers</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p><ion-icon name="person-sharp"></ion-icon></p>
                        <p>  administrators<?php echo ' '.$Total_Admin ; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section3">
        <h1><span class="ac_span"><?php echo $Total_ET; ?></span>New students subscribe for last 3months</h1>
        <div class="container ac_table">
            <?php if (count($result1) > 0); ?>
            <table class="table display nowrap" id="_list">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Last_Name</th>
                        <th scope="col">First_Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Duration</th>
                        <th scope="col">__Country__</th>
                        <?php if($userRole === "Director" ||$userRole === "Staff" ) {?>
                        <th scope="col">Action</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody id="mytable_list">
                    <?php if ($result1) : ?>
                        <?php foreach ($result1 as $row): ?>
                            <tr>
                                <th><?= htmlspecialchars($row["ID"]); ?> </th>
                                <td><?= htmlspecialchars($row["Nom"]); ?></td>
                                <td><?= htmlspecialchars($row["Prenom"]); ?></td>
                                <td><?= htmlspecialchars($row["Email"]); ?></td>
                                <td><?= htmlspecialchars($row["Telephone_Whatsapp"]); ?></td>
                                <td><?= htmlspecialchars($row["Dure"]); ?></td>
                                <td><?= htmlspecialchars($row["Pays"]); ?></td>
                                <?php if($userRole === "Director" || $userRole === "Staff" ) {?>
                                <td class="tablebutton">
                                    <a href="editer.php?code=<?= htmlspecialchars($row['ID']); ?> "><button type="button"> <ion-icon name="create-sharp"></ion-icon></button></a>
                                    <a href="supprimer.php?code=<?= htmlspecialchars($row["ID"]); ?>" onclick="return ac_confirm()"><button type="button"><ion-icon name="trash-outline"></ion-icon></button></a>
                                </td>
                                <?php }?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>

    <!-- datatable -->
    <link href="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.css" rel="stylesheet" integrity="sha384-M6C9anzq7GcT0g1mv0hVorHndQDVZLVBkRVdRb2SsQT7evLamoeztr1ce+tvn+f2" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js" integrity="sha384-k90VzuFAoyBG5No1d5yn30abqlaxr9+LfAPp6pjrd7U3T77blpvmsS8GqS70xcnH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="dashbordjava.js">

    </script>
</body>

</html>