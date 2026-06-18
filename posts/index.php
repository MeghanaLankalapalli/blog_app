<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit();
}
include "../config/db.php";
$search = "";
$limit = 3;

$page = isset($_GET['page'])
        ? $_GET['page']
        : 1;

$start = ($page - 1) * $limit;
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $sql = "SELECT * FROM posts
            WHERE title LIKE '%$search%'
            OR content LIKE '%$search%'
            ORDER BY id DESC
            LIMIT $start, $limit";

}
else
{
    $sql = "SELECT * FROM posts
            ORDER BY id DESC
            LIMIT $start,$limit";
}

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
    <p>Welcome <?php echo $_SESSION['username']; ?></p>
<p>Role: <?php echo $_SESSION['role']; ?></p>
    <link rel="stylesheet" href="../assets/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>All Blog Posts</h2>
<form method="GET">
    <input type="text"
           name="search"
           placeholder="Search Posts">

    <button type="submit" class="btn btn-success">
        Search
    </button>
</form>
<br>
<a href="../auth/logout.php">
    Logout
</a>
<br><br>
<a href="create.php" class="btn btn-primary">Add New Post</a>
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
    <?php
if($_SESSION['role'] == "admin")
{
?>
<a href="delete.php?id=<?php echo $row['id']; ?>">
Delete
</a>
<?php
}
?>
    <hr>
<?php
}
?>
<?php

$total_query =
mysqli_query($conn,
"SELECT COUNT(*) as total FROM posts");

$total_row =
mysqli_fetch_assoc($total_query);

$total_pages =
ceil($total_row['total'] / $limit);

echo "<br><br>";

for($i=1; $i<=$total_pages; $i++)
{
    echo "<a href='?page=$i'>$i</a> ";
}

?>
</body>
</html>
