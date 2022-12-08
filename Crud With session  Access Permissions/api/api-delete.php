<?php
//headers to control cross region requests/ methods
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:DELET');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,
       ccess-Control-Methods, Authorization, X-Requested-With');

//fetch data
$data=json_decode(file_get_contents('php://input'), true);
$student_id=$data['sid'];

//add configuratoin file 
include "config.php";
//qeury to remove/delete data from database
$sql="DELETE FROM students WHERE sid={$student_id}";
if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=>'Record Deleted successfuly', 'status'=>'True'));


}
else{
    echo json_encode(array('message'=>'Record Deleted Failed', 'status'=>'False'));
}
?>