<?php
session_start();
$conn = new PDO("mysql::host=localhost ; dbname=Gestion_Eudiant", "root", "");
$check=$_GET['success'];
if($check){
    echo "<script>alert('The information has been successfully updated')</script>";

}

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $search = isset($_POST['query']) ? $_POST['query'] : "";
    $class_filter = isset($_POST['class_filter']) ? $_POST['class_filter'] : "";
    $stmt = "SELECT * FROM Students WHERE 1=1"; // WHERE 1=1 permet d'ajouter des conditions dynamiques
    $params = [];

    if (!empty($search)) {
        $stmt .= " AND (Nom LIKE ? OR Prenom LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
    }
    if (!empty($class_filter)) {
        $stmt .= " AND Classe = ?";
        $params[] = $class_filter;
    }
    $resl = $conn->prepare($stmt);
    $resl->execute($params);
    $result = $resl->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT COUNT(*) AS Total FROM Students");
    $result_ET = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_ET = $result_ET['Total'];
} catch (PDOException $th) {
    die("erreur de la connection:" . $th->getMessage());
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['deleteStuden'])){
    $IdStudent= $_POST['IdStudent'];
    $stmt=$conn->prepare("DELETE FROM Students WHERE ID= :ID");
    $stmt->bindParam(':ID',$IdStudent);
    $stmt->execute();
    header("Location:".$_SERVER['PHP_SELF']);
}
$LastName = $_SESSION['LastName'];
$FirstName = $_SESSION['FirstName'];
$userRole = $_SESSION['UserRole'];
/*
$class_filter = isset($_GET['class_filter']) ? $_GET['class_filter'] : '';

$sql = "SELECT * FROM Students";
if (!empty($class_filter)) {
    $sql .= " WHERE Classe = :class";
}

$stmt = $conn->prepare($sql);

if (!empty($class_filter)) {
    $stmt->bindParam(':class', $class_filter);
}

$stmt->execute(); 
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="etudiant.css">
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
                            <input type="text" id="search" placeholder="Nom ou Prénom">
                            <!-- <button type="button" class="search"><ion-icon name="search"></ion-icon></button> !-->

                        </form>
                        <div class="ac_A1">
                            <p><?php echo "$LastName <br> $FirstName"; ?></p>
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
                    <?php if($userRole==="Director" || $userRole === "Staff") {?>
                    <li>
                        <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon> Admin</a>
                    </li>
                    <?php };?>
                    <li class="active">
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon> Students</a>
                    </li>
                    <li>
                        <a href="NoteEtudiant.php"><ion-icon name="chatbox"></ion-icon> Note</a>
                    </li>
                    
                    <li>
                        <a href="teacher.php"><ion-icon name="person-circle" class="smallicon"></ion-icon> Teachers</a>
                    </li>
                    <?php if($userRole==="Director") {?>
                    <li>
                        <a href="user.php"><ion-icon name="person-circle-outline" class="smallicon"></ion-icon> Users</a>
                    </li>
                    <?php };?>
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
                    <form method="GET" action="">
                        <select name="class_filter" id="class_filter" value="ALL">
                            <option value="">All</option>
                            <?php

                            // Remplace ceci par la récupération des classes depuis ta base de données
                            $classes = ["Level 1", "Level 2", "Level 2", "Level 3", "Level 4", "Level 5", "Level 6", "INTER 1", "INTER 2", "INTER 3", "PROF 1", "PROF 2", "PROF 3"];
                            foreach ($classes as $class): ?>
                                <option value="<?= htmlspecialchars($class); ?>"
                                    <?= isset($_GET['class_filter']) && $_GET['class_filter'] == $class ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($class); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>


                    <a href="Formulaire.php"><button type="button"><ion-icon name="add-circle-outline"></ion-icon>Add students</button></a>
                    <button type="button"><ion-icon name="print-outline"></ion-icon>Print</button>
                </div>

            </div>
        </div>
    </section>
    <section class="section3">
        <h1><span class="ac_span"><?php echo $Total_ET; ?></span> Students</h1>
        <div class="container ac_table">
            <?php if (count($result) > 0); ?>
            <table class="table display nowrap" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Last_Name</th>
                        <th scope="col">First_Name</th>
                        <th scope="col"> Birthdayhbs</th>
                        <th scope="col">Country</th>
                        <th scope="col">WhatsApp_Number</th>
                        <th scope="col">Number_Ghana</th>
                        <th scope="col">Classroom</th>
                        <th scope="col">Courses</th>
                        <th scope="col">Duration</th>
                        <?php if($userRole==="Director" || $userRole==="Staff") {?>
                        <th scope="col">Action</th>
                        <?php };?>
                    </tr>
                </thead>
                <tbody id="results">
                    <?php if ($result): ?>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <th><?= htmlspecialchars($row["ID"]); ?> </th>
                                <td><?= htmlspecialchars($row["Nom"]); ?></td>
                                <td><?= htmlspecialchars($row["Prenom"]); ?></td>
                                <td><?= htmlspecialchars($row["DateNaissance"]); ?></td>
                                <td><?= htmlspecialchars($row["Country"]); ?></td>
                                <td><?= htmlspecialchars($row["TelephoneWhatsapp"]); ?></td>
                                <td><?= htmlspecialchars($row["TelephoneGhana"]); ?></td>
                                <td><?= htmlspecialchars($row["Classe"]); ?></td>
                                <td><?= htmlspecialchars($row["Formation"]); ?></td>
                                <td><?= htmlspecialchars($row["Dure"]); ?></td>
                                <?php if($userRole==="Director" || $userRole==="Staff") :?>
                                <td class="tablebutton">
                                    <form action="" method="POST">
                                        <a href="EditeStudent.php?code=<?= htmlspecialchars($row["ID"]);?>"><button type="button"> <ion-icon name="create-sharp"></ion-icon></button></a>
                                        <input type="hidden" name="IdStudent" value="<?= htmlspecialchars($row["ID"]); ?>">
                                        <button type="submit" name="deleteStuden" onclick="return confirm('Do you really want to delete this user?')"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>

                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- ------------------------------ mon javascript ------------------------------ !-->
    <script>
        $(document).ready(function() {
            function fetchStudents() {
                var search = $("#search").val(); // Récupère la valeur de l'input de recherche
                var class_filter = $("#class_filter").val(); // Récupère la valeur du filtre de classe

                $.ajax({
                    url: "", // On reste sur la même page
                    method: "POST",
                    data: {
                        query: search,
                        class_filter: class_filter // Ajout du filtre de classe
                    },
                    success: function(data) {
                        $("#results").html($(data).find("#results").html()); // Mise à jour du tableau
                    }
                });
            }

            // Recherche dynamique sur le champ input
            $("#search").on("keyup", function() {
                fetchStudents();
            });

            // Filtrage dynamique par classe
            $("#class_filter").on("change", function() {
                fetchStudents();
            });

            // Chargement initial des étudiants
            fetchStudents();
        });
    </script>
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

</body>

</html>