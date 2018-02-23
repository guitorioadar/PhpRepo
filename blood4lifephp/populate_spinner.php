<?php


include 'connection.php';


	$sql = "select full_name from registration";

	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
				"full_name"=>$row["full_name"],
		)
	);
	}
	echo json_encode(array("result"=>$result));


?>