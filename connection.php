<?php 

    $con = mysqli_connect("localhost","root","","aone_saloon");

    if($con == false){
        die("connection Error". mysqli_connect_error());
    }
?>