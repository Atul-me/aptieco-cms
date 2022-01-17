<?php
session_start();
if ($_SESSION['userid'] == "") {
    header("location:admin-login.php");
}
include "../include/config.php";
if (isset($_POST['add'])) {
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $Aadhaar = mysqli_real_escape_string($conn, $_POST['Aadhaarnumber']);
    $account = mysqli_real_escape_string($conn, $_POST['accountnumber']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $parentphone = mysqli_real_escape_string($conn, $_POST['parentphone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $cid = mysqli_real_escape_string($conn, $_POST['classid']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $maxsize = 5 * 1024 * 1024;
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");

        //Getting File information from FILES array
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $path = "../photos/$sname/";

        if (!file_exists($path)) {
            mkdir($path);
        }

        //Getting extension in $ext
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            echo "<script>alert('Error: Please select a valid file format.');</script>";
        }
        //checking file size
        else if ($filesize > $maxsize) {
            echo "<script>alert('Error: File should be less then 5Mb.');</script>";
        } else if (in_array($filetype, $allowed)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $path . $filename) == 1) 
            {
                $pass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') ,0 ,6);
                $query = "INSERT INTO `teachers` VALUES (NULL,'$Aadhaar','$account','$sname','$fname','$mname','$address','$email','$dob','$age','$phone','$parentphone','$cid','$filename','$gender','$pass')";
                $result = mysqli_query($conn, $query);
                if ($result)
                {
                    echo "<script>alert('Teacher Added');</script>";
                }
                else {
                    echo "<script>window.alert(\"Erorr : " . mysqli_error($conn) . "\");";
                    echo "window.history.back();</script>";
                }
            } else
                echo "<script>alert('Error : Could not upload file');</script>";
        }
    } else
        echo $_FILES['photo']['error'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teachers</title>
    <style>
        /* .image-container {
            width: 280px;
            height: 300px;
            overflow: hidden;
        } */

        #image-div {
            width: 200px;
            height: 200px;
            margin: 25px auto 5px;
        }

        #image {
            width: 200px;
            height: 200px;
            border-radius: 5px;
        }
        .input-group-text{
            width: 45px!important;
        }
        .form-div{
            height: 435px;
            overflow-y: scroll;
        }
    </style>
    <?php 
        include "includes/includes.php";
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "includes/navbar.php" ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-2">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-lg"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Teachers</li>
                        </ol>
                        </nav>
                        </div>
                    <div class="col-12">
                    
                        <h3 class="h3 text-center heading-2 text-danger py-2 mb-1 rounded">Add new teacher</h3>
                    </div>
                    <div class="col-md-6 mr-3 ml-auto shadow rounded bg-light my-2 pt-4 px-3 border border-danger form-div">
                        <form action="" method="post" id="myForm" enctype="multipart/form-data" name="myForm" onreset="clearPhoto()">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-list-ol"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="Aadhaarnumber" placeholder="Enter aadhaar card no." required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-list-ol"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="accountnumber" placeholder="Enter Account Number" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-font-case"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="sname" placeholder="Enter Teacher Name" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-font-case"></i>
                                    </span>
                                </div>
                                <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-font-case"></i>
                                    </span>
                                </div>
                                <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="custom-control custom-radio custom-control-inline ml-5 pl-5">
                                    <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline pl-5">
                                    <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" name="parentphone" class="form-control" placeholder="Enter Home Phone Number" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-birthday-cake"></i>
                                    </span>
                                </div>
                                <input type="text" name="age" class="form-control" placeholder="Enter Age" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-map-marked-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-at"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-users-class"></i>
                                    </span>
                                </div>
                                <select name="classid" class="custom-select" required>
                                    <option value="">Select Class</option>
                                    <?php
                                    $query = "SELECT * FROM classes";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result))
                                            echo "<option value='" . $row['id'] . "'>" . $row['ClassName'] . " ( " . $row['ClassNameNumeric'] . " )" . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-6 my-3 text-center">
                                    <input type="submit" name="add" class="btn btn-danger" value="Add Teacher">
                                </div>
                                <div class="col-md-6 my-3 text-center">
                                    <input type="reset" value="Clear Form" class="btn btn-danger">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 mr-auto my-2 ml-3">
                        <div class="image-container shadow bg-light rounded border border-danger">
                            <div id="image-div"><img id="image" src="img/default-user.jpg" alt="teacher image"></div>
                            <div class="custom-file">
                                <input type="file" form="myForm" name="photo" class="custom-file-input" accept=".jpg,.png,.jpeg" onchange="show()" id="photo" required>
                                <label class="custom-file-label" for="photo">Choose Photo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.form-div').overlayScrollbars({
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

        $('#photo').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
        $('#myForm').on("reset",function(){
            $('.custom-file-label').html("Choose Photo");
        });
    </script>
</body>
</html>