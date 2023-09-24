<?php
$servername="localhost";
$username="root";
$password="";
$databasename="ArsenalPortfolio";

$conn= new mysqli($servername,$username,$password,$databasename);
if($conn->connect_error){
    die("Connection error " .$conn->connect_error);
}
?>