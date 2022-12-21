<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');


$data=json_decode(file_get_contents('php://input'), true);
$name=$data['sname'];
$scontact=$data['scontact'];
$scnic=$data['scnic'];
$cid=$data['cid'];
$gid=$data['gid'];


include "config.php";
$sql="INSERT INTO students(sname,scontact,scnic,cid,gid)
        VALUES('{$name}', {$scontact}, {$scnic},{$cid},{$gid})";
if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=>'Student Record Inserted', 'status'=>'true'));


}
else{
    echo json_encode(array('message'=>'Student Not Record Inserted', 'status'=>'False'));
}
?>