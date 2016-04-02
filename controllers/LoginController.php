<?php
$servername = "localhost";
$user_name = "root";
$password = "";
$response_array = array();
session_start();
$_SESSION["login_status"] = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
	if(validator($_POST)){
		$username 	= $_POST['uUsername'];
		$password 	= $_POST['uPassword'];
		$response_array['success'] = true;
	} else
	$response_array['success'] = false;
}

try{
	$conn = new PDO("mysql:host=$servername;dbname=buddyassists", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        $response_array['success'] = false;
        $stmt = $conn->prepare("SELECT password from user where username = '$username'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            foreach($stmt->fetchAll() as $key=>$value) {
                if($value['password'] == $password){
                    $response_array['success'] = true;
					$_SESSION["login_status"] = true;
                }
            }
    	}
	}
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }

 header("Content-type: application/json");
 echo json_encode($response_array);

function validator($obj){
	foreach ($obj as $key => $value) {
		if(!isset($value) || strlen($value) == 0)
			return false;
	}
	return true;
	}
?>
