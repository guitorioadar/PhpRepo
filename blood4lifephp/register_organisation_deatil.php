<?php 

include 'connection.php';

include 'register_organisation_unique_number.php';

$org_id = $GLOBALS['$org_unique_id'];

//echo $org_id;

/*$org_name = "wer";
	//$GLOBALS['$org_unique_id'];
$org_email = "wer";
$org_admin_full_name = "wer";
$org_admin_user_name = "wer";
$org_admin_password = "wer";
$et_org_admin_contact_no = "wer";
$org_alternative_contact_no = "wer";
$org_main_address = "wer";
$org_country = "wer";
$org_objective = "wer";
$org_activities = "wer";*/

//if($_SERVER['REQUEST_METHOD']=='POST'){

	$org_name = $_POST['org_name'];
	//$GLOBALS['$org_unique_id'];
	$org_email = $_POST['org_email'];
	$org_admin_full_name = $_POST['org_admin_full_name'];
	$org_admin_user_name = $_POST['org_admin_user_name'];
	$org_admin_password = $_POST['org_admin_password'];
	$org_admin_contact_no = $_POST['org_admin_contact_no'];
	$org_alternative_contact_no = $_POST['org_alternative_contact_no'];
	$org_main_address = $_POST['org_main_address'];
	$org_country = $_POST['org_country'];
	$org_objective = $_POST['org_objective'];
	$org_activities = $_POST['org_activities'];

	
	


	$sql = "insert into register_organisation 
	(
		org_name,
		org_unique_id,
		org_email,
		org_admin_full_name,
		org_admin_user_name,
		org_admin_password,
		org_admin_contact_no,
		org_alternative_contact_no,
		org_main_address,
		org_country,
		org_objective,
		org_activities
	) 
	values 
	(
		'$org_name',
		'$org_id',
		'$org_email',
		'$org_admin_full_name',
		'$org_admin_user_name',
		'$org_admin_password',
		'$org_admin_contact_no',
		'$org_alternative_contact_no',
		'$org_main_address',
		'$org_country',
		'$org_objective',
		'$org_activities'
	)";

	if(mysqli_query($con,$sql)){
		echo "Success";
	}else{
		echo "Error".mysqli_error();
	}



//}


	?>