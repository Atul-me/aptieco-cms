<?php
    session_start();
    include "include/config.php";
    if(isset($_POST['login']))
    {
        $enrollmentnum = $_POST['stu_enroll'];
        $password = $_POST['password'];

        $query = "SELECT * FROM students WHERE EnrollMentNumber = '$enrollmentnum' AND `Password` = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result);
            $_SESSION['studentid'] = $row[0];
            $_SESSION['studentname'] = $row[3];
            header("location:dashboard.php");
        }
        else
            echo "<script>alert('Enrollment number or password wrong.');</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
    
        #footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
        input.btn.btn-danger{
            background-color:#fc3003;
        }
        .bg-dark {
    background-color: #000000!important;
    }
    nav.navbar.navbar-expand-sm.navbar-dark.bg-dark{
        background-color: #3d4854!important;
        padding-top:50px;
        padding-bottom:50px;
    }
    div#footer.text-white.bg-dark.text-center.col-12.pt-3.pb-1{
        background-color: #3d4854!important;
    }
    div.col-md-6.mx-auto.rounded.bg-light.m-4.p-4.mt-5{
        background-color: #303641!important;
    }
    input.form-control{
        background-color: #3d4854;
        border:#3d4854;
    }
    </style>
    <?php include "include/includes.php"; ?>
</head>
<body>
    <?php include "include/top-bar.php"; ?>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto rounded bg-dark m-4 p-4 mt-5">
                <form action="" method="post">
                <h1 class="h1 font-weight-bold text-danger text-center my-5">Student Login</h1>
                    <div class="form-group">
                        <input type="text" name="stu_enroll" class="form-control" placeholder="Enter Enrollment number" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="login" class="btn btn-danger" name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</html>