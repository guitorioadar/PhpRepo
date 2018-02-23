<?php

include 'connection.php';


$org_name = $_POST['org_name'];
//$org_name = "Badhan";

$sql = "SELECT COUNT(*) FROM register_organisation WHERE org_name='$org_name'";

$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

if($row['COUNT(*)'] > 0){
	echo "Already Exist. Choose another name";
}else{
	echo "Success";
}


?>