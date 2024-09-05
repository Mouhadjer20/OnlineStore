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
                                    <a href="addEdit_product.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
            <?php    
                    }
                }
            ?>
            <div class="card" style="width: 18rem;">
                
                <i class="fa-solid fa-circle-plus card-img-top" style="font-size:150px; padding-top:10px"></i>
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">Price</p>
                    <a href="addEdit_product.php" class="btn btn-primary">Add Other</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>