<?php
    session_start();
    if($_SESSION['userid'] == "")
    {
        header("location:admin-login.php");
    }
    if(isset($_POST['create']))
    {
        include '../include/config.php';

        $class = mysqli_real_escape_string($conn, $_POST['classname']);
        $numclass = mysqli_real_escape_string($conn, $_POST['numclassname']);
        $query = "INSERT INTO `classes`(`ClassName`, `ClassNameNumeric`) VALUES ('$class','$numclass')";
        if(mysqli_query($conn, $query))
            echo "Class created";
        else
            echo "ERROR: Could not able to execute $query. ".mysqli_error($conn);

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Class</title>
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
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-lg"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Class</li>
                        </ol>
                        </nav>
                    </div>
                    <div class="col-12">
                        <h3 class="h3 text-center heading-2 text-danger py-2 mb-3 rounded">Add Class</h3>
                    </div>
                    <div class="col-md-8 mx-auto rounded bg-light border border-danger shadow my-4 px-4 py-3 pt-5">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-font-case"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="classname" placeholder="Enter class name" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-font-case"></i>
                                    </span>
                                </div>
                                <input type="text" name="numclassname" class="form-control" placeholder="Enter numeric class name" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-danger" value="Add Class" name="create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>