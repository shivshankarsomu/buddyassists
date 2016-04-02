<?php
session_start();
if(!isset($_SESSION["login_status"]) || !$_SESSION["login_status"]){
    header('Location: /buddyassists/admin');
}
$servername = "localhost";
$user_name = "root";
$password = "";
$page_array = array();
$each_page_array = array();
$conn = new PDO("mysql:host=$servername;dbname=buddyassists", $user_name);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * from pages");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt->rowCount() != 0){
    $i = 0;
    foreach($stmt->fetchAll() as $key=>$value) {
        $each_page_array['id'] = $value['pageid'];
        $each_page_array['name'] = $value['pagename'];
        $page_array[$i] = $each_page_array;
        $i++;
    }
}
foreach ($page_array as $key => $value) {
    echo '
    <svg height="180" width="500">
    <rect x="50" y="20" rx="20" ry="20" width="300" height="150"
style="fill:red;stroke:black;stroke-width:5;opacity:0.5" />
        <text fill="#ffffff" font-size="45" font-family="Verdana"
        x="125" y="110" href="http://www.google.com">'.$value['name'].'</text>
    </svg>';
}?>
