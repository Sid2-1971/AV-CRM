<?php

	include 'db_connect.php';
	$operator=$_POST['operator'];
	$snd = json_decode($_POST['snd']);

	foreach ($snd as $key => $value) {
		$query = "UPDATE user SET sendto='".$_POST['operator']." '  WHERE id='".(int)$value."'";

		$result = mysqli_query($con,$query);

		if(!$result)
			die('Error: ' . mysqli_error());
		else
			echo "success";

			$query1="INSERT INTO jobs (`operator`,`id`,`status`) VALUES ('".$_POST['operator']."','".(int)$value."','new')";

			$result1 = mysqli_query($con,$query1);
			//$er=mysqli_query($con,"INSERT INTO note (`id`,`admin`) VALUES ('".(int)$value."','".$operator."')");
			//$is=mysqli_query($con,"UPDATE SET note t1 INNER JOIN note t2 ON t1.id=t2.id SET t1.date=t2.date,t1.note=t2.note,t1.admin=t2.admin WHERE t2.id='".(int)$value."' AND t2.admin='' ")
			//$is=mysqli_query($con,"UPDATE SET note (`date`,`note`) SELECT `date`,`note`, FROM `note` WHERE `id`='".(int)$value."' AND `admin`='".$_SESSION['login_username']."' ");
   //$p=mysqli_query($con,"CREATE TEMPORARY TABLE temp_table ENGINE=MEMORY SELECT * FROM note WHERE id='".(int)$value."' AND admin='".$_SESSION['login_username']."';UPDATE temp_table SET id=NULL;INSERT INTO note SELECT * FROM temp_table;DROP TABLE temp_table;");
	}
mysqli_close($con);



?>
