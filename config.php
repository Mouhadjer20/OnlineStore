<?php
    $connection = mysqli_connect("db", "root", "root", "store");    
    if ($connection -> connect_errno) {
        echo "Failed to connect to dataBase: " . $connection -> connect_error;
        exit();
    }
?>