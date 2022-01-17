<?php
    session_start();
    if($_SESSION['teacherid'] == "")
    {
        header("location:index.php");
    }
    include "../include/config.php";

    $query = "SELECT id,TotalMaximum,TotalObtained,Percent,Result,(SELECT Name FROM students WHERE results.StudentId=students.id)SName,(SELECT ClassName FROM classes WHERE results.ClassId=classes.id)Class FROM results";

    $result = mysqli_query($conn, $query);
    if($result)
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Results</title>
    <style>
        .table-div{
            overflow-y: scroll;
            height: 430px;
        }
        table{
            position: relative;
        }
        th {
            background-color: #DC3545;
            color: white;
            position: sticky;
            top: 0;
            left: 0;
        }
        .img{
            width: 90px;
            /* height: 90px!important; */
        }
        .del-btn:hover{
            color:red!important;
        }
    </style>
    <?php 
        include "includes/includes.php";
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php include "includes/navbar.php" ?>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="pt-2">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-lg"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Results</li>
                    </ol>
                    </nav>
                </div>
                <h3 class="h3 text-center heading-2 text-danger py-2 mb-3 rounded">Manage Results</h3>
                <div id="table-div" class="table-div rounded">
                    <table id="table" class="table bg-light table-striped text-center display">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Total Maximum Marks</th>
                            <th scope="col">Total Obtained Marks</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Result</th>
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
                                <td><?php echo $row[5] ?></td>
                                <td><?php echo $row[6] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?>%</td>
                                <td><?php echo $row[4] ?></td>
                                <td>
                                    <a href='<?php echo "edit-result.php?id=$row[0]" ?>'><i class="fa fa-edit"></i></a>
                                    <button class="btn del-btn ml-3 text-danger" onclick="if(confirm('are you sure?'))document.location = 'delete.php?c=result&id=<?php echo $row[0];?>'"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                    <?php
                            $sno++;    
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan=8><span class='h3 text-danger text-center'>There is no result Declared yet</span></td></tr>";
                    }
                }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div> <!--Container-fluid-->
        </div> <!--content-wrapper-->
    </div>  <!--wrapper-->
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
        $('#table-div').overlayScrollbars({
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