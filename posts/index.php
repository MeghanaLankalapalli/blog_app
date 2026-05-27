<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit();
}
include "../config/db.php";
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>
<h2>All Blog Posts</h2>
<a href="../auth/logout.php">
    Logout
</a>
<br><br>
<a href="create.php">Add New Post</a>
<hr>
<?php
while($row = mysqli_fetch_assoc($result)) {
?>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['content']; ?></p>
    <small>
        Created At:
        <?php echo $row['created_at']; ?>
    </small>
    <br><br>
    <a href="edit.php?id=<?php echo $row['id']; ?>">
        Edit
    </a>
    <br><br>
    <a href="delete.php?id=<?php echo $row['id']; ?>">
        Delete
    </a>
    <hr>
<?php
}
?>
</body>
</html>
<link rel="stylesheet" href="../assets/style.css">