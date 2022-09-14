<?php

    $con=mysqli_connect('localhost','root','','idasar');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
    
?>