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
$user=mysqli_fetch_assoc($result);
//old password
$oldpassword=$data['oldpassword'];
$encrytPassword=sha1($oldpassword);

//newpassword twice and encrypt it
$newPasswor=$data['newpassword'];
$newencrytPassword=sha1($newPasswor);
$retypePassword=$data['retypepassword'];
$retypecrytPassword=sha1($retypePassword);
session_start();
if(isset($_SESSION['email']) && $user['email']==$email){
    if($user['password']==$encrytPassword){
        if($newencrytPassword==$retypecrytPassword){
            $sql1="UPDATE users SET password='{$newencrytPassword}' WHERE email='{$email}'";
            $result1=mysqli_query($conn,$sql1);
            if($result1){
            echo json_encode(array("Status"=>True,"Message"=>"Your Password is changes Now"));
        }
    }
        

    }else{
        echo json_encode(array("Status"=>false,"Message"=>"Your Password IS incorrect."));
    }
}
else{
    echo json_encode(array("Status"=>false,"Message"=>"Your are not logged in. please login first"));
}