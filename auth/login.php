<?php
session_start();
include "../config/db.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if($user){
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            header("Location: ../posts/index.php");
            exit();
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User Not Found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login Page</h2>
<form method="POST">
    <input type="text"
           name="username"
           placeholder="Enter Username"
           required>
    <br><br>
    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>
    <br><br>
    <button type="submit" name="login">
        Login
    </button>
</form>
</body>
</html>
<link rel="stylesheet" href="../assets/style.css">