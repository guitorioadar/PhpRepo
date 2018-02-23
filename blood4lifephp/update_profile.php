<?php

include 'connection.php';



	$user_name = $_POST['user_name'];
	$user_email=$_POST['email'];
	$user_contact_no=$_POST['contact_no'];

	/*$user_name = "asdf";
	$user_email="vulval";
	$user_contact_no="123456";*/


$sql = "UPDATE registration SET email='$user_email',contact_no='$user_contact_no' WHERE user_name= '$user_name'";

if(mysqli_query($con,$sql)){
	echo "Update Success";
}else{
	echo "Problem Updating, Please update later";
}

?>