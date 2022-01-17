<?php
session_start();
if ($_SESSION['teacherid'] == "")

    header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queries</title>
    <style>
        body {
            background-color: #ddd !important;
        }

        table,
        th,
        td {
            border-color: grey !important;
        }
    </style>
    <?php include("includes/includes.php");
    include("includes/navbar.php"); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="py-4">
                        <h1 class="h1 text-danger font-weight-bold heading-1 py-2 text-center rounded">Enquiry</h1>
                    </div>
                    <div class="row">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "sms");
                        $r = mysqli_query($con, "select * from query");
                        echo "<br><table class='table bg-light table-striped table-bordered'>";
                        echo "<thead class='thead-dark'>
                                <tr><th>Id</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Query</th>
                                <th>Delete</th></tr>";
                        $sn = 1;
                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr>";
                            echo "<td>$sn</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            ?>
                             <td><button class="btn text-danger" onclick="if(confirm('are you sure?'))document.location = 'delete.php?c=Query&id=<?php echo $row[0];?>'"><i class="fa fa-trash-alt"></i></button></td>
                            <?php
                            $sn++;
                        }
                        ?>
                        
                    </div>
                </div>
        </div>
    </div>
</body>

</html>