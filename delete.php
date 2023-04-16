<?php 

require_once "db/connect.php";

if(!isset($_GET["id"])){
    header("location:index.php");
}else{
    $id = $_GET["id"];
    $result = $controller->delete($id);
    if($result){
        header("location:index.php");
    }else{
        echo "SSSS";
    }
}







?>