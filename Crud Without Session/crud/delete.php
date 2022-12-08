<?php
include('config.php');
$id=$_GET['sid'];
$sql="DELETE FROM students WHERE sid={$id}";
$result=mysqli_query($conn,$sql);
if($result){
    header("location: index.php");
}
else{
    echo "Error to delete record";
}

?>