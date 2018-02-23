<?php 

include 'connection.php';

 /* 
 if($con)
	echo 'Connection Success';
  */
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $user_type = $_POST['user_type'];
 $full_name = $_POST['full_name'];
 $blood_group = $_POST['blood_group'];
 $gender = $_POST['gender'];
 $date_of_birth = $_POST['date_of_birth'];
 $contact_no = $_POST['contact_no'];
 $country = $_POST['country'];
 $division = $_POST['division'];
 $district = $_POST['district'];
 $permanent_address = $_POST['permanent_address'];
 $email = $_POST['email'];
 $user_name = $_POST['user_name'];
 $password = $_POST['password'];
 $available_status = $_POST['available_status'];
 
  
 $sql = "insert into registration (user_type,full_name,blood_group,gender,date_of_birth,contact_no,country,division,district,permanent_address,email,user_name,password,available_status) values ('$user_type','$full_name','$blood_group','$gender','$date_of_birth','$contact_no','$country','$division','$district','$permanent_address','$email','$user_name','$password','$available_status')";
  
 if(mysqli_query($con,$sql)){
	echo "Success";
 }else{
	echo 'Error';
 }
 
 
 
 }


?>