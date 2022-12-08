<?php
namespace App\Model;
class MainModel{
    private $server ="localhost";
    private $user ="root";
    private $password= "";
    private $database="sms";
    
    private $conn = false;
    public function __construct(){
        
        if(!$this->conn){
            $this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->database) or die();
            // echo "Connection Successfully Created";
        }
        else {
            echo "Failed to connect ";
        }
    }
    public function all(){
         $sql="SELECT * FROM students
         INNER JOIN courses ON students.cid=courses.cid
         INNER JOIN grades ON students.gid=grades.gid";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
}
?>