<?php
include('config.php');
include('header.php');
//variables to catch data from form when it submited
$sname=$_POST['name'];
$scontact=$_POST['number'];
$scnic=$_POST['cnic'];
$cid=$_POST['course'];
$gid=$_POST['grade'];

// query to insert data into database
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
<?php include('footer.php');?>