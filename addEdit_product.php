<?php
    include('config.php');
    $name = "";
    $price = "";
    $logo = "logo.jpg";
    $image = "";
    $btn_submit = "Save";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM products WHERE id = $id";
        if($result = mysqli_query($connection, $query)){
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                $logo = $image;
                $btn_submit = "Edit";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Online Store</title>
</head>
<body>
    <center>
        <div class="conainer">
            <div class="main-sm container-sm">
                <div class="wrapper p-5 m-5">
                    <h2 class="h2">Online Store Project</h2>
                    <img src="images/<?php echo $logo ?>" alt="logo" width="300px">
                </div>
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control form-control-lg" type="text" name="name" value="<?php echo $name ?>" placeholder="enter name of product" required>
                    <br>
                    <input class="form-control form-control-lg" name="price" value="<?php echo $price ?>" placeholder="enter price of product" required>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="file" class="form-control">Choose image</label>
                            <input type="file" style="display:none;" id="file" accept="image/png, image/jpeg" value="<?php echo $image ?>" name="image">
                        </div>
                        <div class="col">
                            <input type="submit" class="form-control btn btn-primary" name="save" value="<?php echo $btn_submit?>">
                        </div>
                    </div>
                    <?php 
                        if (isset($_GET['id'])){?>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <?php } ?>
                    <br>
                </form>
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="products_admin.php">Show All Products</a>
            </div>
            <p style="margin-top:15px">Developer By AISSA</p>
        </div>
    </center>
</body>
</html>