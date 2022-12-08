<?php
include('header.php');
require_once "../../vendor/autoload.php";
use App\Controller\MainController;
use App\Model\MainModel;
$obj= new MainController;
$result=$obj->show();
?>


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
<div class="container">
      <div class="row">
        <div class="col-md-8 offset-2 text-center">
          <h1>CRUD IN PHP</h1>
        </div>
      </div>
        <div class="row">
            <div class="col-md-8 offset-2">
              <a href="add_record.php" class="btn btn-primary">Add New Record</a>
                <table class="table table-striped" style="border: 2px solid black">
                    <thead>
                      <tr>
                        <th scope="col">St_ID</th>
                        <th scope="col">St_Name</th>                        
                        <th scope="col">Contact</th>
                        <th scope="col">CNIC</th>
                        <th scope="col">Course</th>
                        <th scope="col">Grades</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>                     
                    <tbody>
                      <?php
                      if(mysqli_num_rows($result)>0){
                      foreach ($result as $user) {
                        
                      
                      ?>
                        <tr>
                            <td><?php echo $user['sid'];  ?></td>
                            <td><?php echo $user['sname'];  ?></td>
                            <td><?php echo $user['scontact'];  ?></td>
                            <td><?php echo $user['cname'];  ?></td>
                            <td><?php echo $user['scnic'];  ?></td>
                            <td><?php echo $user['grades'];  ?></td>                                                
                            <td><a href="#?sid=<?php echo $user['sid']?>" class="btn btn-success">Edit</a></td>
                            <td><a href="#?sid=<?php echo $user['sid']?>" class="btn btn-danger">Delete</a></td>                       
                          </tr>
                          <?php

                      }
                    }

                      ?>
                          </tbody>
                         
                </table>
            </div>
        </div>
        
    </div>
   <?php include('footer.php');?>
</body>
</html>