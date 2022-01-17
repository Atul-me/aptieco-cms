<?php
    session_start();
    if ($_SESSION['userid'] == "") {
        header("location:admin-login.php");
    }
    include "../include/config.php";

    if(isset($_GET['id']) && $_GET['id'] != "")
    {
        $id = $_GET['id'];
        $query = "SELECT `timetable`.*, `classes`.* FROM `timetable` LEFT JOIN `classes` ON `timetable`.`ClassId` = `classes`.`id` WHERE `timetable`.id='$id'";

        $result = mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $cid = $row['ClassId'];
                $timetable = unserialize($row['TimeTable']);

                $query = "SELECT subjects.* FROM subjects WHERE ClassId = '$cid'";
                $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Time Table</title>
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
        .input-group-text{
            width: 45px;
        }
        select:disabled{
            color: #111 !important;
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
                            <li class="breadcrumb-item"><a href="manage-timetables.php">Manage Time Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Time Table</li>
                        </ol>
                        </nav>
                    </div>
                    <div class="col-12">
                        <h3 class="h3 text-center heading-2 text-danger py-2 mb-1 rounded">Edit Time Table</h3>
                    </div>
                    <div class="col-11 my-2 attendance-div border mx-auto border-danger rounded shadow px-5 pt-4 bg-light">
                        <form action="" method="POST">
                            <label>Class</label>
                            <div class="form-group input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-users-class"></i>
                                    </span>
                                </div>
                                <select name="class" class="custom-select" disabled>
                                    <option value=""><?php echo $row[5]?></option>
                                </select>
                            </div>
                            <label>Subject</label>
                            <div>
                                <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        foreach ($timetable as $key => $value) {
                                            if($row[0] == $key)      
                                                echo "<div class='col-md-9 p-3 mx-auto'><label>$row[2] ( $row[1] )</label><input type='date' class='form-control' value='$value' name='$row[0]' required><input type='hidden' name='sub[]' value='$row[0]'></div>";
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group text-center mt-5 mb-3">
                                <input type="submit" value="Update Time Table" class="btn btn-danger my-3" name="update">
                            </div>
                        </form>
                    </div>
                </div> <!--row-->
            </div> <!--container-fluid-->
        </div> <!--wrapper-content-->
    </div> <!--wrapper-->
    <script>
        $('.attendance-div').overlayScrollbars({
            scrollbars : {
                visibility : 'auto',    //visible || hidden || auto || v || h || a
                autoHide : 'leave',     //never || scroll || leave || n || s || l
                autoHideDelay : 200,    //number
                dragScrolling : true,   //true || false
                clickScrolling : false, //true || false
                touchSupport : true,     //true || false
                snapHandle: true     //true || false
            }
        });
    </script>
</body>
</html>
<?php
            
            }
            else
            {
                header("location: manage-timetables.php");
            }
        }
        else
        {
            echo "<script>alert('ERROR :: some sql query error. See console for more information');";
            echo "console.log('" . mysqli_error($conn) . "');";
            echo "document.location = 'manage-timetables.php'";
        }
    }
    else
        header("location: manage-timetables.php");
    
    if(isset($_POST['update']))
    {
        $timetable = array();
        foreach ($_POST['sub'] as $value) {
            $timetable[$value] = $_POST[$value];   
        }
        $timetableserialized = serialize($timetable);

        $query = "UPDATE `timetable` SET `TimeTable`='$timetableserialized' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo "<script>alert('Time Table Updated');";
            echo "document.location = 'manage-timetables.php'</script>";
        }
        else
            echo "<script>alert('" . mysqli_error($conn) . "')</script>";
    }
?>