<?php
    include('config.php');
    $name = "";
    $price = "";
    $logo = "logo.jpg";
    $image = "";
    $qt = 1;
    session_start();
    if(isset($_GET['idPr'])){
        $idPr = $_GET['idPr'];
        $idCl = $_SESSION['id'];
        $query = "SELECT * FROM products WHERE id = $idPr";
        if($result = mysqli_query($connection, $query)){
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $qt = $row['quantity'];
                $logo = $image;
            }
        }
    }

    if(isset($_POST['save'])){
        $qt = $_POST['qt'];
        $query = "INSERT INTO `card`(`id_user`, `id_product`, `quantity`) VALUES ('$idCl','$idPr','$qt')";
        $result = mysqli_query($connection, $query);
        header('location:products_buy.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>shopping cart</title>
</head>
<body>
    <center>
        <div class="conainer">
            <div class="main-sm container-sm">
                <div class="wrapper p-5 m-5">
                    <h2 class="h2">shopping</h2>
                    <img src="images/<?php echo $logo ?>" alt="logo" width="300px">
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input class="form-control form-control-lg" name="name" value="<?php echo $name ?>" readonly="readonly">
                    <br>
                    <input class="form-control form-control-lg" name="price" value="<?php echo $price ?>" readonly="readonly">
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="qt" min=1 value=1 max=<?php echo $qt?>>
                        </div>
                        <div class="col">
                            <input type="submit" class="form-control btn btn-primary" name="save" value="Add to Cart">
                        </div>
                    </div>
                    <br>
                </form>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="products_buy.php">Show All Products</a>
            </div>
        </div>
    </center>
</body>
</html>