<?php
try{
$db = new PDO("mysql:host=localhost;dbname=ataberkerday;charset=utf8mb4","root","");
}catch(PDOException $e){
    header("location:error.html");
    die();
}

?>