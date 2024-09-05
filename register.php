<?php 
include_once('config.php');

if (isset($_POST['save'])) {
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));
    $conf_password = mysqli_real_escape_string($connection, md5($_POST['confPassword']));
    
    if ($password === $conf_password) {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        
        // Code to insert user
        $query = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($connection, $query);

        header("Location: login.php");
        exit();
    } else {
        $error = "Please enter matching passwords.";
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
    <title>Register</title>
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h2 class="card-title text-center">Register</h2>
                <div class="card-body py-md-4">
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                        </div>          
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm-password" name="confPassword" placeholder="Confirm Password" required>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="login.php">Login</a>
                            <input type="submit" name="save" class="btn btn-primary" value="Create Account">
                        </div>
                        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>