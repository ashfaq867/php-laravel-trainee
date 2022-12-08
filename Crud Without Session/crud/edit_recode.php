<?php
include('config.php');
$id=$_GET['sid'];
$name=$_POST['name'];
$number=$_POST['number'];
$cnic=$_POST['cnic'];
$course=$_POST['course'];
$grade=$_POST['grade'];
$sql="UPDATE students SET
    sname='{$name}',scontact='{$number}',scnic={$cnic},cid={$course},gid={$grade} WHEREs sid={$id}";
$result=mysqli_query($conn,$sql);
if($result){
    header("location: index.php");
}
else{
    echo "Update failed due to error";
}



?>