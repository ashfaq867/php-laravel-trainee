<?php
//class
class Calculator{
    //variables
    public $num1;
    public $num2;
    public $operator;

    //constructor for initialise 2 values and 1 operator
    public function __construct($num1, $num2, $operator)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;
    }
    //function to calculate the values according to given instructions
    public function calculate_result()
    {
        switch ($this->operator) {
            case '+':
                return $this->num1 + $this->num2;
            break;
            case '-':
                return $this->num1 - $this->num2;
            break;
            case '*':
                return $this->num1 * $this->num2;
            break;
            case '/':
                if($this->num2==0){
                    return -1;
                }
                else{
                    return $this->num1 / $this->num2;
                }
            break;
        default:
            return 0;
        }
            
    }
    public function result(){
        echo $this->calculate_result();

    }
}
//obejct of class   /   call calculate_result fuction
$calc=new calculator(5,10,'*');
$calc->result();


?>