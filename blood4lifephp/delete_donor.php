<?php

include 'connection.php';

$user_id = $_POST['user_id'];
//$user_id = 21;

$sql = "DELETE FROM `registration` WHERE `registration`.`user_id` = '$user_id' ";

mysqli_query($con,$sql);

 if(mysqli_query($con,$sql)){
	echo "Success DELETE";
 }else{
	echo 'Error';
 }


?>