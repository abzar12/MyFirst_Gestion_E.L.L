<?php
session_start();

if (!isset($_SESSION["UserId"])) {
    header("Location:Login.php");
} 
require_once("connection.php");
// for the updating 
$success = $_GET['success'];
if ($success) {
    echo "<script>alert('The information has been successfully updated')</script>";
}
$code = $_GET['code'];
if ($code) {
    echo "<script>alert('The user has been saved')</script>";
}

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $stmt = $conn->prepare("SELECT * FROM Admin");
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $conn->query("SELECT COUNT(*) AS Total FROM Admin");
    $result_ET = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_ET = $result_ET['Total'];
} catch (PDOException $th) {
    die("erreur de la connection:" . $th->getMessage());
}
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAdmin'])) {
        $IdAdmin = $_POST['deleteAdmin'];
        $stmt = $conn->prepare("DELETE FROM Admin WHERE ID=:ID");
        $stmt->bindParam(':ID', $IdAdmin);
        $stmt->execute();
        header("Location: administrateur.php");
    }
} catch (Throwable $th) {
    die("erreur de supprimetion:" . $th->getMessage());
}
// search on the data base
try {
    $search = isset($_POST['query']) ? $_POST['query'] : "";
    if ($_POST['query'] == "") {
        $stmt = $conn->prepare("SELECT * FROM Admin");
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("SELECT * FROM Admin WHERE Nom LIKE ? OR Prenom Like ?");
        $stmt->execute(["%$search%", "%$search%"]);
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $th) {
    die("ERREUR DE RECHERCHE" . $th->getMessage());
}
$LastName = $_SESSION['LastName'];
$FirstName = $_SESSION['FirstName'];
$userRole = $_SESSION['UserRole'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <!-- about search on the table ajax !-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- end of search on the table ajax !-->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navbarSidebar.css">
    <title>administrateur</title>
</head>

<body>
    <header>
        <div class="nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="ac_navbar">
                        <a class="Logo navbar-brand text-uppercase" href="Accueil.php"><span>E.L.L</span></a>
                        <form class="ac_form" action="" method="POST">
                            <input type="text" placeholder="Search Name" id="recherche">
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
                        <a href="dashbord.php"><ion-icon name="speedometer-sharp"></ion-icon> <span>Dashboard</span></a>
                    </li>
                    <?php if ($userRole === "Director" || $userRole === "Staff") { ?>
                        <li class="active">
                            <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon> <span>Admin</span></a>
                        </li>
                    <?php }; ?>
                    <li>
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon><span>Students</span> </a>
                    </li>
                    <?php if ($userRole === "Director" || $userRole === "Staff") { ?>
                        <li>
                            <a href="message.php"><ion-icon name="chatbox"></ion-icon> <span>Message</span></a>
                        </li>
                    <?php }; ?>
                    <li>
                        <a href="teacher.php"><ion-icon name="person-circle" class="smallicon"></ion-icon> <span>Teachers</span></a>
                    </li>
                    <?php if ($userRole === "Director") { ?>
                        <li>
                            <a href="user.php"><ion-icon name="person-circle-outline" class="smallicon"></ion-icon> <span>Users</span></a>
                        </li>
                    <?php }; ?>
                    <li>
                        <a href="logOut.php"><ion-icon name="log-out"></ion-icon><span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <section class="section2 py-5">
        <div class="container">

            <div class="ac_etudiant row">
                <div class="menu_etud">
                    <?php if ($userRole === 'Staff' || $userRole === 'Director') : ?>
                        <a href="AddAdmin.php?tableName=Admin"><button type="button"><ion-icon name="add-circle-outline"></ion-icon>Add Admin</button></a>
                    <?php endif; ?>
                    <button type="button"><ion-icon name="print-outline"></ion-icon>Print</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section3">
        <h1><span class="ac_span"><?php echo $Total_ET; ?></span> Administrators</h1>
        <div class="container ac_table">
            <?php if (count($result) > 0); ?>
            <table class="table display nowrap" id="Mytable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Last_Name</th>
                        <th scope="col">First_Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col"> _Birthday_ </th>
                        <th scope="col">Country</th>
                        <th scope="col">Number_Ghana</th>
                        <?php if ($userRole === 'Staff' || $userRole === 'Director') { ?>
                            <th scope="col">Action</th>
                        <?php }; ?>
                    </tr>
                </thead>
                <tbody id="mytable_list">
                    <?php if (!empty($result)) : ?>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <th><?= htmlspecialchars($row["ID"]); ?> </th>
                                <td><?= htmlspecialchars($row["Prenom"]); ?></td>
                                <td><?= htmlspecialchars($row["Nom"]); ?></td>
                                <td><?= htmlspecialchars($row["Email"]); ?></td>
                                <td><?= htmlspecialchars($row["DateNaissance"]); ?></td>
                                <td><?= htmlspecialchars($row["Pays"]); ?></td>
                                <td><?= htmlspecialchars($row["Telephone"]); ?></td>
                                <?php if ($userRole === 'Staff' || $userRole === 'Director') { ?>
                                    <td class="tablebutton">
                                        <a href="modifyAdmin.php?code=<?= htmlspecialchars($row['ID']); ?>&tableName=Admin"><button type="submit"> <ion-icon name="create-sharp"></ion-icon></button></a>
                                        <form method="POST">
                                            <button type="submit" onclick="return confirm('Do you really want to delete this user?')" value="<?= htmlspecialchars($row['ID']); ?>" name="deleteAdmin"><ion-icon name="trash-outline"></ion-icon></button>
                                        </form>
                                    </td>
                                <?php }; ?>
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
    <!-- about search on the table ajax !-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- datatable -->
    <link href="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.css" rel="stylesheet" integrity="sha384-M6C9anzq7GcT0g1mv0hVorHndQDVZLVBkRVdRb2SsQT7evLamoeztr1ce+tvn+f2" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js" integrity="sha384-k90VzuFAoyBG5No1d5yn30abqlaxr9+LfAPp6pjrd7U3T77blpvmsS8GqS70xcnH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="admin.js"></script>
</body>


</html>