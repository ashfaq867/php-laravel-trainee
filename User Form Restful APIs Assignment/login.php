<?php
include "config.php";
//headers to control cross region requests/ methods
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');

//variables to catch data
$formatData=stripslashes(file_get_contents('php://input'));
$data=json_decode($formatData, true);
$password=$data['password'];
$encrytPassword=sha1($password);
$email=$data['email'];
$token=random_bytes(15);
$valid_token=bin2hex($token);
$sql="SELECT id, email, password FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $user=mysqli_fetch_assoc($result);
    session_start();
     
    if(!isset($_SESSION['token']) || time()>$_SESSION['expire']){
        if($user['password']==$encrytPassword && $user['email']==$email){        
        $_SESSION['token']=$valid_token;
        $_SESSION['email']=$email;
        $_SESSION['id']=$user['id'];
         // Taking current system Time
         $_SESSION['start'] = time(); 
  
         // Destroying session after 1 minute
         $_SESSION['expire'] = $_SESSION['start'] + 120 ;
        echo json_encode(array("status"=>true, "Message:"=>"You are login",
        "Token:"=>"Token is Valid for 2 minute","Token_Value"=>$valid_token));
    
        }
        else{
            echo json_encode(array("status"=>false, "Message:"=>"Your email/password is incorrect"));
        }

    }
    else{
        echo json_encode(array("status"=>false, "Message:"=>"You Are already Loggedin"));
    }
}
else{
echo json_encode(array("status"=>false, "Message:"=>"No such email found!"));
}

?>