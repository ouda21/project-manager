<?php
    require "require/database_connect.php";
    if(isset($_POST["register"]))
    {
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $email=$_POST["email"];
        $password=password_hash($_POST["passwrod"],PASSWORD_DEFAULT);
        $confirm_password=password_hash($_POST["confirm_password"],PASSWORD_DEFAULT);
        $age=$_POST["age"];
        $class=$_POST["class"];
        $guardian_name=$_POST["guardian_name"];
        $guardian_phone=$_POST["guardian_phone"];
        $emergency_name=$_POST["emergency"];
        $emergency_phone=$_POST["emergency_phone"];


        $checker=$conn->prepare("SELECT * FROM ambassadors WHERE email=?");
        $checker->bind_param("s",$email);
        $checker->execute();
        $result=$checker->fetchAll();
        if(mysqli_num_rows($result)>0)
        {
            die("User with the same email already exists");
        }
        else
        {
            $query="";

            $stmt=$conn->prepare($query);
            $stmt->bind_param("sssssisssss",$first_name,$last_name,$email,
            $password,$confirm_password,$age,$class,$guardian_name,$guardian_phone
            ,$emergency_name,$emergency_phone);
            $stmt->execute();
        }
    }