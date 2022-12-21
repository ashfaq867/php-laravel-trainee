<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:PUT');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');


$data=json_decode(file_get_contents('php://input'), true);
$sid=$data['sid'];
$name=$data['sname'];
$scontact=$data['scontact'];
$scnic=$data['scnic'];
$cid=$data['cid'];
$gid=$data['gid'];


include "config.php";
$sql="UPDATE students SET sname='{$name}',scontact={$scontact},scnic='{$scnic}',cid='{$cid},gid='{$gid}' WHERE sid={$sid}";
if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=>'Student Record Updated', 'status'=>'true'));


}
else{
    echo json_encode(array('message'=>'Student Not Record Updated', 'status'=>'False'));
}
?>