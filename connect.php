<?php
    require "config.php";
    try{

        $connect = new PDO("mysql:host=$host; dbname=$dbname", $user , $pass);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<script> console.log('Connected Successfully'); </script>";


    }catch(PDOException $ex){
        echo $ex->getMessage();

    }
    
?>