<?php ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
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
    <?php
    include("include/includes.php");
    include("include/top-bar.php");
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="col-10 mx-auto text-center mt-2">
        <h1 class="font-weight-bold">Query</h1>
    </div>
    <div class="col-md-10 mx-auto bg-light p-3 mb-4 rounded">
        <form action="" method="post">
            <div class="form-group">

            <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name='Name'>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name='Contact'>
                </div>
                <div class="form-group">
                    <label>Query</label>
                    <textarea class="form-control" name='Query'></textarea>
                </div>
                <div class="text-center">
                    <input type='submit' name='submit' value='ADD QUERY' class="btn btn-warning">
                </div>
        </form>
    </div>
    </div>
</body>

</html>
<?php
	if(isset($_POST['submit']))
	{
        $Name=$_POST['Name']; 
        $Contact=$_POST['Contact'];
        $Query=$_POST['Query'];


        $con=mysqli_connect('localhost', 'root', '', 'sms');
        $r1=mysqli_query($con,"insert into query(Name,Contact,Query) values('$Name','$Contact','$Query') ");
        
        if($r1)
        header("location:query.php",true);
        else
        echo mysqli_error($con);
	}
?>
