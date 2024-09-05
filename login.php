<?php 
include_once('config.php');

if (isset($_POST['save'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));
    
    $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
    
    if ($result = mysqli_query($connection, $query)) {
        if ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            header('Location: products_buy.php');
            exit();
        } else {
            $error = "Wrong email or password.";
        }
    } else {
        $error = "An error occurred during login. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style><?php include "css/bootstrap-register.css" ?></style>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h2 class="card-title text-center">Login</h2>
                    <div class="card-body py-md-4">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                            </div>          
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a href="register.php">Register</a>
                                <input type="submit" name="save" class="btn btn-primary" value="Login">
                            </div>
                            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>