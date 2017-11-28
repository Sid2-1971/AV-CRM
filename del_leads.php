<?php
	
	include 'db_connect.php';
	$dl = json_decode($_POST['dl']);

	foreach ($dl as $key => $id) {
	
    $query = "DELETE from user where id='".(int)$id."'";
    $result = mysqli_query($con,$query);
    $removeFromOperator=mysqli_query($con,"DELETE  FROM jobs WHERE id='".$id."' ");
    $removeLastCalls=mysqli_query($con,"DELETE  FROM last_call WHERE def='".$id."' ");
    $removeMeetings=mysqli_query($con,"DELETE  FROM admin_jobs WHERE def='".$id."' ");
    $removeNotes=mysqli_query($con,"DELETE  FROM note WHERE id='".$id."' ");
    $removeCallCount=mysqli_query($con,"DELETE  FROM call_count WHERE id='".$id."' ");
		
	}
mysqli_close($con);
?>