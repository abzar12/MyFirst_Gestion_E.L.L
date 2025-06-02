<?php
session_start();

if (!isset($_SESSION["UserId"])) {
    header("Location:Login.php"); 
}
$timeout = 1800;
if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout){
    session_unset();
    session_destroy();
    header("Location: Login.php");
}

require_once("connection.php");
$success = $_GET['success'];
if ($success) {
    echo "<script>alert('The information has been successfully updated')</script>";
}
$code = $_GET['code'];
if ($code) {
    echo "<script>alert('The user has been saved')</script>";
}

// if ($code === false) {
//     echo "<script>alert('All fields are required\"TRY IT AGAIN \” ')</script>";
// }
 
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // select all users on the data base
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Count all users on the data base
    $stmt = $conn->query("SELECT COUNT(*) AS Total FROM users");
    $result_T = $stmt->fetch(PDO::FETCH_ASSOC);
    $Total_T = $result_T['Total'];
} catch (PDOException $th) {
    die("erreur de la connection:" . $th->getMessage());
}
try {
    // delete one professor on the data base script delete
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAdmin'])) {
        $IdAdmin = $_POST['deleteAdmin'];
        $stmt = $conn->prepare("DELETE FROM users WHERE ID=:ID");
        $stmt->bindParam(':ID', $IdAdmin);
        $stmt->execute();
        header("Location:users.php");
    }
} catch (Throwable $th) {
    die("erreur de supprimetion:" . $th->getMessage());
}
$LastName = $_SESSION['LastName'];
$FirstName = $_SESSION['FirstName'];
$userRole = $_SESSION['UserRole'];
$_SESSION['LAST_ACTIVITY'] = time();
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
                        <form class="ac_form" action="">
                            <input type="text" placeholder="recherche">

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
                        <a href="dashbord.php"><ion-icon name="speedometer-sharp"></ion-icon> <span>Dashboard</span> </a>
                    </li>
                    <?php if($userRole === "Director" ||$userRole === "Staff" ){?> 
                    <li >
                        <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon><span>Admin</span> </a>
                    </li>
                    <?php };?>
                    <li>
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon><span>Students</span> </a>
                    </li>
                    <?php if($userRole === "Director" ||$userRole === "Staff" ){?> 
                    <li>
                        <a href="message.php"><ion-icon name="chatbox"></ion-icon> <span>Message</span></a>
                    </li>
                    <?php };?>
                    <li >
                        <a href="teacher.php"><ion-icon name="person-circle" class="smallicon"></ion-icon> <span>Teachers</span></a>
                    </li>
                    <li class="active">
                        <a href="user.php"><ion-icon name="person-circle-outline" class="smallicon"></ion-icon> <span>Users</span></a>
                    </li>
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
                        <a href="AddUsers.php"><button type="button"><ion-icon name="add-circle-outline"></ion-icon>Add Users</button></a>
                    <?php endif; ?>
                    <button type="button"><ion-icon name="print-outline"></ion-icon>Print</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section3">
        <h1><span class="ac_span"><?php echo $Total_T; ?></span> Administrator</h1>
        <div class="container ac_table">
            <?php if (count($result) > 0); ?>
            <table class="table display nowrap" id="Mytable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Last_Name</th>
                        <th scope="col">First_Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col">Number_Ghana</th>
                        <th scope="col">Action</th>
                        <?php if ($userRole === 'Staff' || $userRole === 'Director') { ?>
                            <th scope="col">Action</th>
                        <?php }; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <th><?= htmlspecialchars($row["ID"]); ?> </th>
                            <td><?= htmlspecialchars($row["Prenom"]); ?></td>
                            <td><?= htmlspecialchars($row["Nom"]); ?></td>
                            <td><?= htmlspecialchars($row["Email"]); ?></td>
                            <td><?= htmlspecialchars($row["Number"]); ?></td>
                            <td><?= htmlspecialchars($row["Role"]); ?></td>
                            <?php if ($userRole === 'Staff' || $userRole === 'Director') { ?>
                                <td class="tablebutton">
                                    <a href="modifyAdmin.php?code=<?= htmlspecialchars($row['ID']); ?>&tableName=Teacher"><button type="submit"> <ion-icon name="create-sharp"></ion-icon></button></a>
                                    <form method="POST">
                                        <button type="submit" onclick="return confirm('Do you really want to delete this user?')" value="<?= htmlspecialchars($row['ID']); ?>" name="deleteAdmin"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>
                                </td>
                        </tr>
                    <?php }; ?>
                <?php endforeach; ?>
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
    <script src="dashbordjava.js"></script>
</body>
<script>
    // function supprim(){
    //     if(confirm(""));
    // }
</script>

</html>