<?php
  include('config.php');
  session_start();
  $total_price=0;
  $user = "Client";
  if (isset($_SESSION['id'])) {
    $idCl = $_SESSION['id'];
    $user = $_SESSION['name'];
    $query = "SELECT c.id, p.name, c.quantity, p.price
        FROM card c
        INNER JOIN products p ON c.id_product = p.id 
        WHERE c.id_user = $idCl";
    if($result = mysqli_query($connection, $query))
        $row = mysqli_fetch_assoc($result);
  }
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
    <title>Shopping list</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>All Shopping of <strong><?php echo $user?></strong></h2>
                <div><a href="products_buy.php"><i class="fa-solid fa-cart-shopping"></i></a></div>
            </div>
            <hr>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">product name</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                            $total_price += (float)$row['quantity'] * (float)$row['price'];
                        ?>
                        <tr>
                          <td scope="col"><?php echo $row['id']?></td>
                          <td scope="col"><?php echo $row['name']?></td>
                          <td scope="col"><?php echo $row['quantity']?></td>
                          <td scope="col"><?php echo $row['price']?></td>
                          <td scope="col"><i onclick="delete_from_cart(<?php echo $row['id']?>, <?php echo $idCl?>)" class="fa-regular fa-trash-can"></i><td>
                        </tr>
                        <?php
                      }
                    }
                  ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Total Price </th>
                        <th colspan="3" style="text-align: right;" scope="col"><?php echo $total_price . "$"?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>