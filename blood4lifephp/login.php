<?php 

include 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

 //$user_name = "sadman";
 //$password = "sadman";

	$sql = "SELECT * FROM registration WHERE user_name = '$user_name' AND password='$password'";

	$res = mysqli_query($con,$sql);

	$result = array();

	while ($row = mysqli_fetch_array($res)) {
	# code...
		array_push($result, array(

			'user_type' => $row["user_type"], 
			'full_name' => $row["full_name"], 
			'blood_group' => $row["blood_group"], 
			'contact_no' => $row["contact_no"], 
			'user_name' => $row["user_name"], 
			'available_status' => $row["available_status"], 
			'email' => $row["email"], 
			'permanent_address' => $row["permanent_address"] 
			
		)

	);

	}

	echo json_encode(array("result"=>$result));


 /*$check = mysqli_fetch_array($result);
 
 if($check[1]=='General People' || $check[1]=='Admin' || $check[1]=='Member'){
	echo $check[1];
 }else{
	echo 'Invalid Username and Password';
}*/

 /* if($check[1]=='General People'){
 echo $check[1];
 }else if($check[1]=='Admin'){
 echo $check[1];
 }else if($check[1]=='Member')
	echo 'Member';
 }else(){
	echo 'Invalid Username or Password';
} */
}


?>