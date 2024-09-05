<?php
    include('config.php');
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $image_locate = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $query = "INSERT INTO products(`name`, `price`, `image`) VALUES ('$name', '$price', '$image_name')";
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            if($image_locate)
                $query = "UPDATE products SET `name`='$name',`price`='$price',`image`='$image_name' WHERE id = $id";
            else
                $query = "UPDATE products SET `name`='$name',`price`='$price' WHERE id = $id";
        }
        
        move_uploaded_file($image_locate, 'images/'.$image_name);
        $result = mysqli_query($connection, $query);
        header('location:products_admin.php');
        exit();
    }else
        echo "you should not open page directly";
?>