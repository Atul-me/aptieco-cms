<?php
session_start();
error_reporting(0);
if ($_SESSION['userid'] == "") {
  header("location:admin-login.php");
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
      <section class="content">
        <div class="container-fluid">
          <div class="py-4">
            <h1 class="h1 text-danger font-weight-bold heading-1 py-2 text-center rounded">Dashboard</h1>
          </div>
          <div class="row">

            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-students.php">
                <div class="visual">
                  <i class="fa fa-users"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['students'] ?></span>
                  </div>
                  <div class="desc">Total Students</div>
                </div>
              </a>
            </div>

            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-subjects.php">
                <div class="visual">
                  <i class="fa fa-book"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['subjects'] ?></span>
                  </div>
                  <div class="desc">Total Subjects</div>
                </div>
              </a>
            </div>


            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-classes.php">
                <div class="visual">
                  <i class="fa fa-users-class"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['classes'] ?></span>
                  </div>
                  <div class="desc">Total Classes</div>
                </div>
              </a>
            </div>

            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-results.php">
                <div class="visual">
                  <i class="fa fa-file-spreadsheet"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['results'] ?></span>
                  </div>
                  <div class="desc">Total Results</div>
                </div>
              </a>
            </div>

            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-teachers.php">
                <div class="visual">
                  <i class="fa fa-book"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['teachers'] ?></span>
                  </div>
                  <div class="desc">Total Teachers</div>
                </div>
              </a>
            </div>

            <div class="col-md-5 mt-2 mx-auto">
              <a class="dashboard-stat blue" href="manage-parent.php">
                <div class="visual">
                  <i class="fa fa-book"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span><?php echo $row['parents'] ?></span>
                  </div>
                  <div class="desc">Total Parents</div>
                </div>
              </a>
            </div>
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