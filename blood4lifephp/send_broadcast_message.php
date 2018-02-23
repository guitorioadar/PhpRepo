<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// API access key from Google API's Console
	define( 'API_ACCESS_KEY', 'AIzaSyBbjsstYRJVD0uIvsemkr5r7uTPQqn1wBk' );
	$target = array();
	$response = array();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$date = $_POST['date'];
	$table = $_POST['table'];
	
	include("dbconnection_open.php");
	
	
	$query = "insert into ".$table."(name,email,message,date) values('$name','$email','$message','$date')";
	
	if(mysql_query($query)){
		$response['data'] = "Message saved!";
	}else{
		$response['data'] = "Message did not saved!";
	}
	
	$table = "registration_requests";
	$query="select fcmDeviceRegID from $table";
	$result=mysql_query($query);
	
	if(mysql_num_rows($result)>0)
	{
		while($row=mysql_fetch_array($result))
		{
			$fcmDeviceRegID=$row['fcmDeviceRegID'];
			
			array_push($target, $fcmDeviceRegID);
		}
	}
	
	// prep the bundle
	$msg = array();
	$msg['message'] = "Broadcast message from ".$name;
	$msg['title'] = 'Broadcast message';
	$msg['subtitle'] = 'New Broadcast Message';
	$msg['subject'] = 'broadcast';
	$msg['vibrate'] = 1;
	$msg['sound'] = 1;
	$msg['largeIcon'] = 'large_icon';
	$msg['smallIcon'] = 'small_icon';

	$fields = array();
	if(is_array($target)){
		$fields['registration_ids'] = $target;
	}else{
		$fields['to'] = $target;
	}
	$fields['data'] = $msg;
	 
	$headers = array
	(
		'Authorization: key=' . API_ACCESS_KEY,
		'Content-Type: application/json'
	);
	 
	$ch = curl_init();
	curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
	curl_setopt( $ch,CURLOPT_POST, true );
	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch );
	curl_close( $ch );

	$jsonObj = json_decode($result);

	$success =  $jsonObj->success; //success value

	$response["success"] = 0;
	$response["message"] = "No result!";

	if($success == 1){
		$response["success"] = 1;
		$response["message"] = "Message sent!";
		
	}else if($success == 0){
		$response["success"] = 0;
		$response["message"] = "Sending Failed!";
		
	}else{
		$response["success"] = 1;
		$response["message"] = "Message sent to ".$success." devices!";
	}

	include("dbconnection_close.php");
	
}
else {
	$response["success"] = 0;
    $response["message"] = "Invalid request";
}

echo json_encode($response);

?>