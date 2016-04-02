<?php
$response_array 	= array();
$response_array['success'] = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_file = basename($_FILES["uImgupload"]["name"]);
    if(!preg_match("/(gif|png|jpg|jpeg|bmp)$/", strtolower(pathinfo($target_file,PATHINFO_EXTENSION)))  && $response_array['success']) {
        $response_array['success'] = false;
    }

    if ($_FILES["uImgupload"]["size"] > 2097152 && $response_array['success']) {
         $response_array['success'] = false;
    }
    if($response_array['success']){
        $uploads_dir = "../admin/images/";
        $tmp_name = $_FILES["uImgupload"]["tmp_name"];
        $name = $_FILES["uImgupload"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}
$response_array['file_path'] =  "$uploads_dir$name";
echo json_encode($response_array);
