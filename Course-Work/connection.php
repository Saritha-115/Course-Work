<?php

$con = mysqli_connect("localhost","root","","crud");

if(mysqli_connect_errno()){
    die("Cannot connect to database".mysqli_connect_errno());
}

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/php/Course-Work/uploads/"); 
define("FETCH_SRC","http://localhost/php/Course-Work/uploads/"); 
?>