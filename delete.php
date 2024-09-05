<?php 
    include('config.php');
    if($_GET['id']){
        $id = $_GET['id'];
        $query = "DELETE FROM `products` WHERE id = $id";
        $result = mysqli_query($connection, $query);
        header('location:products_admin.php');
    }else
        echo "you should not open page directly";
?>