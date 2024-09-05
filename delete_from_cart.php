<?php
    if($_GET['id'] && $_GET['idCl']){
        include("config.php");
        $id = $_GET['id'];
        $idCl = $_GET['idCl'];
        $query = "DELETE FROM `card` WHERE id = $id";
        $result = mysqli_query($connection, $query);
        header('location:list_cart_user.php?idCl=' . $idCl);
    }else
        echo "you should not open page directly";
?>