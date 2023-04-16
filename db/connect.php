<?php 
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "employee_db";

    $dsn = "mysql:host=$host; dbname=$db;chartset=utf8"; 
    try{
        $pdo = new PDO($dsn,$username,$password);
        // echo "เชื่อมต่อฐานข้อมูลสำเร็จ";

    }catch(PDOException $e){
        echo $e ->getMessage();
    }
    require_once "db/controller.php";
    require_once "db/user.php";
    $controller = new Controller($pdo);
    $user = new User($pdo);


    $user->insertUser("admin","12345");


?>