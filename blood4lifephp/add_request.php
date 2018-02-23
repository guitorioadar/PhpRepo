<?php 

include 'connection.php';

 
 /* if($con)
	echo "Connection Success"; */
  
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $date_of_donation = $_POST['date_of_donation'];
 $patient_name = $_POST['patient_name'];
 $gender = $_POST['gender'];
 $blood_group = $_POST['blood_group'];
 $blood_req_reason = $_POST['blood_req_reason'];
 $contact_number = $_POST['contact_number'];
 $relation = $_POST['relation'];
 $quantity_bag = $_POST['quantity_bag'];
 $managed_quantity_bag = $_POST['managed_quantity_bag'];
 $country = $_POST['country'];
 $division = $_POST['division'];
 $district = $_POST['district'];
 //$ = $_POST[''];
 //$ = $_POST[''];
 
  
 //$sql = "insert into registration (user_type,full_name,blood_group,gender,date_of_birth,contact_no,country,division,district,permanent_address,email,user_name,password,available_status) values ('$user_type','$full_name','$blood_group','$gender','$date_of_birth','$contact_no','$country','$division','$district','$permanent_address','$email','$user_name','$password','$available_status')";
  
   $sql = "insert into blood_request (date_of_donation,patient_name,gender,blood_group,blood_req_reason,contact_number,relation,quantity_bag,managed_quantity_bag,country,division,district) values ('$date_of_donation','$patient_name','$gender','$blood_group','$blood_req_reason','$contact_number','$relation','$quantity_bag','$managed_quantity_bag','$country','$division','$district')";
  
 if(mysqli_query($con,$sql)){
	echo "Success";
 }else{
	echo 'Error';
 }
 
 
 
 } 


?>