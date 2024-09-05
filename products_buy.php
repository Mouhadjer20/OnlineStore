<?php
    include('config.php');
    $query = "SELECT * FROM products";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Products</title>
</head>
<body>
    <div class="container text-center">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>All Products</h2>
                <div><a href="list_cart_user.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
            </div>
        <hr>
        <div class="row">
            <?php 
                if ($result) {
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="images/<?php echo $row['image'] ?>" class="card-img-top" alt="<?php echo $row['image'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                    <p class="card-text"><?php echo $row['price'] ?></p>
                                    <a href="cart_insert.php?idPr=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i> Add to Card</a>
                                </div>
                            </div>
                        </div>
            <?php    
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>