<?php
require ("dbconn.php");
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$dbconn = dbconn();
if (!$dbconn) {
	    die("dbconnection failed: " . mysqli_dbconnect_error());
	} 
	else {
$action = $_GET['action'];
switch($action){
    case 'checkLogin':
    $accountName = $_GET['name'];
		$password = $_GET['password'];
        $sql = "SELECT * FROM Account WHERE accountName = '$accountName'";
        $result = mysqli_query($dbconn, $sql);
        if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        $accountID = $row['accountID'];
        if (password_verify($password, $row['password'])){
				$data = array(
					'status' => "true",
					'accountID'=> $accountID
					);

                    echo json_encode($data);
			}
			else{
				echo "false";
			}
        }
        }else{
            echo "false";
        }
    break;    

default:

    break;
}
    }
mysqli_close($dbconn);
?>