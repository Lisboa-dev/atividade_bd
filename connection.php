<?php
 $servername = "localhost";
 $username = "usuario";
 $password="senha";
 $dbname="academia";

 $conn = new mysqli($servername,$username, $password, $dbname );

 if($conn -> connect_error){
    die("connection failed ". $conn->connect_error);
 }
?>
