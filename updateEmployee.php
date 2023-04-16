<?php 
require_once "db/connect.php";

if(isset($_POST["submit"])){
    $id=$_POST["emp_id"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $salary=$_POST["salary"];
    $department_id=$_POST["department_id"];
    
    $result = $controller->update($fname,$lname,$salary,$department_id,$id);

    if($result){
        header("location:index.php");
        
    }


}







?>