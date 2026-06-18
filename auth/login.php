<?php
session_start();
include "../config/db.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare(
"SELECT * FROM users WHERE username=?"
);

$stmt->bind_param("s",$username);

$stmt->execute();

$result = $stmt->get_result();
    $user = mysqli_fetch_assoc($result);
    if($user){
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="../assets/style.css">
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