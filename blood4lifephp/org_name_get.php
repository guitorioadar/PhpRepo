<?php 

include 'connection.php';

//

/*$org_unique_id='123456';

$sql = "SELECT COUNT(*) FROM register_organisation WHERE org_unique_id='$org_unique_id'";

$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

if($row['COUNT(*)'] > 0){
	echo "Already Exist. Choose another name";
}else{
	echo "Success";
}*/


$org_unique_id = $_POST['org_unique_id'];

//$org_unique_id="123456";

$sql = "select * from register_organisation where org_unique_id='$org_unique_id'";
//$result = mysqli_query($con,"select * from register_organisation where org_unique_id='$org_unique_id'");

//$rows = mysqli_num_rows($result);
$res = mysqli_query($con,$sql);

if (mysqli_num_rows($res)==0){
	echo "No organisation is registered with that Id. Please try again";
}elseif (mysqli_num_rows($res)==1) {
	
	$result = array();

	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
			"org_name"=>$row["org_name"]
		)
	);
	}
	echo json_encode(array("result"=>$result));
}else{
	echo "Something went wrong... please try after sometimes or Contact with us";
}


?>