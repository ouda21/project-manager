<?php
     session_start();
    require "reqiure/database_connect.php";

    if(isset($_POST["login"]))
    {
        $email=$_POST["email"];
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
        $query="SELECT * FROM ambassadors WHERE email=? AND password=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result=$stmt->fetchAll();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $_SESSION["email"]=$row["email"];
                echo "Login Successful ambassador ".$_SESSION["email"];
            }
        }
        else
        {
            die("Wrong username or password");
        }
    }