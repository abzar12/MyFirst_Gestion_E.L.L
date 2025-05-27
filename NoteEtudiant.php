<?php
session_start();

require_once("connection.php");
$UserId = $_SESSION["UserId"];
if (!isset($UserId)) {
    header("Location:Login.php");
    exit();
}
$timeout = 1800;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: Login.php");
    exit();
}

$success = $_GET['success'];
if ($sucesuccessss == true) {
    echo ("<script> alert('SUCCESSFULL...')</script>");
}

$search = isset($_POST['query']) ? $_POST['query'] : "";
if ($_POST['query'] == "") {
    $stmt = $conn->prepare("SELECT * FROM NoteEtudiant");
    $stmt->execute();
} else {
    $stmt = $conn->prepare("SELECT * FROM NoteEtudiant WHERE Nom LIKE ? OR Prenom LIKE ? OR Classroom LIKE ?");
    $stmt->execute(["%$search%", "%$search%", "%$search%"]);
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$Total_ET = count($result);
// binding the three table students NoteEtudiant and classroom with the table Event_ST_Note_CL;
try {

    $stmt = $conn->query("   SELECT Students.ID, Students.Nom , Students.Prenom, NoteEtudiant.Classroom, 
                                  NoteEtudiant.Dictation, NoteEtudiant.Vocabulary, NoteEtudiant.Expression, 
                                  NoteEtudiant.Pronunciation, NoteEtudiant.Orale, NoteEtudiant.Reading, NoteEtudiant.Grammar,NoteEtudiant.Moyenne
                           
                            FROM Students 
                             JOIN NoteEtudiant On Students.ID = NoteEtudiant.ID_ST
                            JOIN Event_ST_Note_CL on NoteEtudiant.ID_Note = Event_ST_Note_CL.ID_Note
                            JOIN Classroom on Event_ST_Note_CL.ID_Class = Classroom.Class_ID
                            ORDER BY NoteEtudiant.Classroom ASC
                        ");
    $stmt->execute();
    $FullNote = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $th) {
    die("ERROR OF DATA BASA" . $th->getMessage());
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
    <!-- about search on the table ajax !-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end of search on the table ajax !-->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="etudiant.css">
    <link rel="stylesheet" href="navbarSidebar.css">
    <title>NoteEtudiant</title>
</head>
<style>
    @media print {

        #table-container,
        #table-container * {
            visibility: visible;
        }

        .tablebutton {
            visibility: hidden;
        }

        #table-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12px;
        }
    }
</style>

<body>
    <header>
        <div class="nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="ac_navbar">
                        <a class="Logo navbar-brand text-uppercase" href="#"><span>E.L.L</span></a>
                        <form class="ac_form" action="">
                            <input type="text" id="search" placeholder="search Name">
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
                        <a href="dashbord.php"><ion-icon name="speedometer-sharp"></ion-icon> <span>Dashbord</span></a>
                    </li>
                    <?php if ($userRole === "Director" || $userRole === "Staff") { ?>
                        <li>
                            <a href="administrateur.php"><ion-icon name="person-sharp"></ion-icon> <span>Admin</span></a>
                        </li>
                    <?php }; ?>
                    <li>
                        <a href="etudiant.php"><ion-icon name="book-sharp"></ion-icon><span>Students</span> </a>
                    </li>
                    <li class="active">
                        <a href="NoteEtudiant.php"><ion-icon name="chatbox"></ion-icon><span>Note</span> </a>
                    </li>
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
                    <form method="GET" action="EditeNote.php">
                        <select name="level" id="class_filter">
                            <option value="">All</option> 
                            <option value="Level 1">Level 1</option>
                            <option value="Level 2">Level 2</option>
                            <option value="Level 3">Level 3</option>
                            <option value="Level 4">Level 4</option>
                            <option value="Level 5">Level 5</option>
                            <option value="Level 6">Level 6</option>
                            <option value="INTER 1">INTER 1</option>
                            <option value="INTER 2">INTER 2</option>
                            <option value="INTER 3">INTER 3</option>
                            <option value="PROF 1">PROF 1</option>
                            <option value="PROF 2">PROF 2</option>
                            <option value="PROF 3">PROF 3</option>
                        </select>
                        <button type="submit">MODIFY<ion-icon name="create-sharp"></ion-icon></button>
                    </form>


                    <button type="button" onclick="printtable()"><ion-icon name="print-outline"></ion-icon>Print</button>
                </div>

            </div>
        </div>
    </section>
    <section class="section3">
        <h1><span class="ac_span"><?php echo $Total_ET; ?></span> Students</h1>
        <div class="container ac_table" id="table-container">
            <?php (count($FullNote) > 0); ?>
            <table class="table display nowrap" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Student_Id</th>
                        <th scope="col">First_Name</th>
                        <th scope="col">Last_Name</th>
                        <th scope="col">Classroom</th>
                        <th scope="col">Dictation</th>
                        <th scope="col">Vocabulary</th>
                        <th scope="col">Expression</th>
                        <th scope="col">Pronunciation</th>
                        <th scope="col">Orale</th>
                        <th scope="col">Reading</th>
                        <th scope="col">Grammar</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody id="mytable_list">
                    <?php if (!empty($FullNote)): ?>
                        <?php foreach ($FullNote as $row): ?>
                            <tr>
                                <th><?= htmlspecialchars($row["ID"]); ?> </th>
                                <td><?= htmlspecialchars($row["Nom"]); ?></td>
                                <td><?= htmlspecialchars($row["Prenom"]); ?></td>
                                <td><?= htmlspecialchars($row["Classroom"]); ?></td>
                                <td><?= htmlspecialchars($row["Dictation"]); ?></td>
                                <td><?= htmlspecialchars($row["Vocabulary"]); ?></td>
                                <td><?= htmlspecialchars($row["Expression"]); ?></td>
                                <td><?= htmlspecialchars($row["Pronunciation"]); ?></td>
                                <td><?= htmlspecialchars($row["Orale"]); ?></td>
                                <td><?= htmlspecialchars($row["Reading"]); ?></td>
                                <td><?= htmlspecialchars($row["Grammar"]); ?></td>
                                <td><?= htmlspecialchars($row["Moyenne"]); ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- ------------------------------ mon javascript ------------------------------ !-->
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var search = $("#search").val();

                $.ajax({
                    url: "",
                    method: "POST",
                    data: {
                        query: search
                    },
                    success: function(data) {
                        $("#mytable_list").html($(data).find("#mytable_list").html());
                    }
                });
            });
        });
    </script>
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="asset/js/bootstrap.bundle.min.js"></script>

    <!-- datatable
    <link href="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.css" rel="stylesheet" integrity="sha384-M6C9anzq7GcT0g1mv0hVorHndQDVZLVBkRVdRb2SsQT7evLamoeztr1ce+tvn+f2" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js" integrity="sha384-k90VzuFAoyBG5No1d5yn30abqlaxr9+LfAPp6pjrd7U3T77blpvmsS8GqS70xcnH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>
<script>
    function printtable() {
        const printContents = document.getElementById('table-container').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</html>