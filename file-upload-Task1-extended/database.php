<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="form_input";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die("Connection error: " .mysqli_connect_error());
    }
     
?>
