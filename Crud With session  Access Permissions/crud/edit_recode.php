<?php
include('config.php');
include('header.php');
// variable to catch updated value from the form
$id=$_GET['sid'];
$name=$_POST['name'];
$number=$_POST['number'];
$cnic=$_POST['cnic'];
$course=$_POST['course'];
$grade=$_POST['grade'];

// query to update existing data in database
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
<?php include('footer.php');?>