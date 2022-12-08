<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD OPERATIONS</title>
</head>
<body>
<?php 
include('config.php');   
include('header.php');
?>
<div class="container">
      <div class="row">
        <div class="col-md-8 offset-2 text-center">
          <h1>CRUD IN PHP</h1>
        </div>
      </div>
        <table class="table table-striped" style="border: 2px solid black">
                    <thead>
                      <tr>
                        <th scope="col">St_ID</th>
                        <th scope="col">St_Name</th>                        
                        <th scope="col">Contact</th>
                        <th scope="col">CNIC</th>
                        <th scope="col">Course</th>
                        <th scope="col">Grades</th>
                        <?php
                          if(isset($_SESSION['role']) && ($_SESSION['role']=="super admin")){
                          ?>  
                       
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                        
                        <?php
                        }
                        elseif(isset($_SESSION['role']) && ($_SESSION['role']=="admin")){
                          ?>
                            <th scope="col">Action</th>
                        
                        
                          <?php
                        }
                        ?>
                      </tr>
                    </thead>                     
                    <tbody>
                      <?php   
                        //query to fetch all data from table and show in table form  
                      $sql="SELECT * FROM students
                      INNER JOIN courses ON students.cid=courses.cid
                      INNER JOIN grades ON students.gid=grades.gid";
                      $result=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $record){
                        ?>
                          <tr>
                            <td><?php echo $record['sid'];  ?></td>
                            <td><?php echo $record['sname'];  ?></td>
                            <td><?php echo $record['scontact'];  ?></td>
                            <td><?php echo $record['cname'];  ?></td>
                            <td><?php echo $record['scnic'];  ?></td>
                            <td><?php echo $record['grades'];  ?></td>  
                            <?php
                          if(isset($_SESSION['role']) && ($_SESSION['role']=="super admin")){
                          ?>  
                       
                            <td><a href="edit.php?sid=<?php echo $record['sid']?>" class="btn btn-success">Edit</a></td>
                            <td><a href="delete.php?sid=<?php echo $record['sid']?>" class="btn btn-danger">Delete</a></td>
                        
                        <?php
                        }
                        elseif(isset($_SESSION['role']) && ($_SESSION['role']=="admin")){
                          ?>
                            <td><a href="edit.php?sid=<?php echo $record['sid']?>" class="btn btn-success">Edit</a></td>
                        
                        
                          <?php
                        }?>
                        </tr>
                          </tbody>
                          <?php
                          }
                      }?>
                </table>
            </div>
        </div>
        
    </div>
    <?php include('footer.php');?>
</body>
</html>