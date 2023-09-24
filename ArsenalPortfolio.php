<?php
    $servername="localhost";
    $username="root";
    $password="";

    $con=new mysqli($servername, $username, $password);
    if($con->connect_error){
        die("Connection error " .$con->connect_error);
    }

    $sql="CREATE DATABASE IF NOT EXISTS ArsenalPortfolio";
    if($con->query($sql)===TRUE){
        echo"Successfully created a database";
    }else{
        echo "Database creation failed ". $con->connect_error;
    }

    $con->select_db("ArsenalPortfolio");

    $sql1 = "CREATE TABLE IF NOT EXISTS skillset(skill VARCHAR(45) NOT NULL,img BLOB)";
    if($con->query($sql1)===TRUE){
        echo " Successfully created a table";
    }else{
        echo "Table creation error " . $con->error;
    }

$con->close(); 

?>