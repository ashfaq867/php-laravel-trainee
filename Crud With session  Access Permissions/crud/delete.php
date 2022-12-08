<?php
include('config.php');
include('header.php');
// variable to catch the id that is going to be delete
$id=$_GET['sid'];

// query to delete data of relevant id
$sql="DELETE FROM students WHERE sid={$id}";
$result=mysqli_query($conn,$sql);
//redirect to index page after query success
if($result){
    header("location: index.php");
}
else{
    echo "Error to delete record";
}

?>
<?php include('footer.php');?>