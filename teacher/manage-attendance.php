<?php
    session_start();
    if ($_SESSION['teacherid'] == "") {
        header("location:index.php");
    }
    include "../include/config.php";

    $query = "SELECT DISTINCT `attendance`.`AttendanceDate`,`attendance`.`SubjectId`, `classes`.*, `subjects`.* FROM `attendance` LEFT JOIN `classes` ON `attendance`.`ClassId` = `classes`.`id` LEFT JOIN `subjects` ON `attendance`.`SubjectId` = `subjects`.`id` ORDER BY `attendance`.`AttendanceDate` DESC";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <style>
        .attendance-div{
            height: 440px;
            overflow-y: scroll;
            position: relative;
        }
        th {
            background-color: #DC3545;
            color: white;
            /* position: sticky;
            top: 0;
            left: 0; */
        }
    </style>
    <?php
        include "includes/includes.php";
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "includes/navbar.php"; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-2">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-lg"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Attendance</li>
                        </ol>
                        </nav>
                    </div>
                    <div class="col-12">
                        <h3 class="h3 text-center heading-2 text-danger py-2 mb-1 rounded">Manage Student Attendance</h3>
                    </div>
                    <div class="col-12 rounded attendance-div my-2">
                        <table id="table" class="table bg-light table-striped text-center display">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Attendance Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            $sno = 1;
                            while($row = mysqli_fetch_array($result))
                            {
                        ?>
                                <tr>
                                    <td><?php echo $sno ?></td>
                                    <td><?php echo $row['ClassName'] ?></td>
                                    <td><?php echo $row['SubjectName'] . " ( " . $row['SubjectCode'] . " )";?></td>
                                    <td><?php echo date('d-m-Y',strtotime($row['AttendanceDate'])); ?></td>
                                    <td>
                                        <a href='<?php echo "edit-attendance.php?cid=$row[2]&sid=$row[5]&date=$row[0]" ?>'><i class="fa fa-edit"></i></a>
                                        <button class="btn del-btn mx-2 text-danger" onclick="if(confirm('are you sure?'))document.location = 'delete.php?c=attendance&cid=<?php echo $row[2];?>&sid=<?php echo $row[5];?>&date=<?php echo $row[0];?>'"><i class="fa fa-trash-alt"></i></button>
                                        <a href='<?php echo "view-attendance.php?cid=$row[2]&sid=$row[5]&date=$row[0]" ?>'><i class="fa fa-arrow-right"></i></a>
                                    </td>
                                </tr>
                        <?php
                                $sno++;    
                            }
                        }
                            else
                                echo "<tr>
                                        <td colspan=5><span class='text-danger font-weight-bold'>No Record Available</span></td>
                                    </tr>";
                            echo "</tbody></table>";
                        ?>
                    </div>
                </div> <!--row-->
            </div> <!--container-fluid-->
        </div> <!--wrapper-content-->
    </div> <!--wrapper-->
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "scrollY": "340px",
                // "scrollCollapse": true,
                // "infoEmpty": "No records available",
                // "sProcessing": "DataTables is currently busy",
                "processing": true,
                "paging": false,
                "info":false
            });
        });
        $('.attendance-div').overlayScrollbars({
            scrollbars : {
                visibility : 'hidden',    //visible || hidden || auto || v || h || a
                // autoHide : 'leave',     //never || scroll || leave || n || s || l
                // autoHideDelay : 200,    //number
                // dragScrolling : true,   //true || false
                // clickScrolling : false, //true || false
                // touchSupport : true,     //true || false
                // snapHandle: true     //true || false
            }
        });
    </script>
</body>
</html>