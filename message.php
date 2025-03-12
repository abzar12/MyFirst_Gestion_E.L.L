<?php
$conn= new PDO("mysql::host=localhost ; dbname=Gestion_Eudiant", "root", "");
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt= $conn->prepare("SELECT * FROM message");
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt= $conn->query("SELECT COUNT(*) AS Total FROM message");
    $result_ET= $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_ET= $result_ET['Total'];
    $stmt = $conn->query("select Prenom from Students ");
    $result_Nom_Etudiant= $stmt->fetch(PDO::FETCH_ASSOC);
    $Nom_ETudiant= $result_Nom_Etudiant['Prenom'];
} catch (PDOException $th) {
    die("erreur de la connection:").$th->getMessage();
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
    <link rel="stylesheet" href="message.css">
    <title>message</title>
</head>

<body>
    <header>
        <div class="nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="ac_navbar">
                        <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
                        <form class="ac_form" action="">
                            <input type="text" placeholder="recherche">
                            <button type="button" class="search"><ion-icon name="search"></ion-icon></button>

                        </form>
                        <div class="ac_A1">
                            <button type="button"> <ion-icon name="notifications-outline"></ion-icon> </button>
                            <img src="<?php echo $img; ?>" alt="">
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
                    <li>
                        <a href="dashbord.php"><ion-icon name="speedometer-sharp"></ion-icon> Dashbord</a>
                    </li>
                    <li>
                        <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon> Admin</a>
                    </li>
                    <li >
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon> Students</a>
                    </li>
                    <li class="active">
                        <a href="message.php"><ion-icon name="chatbox"></ion-icon> Message</a>
                    </li>
                    <li>
                        <a href="teacher.php"><ion-icon name="person-circle" class="smallicon"></ion-icon> Teachers</a>
                    </li>
                    <li>
                        <a href="user.php"><ion-icon name="person-circle-outline" class="smallicon"></ion-icon> Users</a>
                    </li>
                    <li>
                        <a href="Accueil.php"><ion-icon name="log-out"></ion-icon>Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <section class="section2 py-5">
        <div class="container">
            <div class="ac_etudiant row">
                <div class="menu_etud">
                    <select name="" id="">
                        <option value="level1">All Students</option>
                        <option value="level1">level 1</option>
                        <option value="level1">level 2</option>
                        <option value="level1">level 3</option>
                        <option value="level1">level 4</option>
                        <option value="level1">level 5</option>
                        <option value="level1">level 6</option>
                        <option value="level1">INTER 1</option>
                        <option value="level1">INTER 2</option>
                        <option value="level1">INTER 3</option>
                        <option value="level1">PROF 1</option>
                        <option value="level1">PROF 2</option>
                        <option value="level1">PROF 3</option>
                    </select>
                    <div class="research">
                        <input type="text" placeholder="recherche">
                    <button type="button" class="search"><ion-icon name="search"></ion-icon></button>
                    </div>
                    
                    <button type="button"><ion-icon name="add-circle-outline"></ion-icon>Add students</button>
                    <button type="button"><ion-icon name="print-outline"></ion-icon>Print</button>
                </div>

            </div>
        </div>
    </section>
    <section class="section3">
        <h1>You have <?php echo $Total_ET ;?> messages</h1>
        <?php if(count($result)>0) ;?>
        <div class="container ac_message">
            <?php foreach($result as $row) :?>
                <ul>
                    <li>
                        ID : <?= htmlspecialchars($row['ID']) ;?>
                    </li>
                    <li>
                        Nom : <?= htmlspecialchars($row['ID_ET']) ;?>
                    </li>
                    <li>
                        Email : <?= htmlspecialchars($row['Email']) ;?>
                    </li>
                    <li>
                        Message : <?= htmlspecialchars($row['Message']) ;?>
                    </li>
                    <li>
                        Date : <?= htmlspecialchars($row['create_at']) ;?>
                    </li>
                </ul>
                <?php endforeach ; ?>
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
    <script src="dashbordjava.js"></script>
</body>
</html>