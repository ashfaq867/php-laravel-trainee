<?php
include('config.php');
$sname=$_POST['name'];
$scontact=$_POST['number'];
$scnic=$_POST['cnic'];
$cid=$_POST['course'];
$gid=$_POST['grade'];
$sql="INSERT INTO students SET 
sname='{$sname}',scontact={$scontact},scnic={$scnic},cid={$cid},gid={$gid}";
$result=mysqli_query($conn,$sql);
if($result){
    header("location: index.php");
}
else{
    echo "Something went wrong!";
}


?>