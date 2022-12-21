<?php
include "config.php";
//headers to control cross region requests/ methods
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');

//variables to catch data
// $formatData=stripslashes(file_get_contents('php://input'));
// $data=json_decode($formatData, true);
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$encryptPassword=sha1($password);

// catch image temp name    directory
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $tmp_file = $_FILES['image']['tmp_name'];
    $imgName = $_FILES['image']['name'];
    $newImageName  = time() . "-" . $imgName;
    $upload_dir = "./images/" . $newImageName;
    // query
    $sql = "INSERT INTO users (name, email, age, gender, image, password)
    VALUES ('$name}','$email', $age,'$gender', '{$newImageName}','{$encryptPassword}')";
    // upload image to directory
    if (move_uploaded_file($tmp_file, $upload_dir) && mysqli_query($conn, $sql)) {
        echo json_encode(array('message' => 'User sign up successfull', 'status' => 'true'));
    } else {
        echo json_encode(array('message' => 'User  sign failed', 'status' => 'false'));
    }
} else {
    echo json_encode(array('message' => 'Invalid Request', 'status' => 'false'));
}


?>