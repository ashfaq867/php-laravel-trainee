<?php
class task1{                                    //Class 
    public function table($n){                  // method takes num of rows as parameter
        for($row=1;$row<=$n;$row++){            // loop to print row as per parameter
            for($col=1;$col<=6;$col++){         // Loop to print column upto 6
                echo $col*$row ." ";            // print values as  
            }
         echo "<br>";                           //break out of loop
        }
    }
     
    public function buildings($heights){          // method takes num/height of building as parameter
        rsort($heights);                          // convertion of array into descending order    
        $length=count($heights);                  // count number of buildings
        echo "Desc Sorted Buildings!<br>";        // Print out same text
        for($i=0;$i<$length;$i++){                // loop to print buildings in Sorted form / descending form
           echo $heights[$i]." ";                 // print value of building height
        }
        echo "Top 3 Buildings are:<br>";          // print same text
        for($i=0;$i<3;$i++){                      // loop to print top 3 values
        echo $heights[$i]." ";                    // print height of building
        }
    }
}
$obj=new task1();                                      //object to call class method
echo "<h2>Question #1:<br><br></h2>";                  //print same text
$obj->table(7);                                        //call method from class that takes values as argument
echo "<h2>Question #2:<br><br></h2>";                  //print same text
$building_heights = [25, 19, 23, 45, 18, 26, 24, 16];   //building heights   
$obj->buildings($building_heights);                     // call method from class that takes building heights as argument
?>