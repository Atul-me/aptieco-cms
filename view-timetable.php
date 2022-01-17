<div class="my-3">
	<?php 
		$query = "SELECT * FROM timetable WHERE ClassId='$row[12]'";
		$r = mysqli_query($conn, $query);
		if(mysqli_num_rows($r) > 0)
		{	
			$timetable = mysqli_fetch_array($r);
			$timetabledata = unserialize($timetable[2]);
			$query = "SELECT * FROM subjects WHERE ClassId='$row[12]'";
			$r = mysqli_query($conn, $query);
		?>
	<table class="table">
	    <tr>
	        <td class="font-weight-bold">Class</td>
	        <td><?php echo $row['ClassName']; ?></td>
	        <td class="font-weight-bold">Publish Date</td>
	        <td><?php echo date("d-m-Y",strtotime($timetable[3])); ?></td>
	    </tr>
	    <tr>
	        <th colspan="2" class="text-center bg-danger">Subject</th>
	        <th colspan="2" class="text-center bg-danger">Exam Date</th>
	    </tr>
	    <?php 
	        while ($subjects = mysqli_fetch_array($r)) {
	            foreach ($timetabledata as $key => $value) {
	                if($subjects[0] == $key)
	                    echo "<tr>
	                            <td colspan='2' class='text-center font-weight-bold'>$subjects[2]($subjects[1])</td>
	                            <td colspan='2' class='text-center'>".date("d-m-Y",strtotime($value))."</td>   
	                        </tr>";
	            }
	        }
	    ?>
	</table>
		<?php
		}
		else
			echo "<h3 class='text-center p-4 m-4 text-danger'>No Data to show yet</h3>";
	?>
</div>