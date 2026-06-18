<?php
include "../config/db.php";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strlen($password) < 6)
{
    echo "Password must be at least 6 characters";
    exit();
}
    if(empty($username) || empty($password))
    {
        echo "Please fill all fields";
        exit();
    }

    if(strlen($password) < 6)
    {
        echo "Password must be at least 6 characters";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users(username, password)
         VALUES(?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $username,
        $hashed_password
    );

    mysqli_stmt_execute($stmt);

    echo "Registration Successful";
}
?>
<form method="POST">

    <input type="text"
           name="username"
           placeholder="Username"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password"
           required>

    <br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>

<link rel="stylesheet" href="../assets/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">