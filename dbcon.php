<?php

    $con = mysqli_connect('localhost','root','','sms');

    if($con==false)
    {
        echo "Database is not Connected!";
    }
   
?>