<?php
include "config.php";
//headers to control cross region requests/ methods
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');

$formatData=stripslashes(file_get_contents('php://input'));
$data=json_decode($formatData, true);
$email=$data['email'];
$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);


// if(empty($result)){
//     echo json_encode(array("Status"=>False,"Message"=>"Email not found!"));
// }
$user=mysqli_fetch_assoc($result);

//new password
$password=$data['newpassword'];
$retpyepassword=$data['retypepassword'];
$encrypt1=sha1($password);
$encrypt2=sha1($retpyepassword);
if($email==$user['email'] && $encrypt1==$encrypt2){
    echo json_encode(array("Status"=>True,"Message"=>"Your Password is Reset NOW!"));
}
else{
    echo json_encode(array("Status"=>False,"Message"=>"Password Reset Failed!"));
}



?>