<?php
    session_start();
    if($_SESSION['teacherid'] == "")
    {
        header("location:index.php");
    }
    include "../include/config.php";
    if(isset($_GET['c']))
    {
        $category = $_GET['c'];
        if($category == "student")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM students WHERE id=$id";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-students.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-students.php';</script>";
                }
            }
            else
            {
                header("location:manage-students.php");
            }
        }
        else if($category == "subject")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM subjects WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-subjects.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-subjects.php';</script>";
                }
            }
            else
            {
                header("location:manage-subjectss.php");
            }
        }
        else if ($category == "class")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM classes WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-classes.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-classes.php';</script>";
                }
            }
            else
            {
                header("location:manage-classes.php");
            }
        }
        else if($category == "result")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM results WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-results.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-results.php';</script>";
                }
            }
            else
            {
                header("location:manage-results.php");
            }
        }
        else if($category == "attendance")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM attendance WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-attendance.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-attendance.php';</script>";
                }
            }
            else
            {
                header("location:manage-attendance.php");
            }
        }
        else if($category == "timetable")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM timetable WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-timetables.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-timetables.php';</script>";
                }
            }
            else
            {
                header("location:manage-timetables.php");
            }
        }
        else if($category == "parent")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM parents WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:manage-parent.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'manage-parent.php';</script>";
                }
            }
            else
            {
                header("location:manage-parent.php");
            }
        }
        else if($category == "Query")
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "DELETE FROM query WHERE id='$id'";
                $result = mysqli_query($conn,$query);
                if($result)
                    header("location:view-query.php");
                else
                {
                    echo "<script> alert('ERROR :: Could not delete the record');
                        document.location = 'view-query.php';</script>";
                }
            }
            else
            {
                header("location:view-query.php");
            }
        }
    }
    else
    	header("location:dashboard.php");
?>