<?php 
    $connection = mysqli_connect('localhost','root','','wheels_drive');
    if(!$connection) echo "DB connection failed!";
    // else echo "DB Connected!"
?>