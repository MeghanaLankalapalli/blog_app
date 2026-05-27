<?php
include "../config/db.php";
$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE id=$id";
mysqli_query($conn, $sql);
echo "Post Deleted";
?>