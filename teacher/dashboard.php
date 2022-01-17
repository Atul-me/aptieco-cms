<?php
session_start();
error_reporting(0);
if ($_SESSION['teacherid'] == "") {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/fontawesome/all.css">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../fonts/Ubuntu.css">
  <link rel="stylesheet" href="../css/overlayScrollbar/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../css/adminlte/adminlte.min.css">
  <!-- custom stylesheet -->
  <link rel="stylesheet" href="css/main.css">

  <script src="../js/jquery/jquery-3.6.0.min.js"></script>
  <script src="../js/bootstrap//bootstrap.bundle.min.js"></script>
  <script src="../js/overlayScrollbar/jquery.overlayScrollbars.min.js"></script>
  <script src="../js/adminlte/adminlte.min.js"></script>

  
</head>

<?php
include '../include/config.php';

$query = "SELECT COUNT(id)students,(SELECT COUNT(id) FROM subjects)subjects,(SELECT COUNT(id) FROM classes)classes,(SELECT COUNT(id) FROM teachers)teachers,(SELECT COUNT(id) FROM parents)parents,(SELECT COUNT(id) FROM results)results FROM students";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
mysqli_close($conn);
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include "includes/navbar.php"; ?>
    <!-- Content Wrapper-->
    <div class="content-wrapper">
      <!-- Main content -->
            <div class="col-md-11 mx-auto border border-dark m-3 rounded">

                <?php
                  include "test/index.php";

                ?>

            </div>
          </div>
        </div>
    </div>
    </section>
  </div>
  </div>
</body>

</html>