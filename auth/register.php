<?php
include "../config/db.php";
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(username, password)
            VALUES('$username', '$hashed_password')";
    mysqli_query($conn, $sql);
    echo "Registration Successful";
}
?>
<form method="POST">
<input type="text" name="username" placeholder="Username">
<br><br>
<input type="password" name="password" placeholder="Password">
<br><br>
<button type="submit" name="register">
Register
</button>
</form>
<link rel="stylesheet" href="../assets/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">