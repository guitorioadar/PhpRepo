<?php

include 'connection.php';

/* if($con) 
	echo ' success '; 
*/	

	$blood_group = $_POST['blood_group'];
	$country = $_POST['country'];
	$division = $_POST['division'];
	$district = $_POST['district']; 
	
	//$sql = "select * from registration";
	
	
	 if($division=="Select Division" and $district=="Select District"){
		//echo "$blood_group $country";
		$sql = "SELECT * FROM registration WHERE blood_group='$blood_group' AND country='$country'";
	}else if($district=="Select District"){
		//echo "$blood_group $country $division";
		$sql = "SELECT * FROM registration WHERE blood_group='$blood_group' AND country='$country' AND division='$division'";
	}else{
		//echo "$blood_group $country $division $district";
		$sql = "SELECT * FROM registration WHERE blood_group='$blood_group' AND country='$country' AND division='$division' AND district='$district'";
	} 
	 
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
				"full_name"=>$row["full_name"],
				"blood_group"=>$row["blood_group"],
				"contact_no"=>$row["contact_no"],
				"user_id"=>$row["user_id"]
			)
		);
	}
	echo json_encode(array("result"=>$result));
?>