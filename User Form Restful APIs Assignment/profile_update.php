<?php
include('config.php');
//headers to control cross region requests/ methods
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');
session_start();
if(isset($_SESSION['token']) && $_SESSION['email'])
{
    $email = $_SESSION['email'];
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $tmp_file = $_FILES['image']['tmp_name'];
        $imgName = $_FILES['image']['name'];
        $newImageName  = time() . "-" . $imgName;
        $upload_dir = "./images/" . $newImageName;
        // query
        $sql="UPDATE users SET image='$newImageName'
                where email='$email'";
        if (move_uploaded_file($tmp_file, $upload_dir) && mysqli_query($conn, $sql)) {
            echo "Successfully uploaded of " . $email ;
            echo json_encode(array('message' => 'Profile Picture Update', 'status' => 'true'));
        } else {
            echo json_encode(array('message' => 'Something went wrong', 'status' => 'false'));
        }
    } else {
        echo json_encode(array('message' => 'Error (Path-Issue)', 'status' => 'false'));
    }
}
else
    {
        echo json_encode(array('message' => 'User not exist','status' => 'false'));
    }
?>