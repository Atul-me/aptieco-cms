<?php
session_start();
include "include/config.php";
if ($_SESSION['studentid'] == "") {
    header("location:student-login.php");
}

$id = intval($_SESSION['studentid']);

$query = "SELECT `results`.*, `students`.*, `classes`.* FROM `results` LEFT JOIN `students` ON `results`.`StudentId` = `students`.`id` LEFT JOIN `classes` ON `results`.`ClassId` = `classes`.`id` WHERE results.StudentId='$id'";

$result = mysqli_query($conn, $query);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $cid = $row['ClassId'];
        $query = "SELECT * FROM subjects WHERE ClassId='$cid'";
        $result = mysqli_query($conn, $query);
        $allmarks = unserialize($row['MarksAll']);
    } else {
        $msg = "Your result isn't declared yet.";
        $query = "SELECT `students`.*, `classes`.* FROM `students` LEFT JOIN `classes` ON `students`.`ClassId` = `classes`.`id` WHERE students.id='$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    }
} else
    echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include "include/includes.php"; ?>
    <style>
        .btn-logout {
            border: none;
        }

        .btn-logout:hover {
            color: white !important;
        }

        .schoolname {
            font-size: 2.2rem;
        }

        table,
        tr,
        td,
        th {
            border-color: #999 !important;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }
        }
    </style>
</head>

<body>
    <?php include "include/top-bar.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-light rounded m-3 p-3 shadow">
                <nav>
                    <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                        <a class="nav-link" id="nav-attendance-tab" data-toggle="tab" href="#nav-attendance" role="tab" aria-controls="nav-profile" aria-selected="false">Attendance</a>
                        <a class="nav-link" id="nav-timetable-tab" data-toggle="tab" href="#nav-timetable" role="tab" aria-controls="nav-profile" aria-selected="false">Time Table</a>
                        <a class="nav-link" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-contact" aria-selected="false">Result</a>
                        <a class="nav-link" id="nav-calendar-tab" data-toggle="tab" href="#nav-calendar" role="tab" aria-controls="nav-contact" aria-selected="false">Calendar</a>
                        <a class="nav-link btn btn-outline-danger btn-logout" href="changepwd.php"> <i class="fa fa-sign-out"></i> Change Password</a>
                        <a class="nav-link btn btn-outline-danger btn-logout" href="logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                            <div class="col-md-6 mr-3 ml-auto my-4 shadow rounded bg-light pt-4 px-3 border border-danger">
                                <form action="" method="post" id="myForm" enctype="multipart/form-data" name="myForm" onreset="clearPhoto()">
                                    <div class="form-group">
                                        <label>Roll Number</label>
                                        <input type="text" class="form-control" value="<?php echo $row['RollNumber'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Enrollment Number</label>
                                        <input type="text" class="form-control" name="enrollnumber" placeholder="Enter Enrollment Number" value="<?php echo $row['EnrollmentNumber'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" name="sname" placeholder="Enter Student Name" value="<?php echo $row['Name'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mother's Name</label>
                                        <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name" value="<?php echo $row['MotherName'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Father's Name</label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name" value="<?php echo $row['FatherName'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $row['PhoneNumber'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent's Phone Number</label>
                                        <input type="text" name="parentphone" class="form-control" placeholder="Enter Parent's Phone Number" value="<?php echo $row['ParentPhoneNumber'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input type="date" name="dob" class="form-control" value="<?php echo $row['DOB'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" name="age" class="form-control" placeholder="Enter Age" value="<?php echo $row['Age'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $row['Address'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row['Email'] ?>" disabled required>
                                    </div>
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="classid" class="custom-select" disabled required>
                                            <option value="<?php echo $row['ClassId'] ?>"><?php echo $row['ClassName'] . " (" . $row['ClassNameNumeric'] . ")" ?></option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="ml-3 my-4 mr-auto">
                                <div class="image-container shadow bg-light rounded border border-danger">
                                    <div id="image-div">
                                        <img id="image" src="photos/<?php echo $row['Name'] . '/' . $row['Photo'] ?>" alt="student image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-calendar" role="tabpanel" aria-labelledby="nav-calendar-tab">
                    <?php include "calendar.php"; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                    <table class="table table-bordered my-4">
                            <tr>
                                <th>Sr. no</th>
                                <th>Subject Name</th>
                                <th>Total Classes</th>
                                <th>Classes attended</th>
                                <th>Percentage</th>
                            </tr>

                            <?php
                                $sno = 1;
                                while ($subjects = mysqli_fetch_array($result)) {
                                    $subject = $subjects[0];
                                    $query = "SELECT COUNT(DISTINCT AttendanceDate) FROM attendance WHERE Subjectid='$subject'";
                                    $r = mysqli_query($conn, $query);
                                    $total = mysqli_fetch_array($r);
                                    $query = "SELECT COUNT(DISTINCT AttendanceDate) FROM attendance WHERE Subjectid='$subject' AND StudentId='$id' AND Attendance='1'";
                                    $r = mysqli_query($conn, $query);
                                    $attended = mysqli_fetch_array($r);
                                    if ($total[0] != 0)
                                        $percent = number_format($attended[0] / $total[0] * 100, 2);
                                    else
                                        $percent = 0;
                                    echo "<tr>
                                                <td>$sno</td>
                                                <td>$subjects[2] ( $subjects[1] )</td>
                                                <td>$total[0]</td>
                                                <td>$attended[0]</td>";
                                    if ($percent < 75)
                                        echo "<td>
                                                    <div class='progress'>
                                                        <div class='progress-bar bg-danger rounded' style='width:" . $percent . "%'>$percent%</div>
                                                    </div>
                                                </td>
                                            </tr>";
                                    else
                                        echo "<td>
                                                    <div class='progress'>
                                                        <div class='progress-bar bg-success rounded' style='width:" . $percent . "%'>$percent%</div>
                                                    </div>
                                                </td>
                                            </tr>";
                                    $sno++;
                                }
                            ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="nav-timetable" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php include "view-timetable.php";?>
                    </div>
                    <div class="tab-pane fade" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
                        <div class="row">
                            <?php
                            if (isset($msg)) {
                                echo "<div class='col-12 text-center m-4 p-4'>
                                        <h4 class='text-danger'>$msg</h4>
                                    </div>";
                            } else {
                            ?>
                                <div id="section-to-print" class="col-md-10 mx-auto p-4 my-5 rounded bg-light">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2" class="text-center font-weight-bold schoolname">Demo School</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $row['Name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Roll No.</td>
                                            <td><?php echo $row['RollNumber'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Enrollment No.</td>
                                            <td><?php echo $row['EnrollmentNumber'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Father's Name</td>
                                            <td><?php echo $row['FatherName'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mother's Name</td>
                                            <td><?php echo $row['MotherName'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>DOB</td>
                                            <td><?php echo date("d-m-Y", strtotime($row['DOB'])) ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="font-weight-bold text-center" style="font-size:1.3rem;">Statement of Marks</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="margin:0!important; padding:0!important;">
                                                <table class="table text-center" style="margin-bottom: 0!important;">
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">#</th>
                                                        <th rowspan="2" class="align-middle">Subject Code</th>
                                                        <th rowspan="2" class="align-middle">Subject Name</th>
                                                        <th colspan="2">Half Yearly Exam</th>
                                                        <th colspan="2">Yearly Exam</th>
                                                        <th rowspan="2" class="align-middle">Total Marks</th>
                                                    </tr>
                                                    <tr>
                                                        <th>marks</th>
                                                        <th>grade</th>
                                                        <th>marks</th>
                                                        <th>grade</th>
                                                    </tr>
                                                    <?php
                                                    $sno = 1;
                                                    $i = 0;
                                                    while ($row1 = mysqli_fetch_array($result)) {
                                                        echo "<tr class='text-center'>
                                                    <td>$sno</td>
                                                    <td>$row1[1]</td>
                                                    <td>$row1[2]</td>";
                                                        if ($row1[0] == $allmarks[0][$i]) {
                                                            echo "<td>" . $allmarks[1][0][$i] . "</td>";
                                                            echo "<td>" . $allmarks[1][1][$i] . "</td>";

                                                            echo "<td>" . $allmarks[2][0][$i] . "</td>";
                                                            echo "<td>" . $allmarks[2][1][$i] . "</td>";

                                                            echo "<td>" . $allmarks[3][$i] . "</td></tr>";
                                                            $i++;
                                                        }
                                                        $sno++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th colspan="3">Total</th>
                                                        <th colspan="2"><?php echo $row['TotalObtainedHYE'] ?></th>
                                                        <th colspan="2"><?php echo $row['TotalObtainedYE'] ?></th>
                                                        <th><?php echo $row['TotalObtained'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3">Percent</th>
                                                        <th colspan="5"><?php echo $row['Percent'] . " %"; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3">Result</th>
                                                        <th colspan="5"><?php echo $row['Result']; ?></th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="text-center">
                                        <button onclick="window.print()" class="btn btn-danger"> Print </button>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php"; ?>

    <script>    
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            e.target.addClass('bg-danger');
            })
    </script>
</body>

</html>