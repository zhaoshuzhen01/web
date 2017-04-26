<?php
/**
 * Created by PhpStorm.
 * User: ngw9
 * Date: 2017/3/8
 * Time: 16:35
 */
echo "hello word"."<br/>";
$x = 5 ;
$y = 6;
$z = $x + $y;
echo $z ;
class Car
{
   var $color ;
    function Car($color = "green"){
        $this->color = $color;
    }
    function  what_color(){
        return $this->color;
    }
}
function print_vars($obj) {
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n"."<br/>";
    }
}
$mycar = new Car("white");
print_vars($mycar);
echo strlen("adf");
$cars = array("sf","sfd");

?>