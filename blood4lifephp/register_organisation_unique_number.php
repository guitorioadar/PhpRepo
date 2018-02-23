<?php


$random_num = mt_rand(100000,999999);

asdf($random_num);

function asdf($random_num){

	include 'connection.php';
	//$org_unique_id = "123456";

	if ($result = mysqli_query($con, "SELECT COUNT(*) FROM register_organisation WHERE org_unique_id='" . $random_num . "'")) { 
		
		$row = $result->fetch_assoc(); 
		
		if ($row['COUNT(*)'] == 0) { 
        /////insert the data if not existed///// 
        // ...


			$GLOBALS['$org_unique_id'] = $random_num;
			/*echo $random_num;

			$sql_insert = "insert into register_organisation (org_unique_id) values('$random_num')";

			$rs = mysqli_query($con,$sql_insert);

			if($rs){
				echo "<br>Success";
			}else{
				echo "Problem".mysqli_error();
			}*/

		}else{
			//echo "Meny";
			$random_num = mt_rand(100000,999999);
			asdf($random_num);
		}
	}
}



// function asdf(){

// 	



//     //$org_unique_id = mt_rand(100000, 999999);
// 	/*$org_unique_id = "123456";
// 	$sql = "select * from register_organisation where org_unique_id='$org_unique_id'";

// 	$result = mysqli_query($con,$sql);
// 	$row = mysqli_num_rows($result);
// 	*/


// 	$org_unique_id = "123456";
// 	$result = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE org_unique_id='" . $org_unique_id . "'");  
//     $row = $result->fetch_assoc(); 
//     if ($row['COUNT(*)'] == 0) { 

// 		$sql_insert = "insert into register_organisation (org_unique_id) values('$org_unique_id')";

// 		$rs = mysqli_query($con,$sql_insert);

// 		if($rs){
// 			echo "Success";
// 		}else{
// 			echo "Problem".mysqli_error();
// 		}
// 	}

// }

// asdf();



/*
$conn = mysqli_connect("localhost", "root", "", "cars"); 
if ($result = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE name='" . $username . "'")) { 
    $row = $result->fetch_assoc(); 
    if ($row['COUNT(*)'] == 0) { 
        /////insert the data if not existed///// 
        // ...  
*/

    	?>