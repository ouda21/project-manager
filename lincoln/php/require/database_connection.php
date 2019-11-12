<?php
    $host="localhost";
    $name="root";
    $password="";
    $database="lincoln";

    $conn=new mysqli($host,$name,$password,$database);
    if($conn->connect_error){
        die("Error: ".$conn->connect_error);
    }