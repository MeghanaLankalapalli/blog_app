<?php
session_start();

if($_SESSION['role'] != 'admin')
{
    die("Access Denied");
}

include "../config/db.php";

$id = $_GET['id'];

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM posts WHERE id=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit();
?>