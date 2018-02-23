<?php 

	include 'connection.php';
	
	$sql = "select * from blood_request";
	
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
				"patient_name"=>$row["patient_name"],
				"blood_group"=>$row["blood_group"],
				"contact_number"=>$row["contact_number"]
			)
		);
	}
	echo json_encode(array("result"=>$result));

?>