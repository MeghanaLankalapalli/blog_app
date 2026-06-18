<?php
include "../config/db.php";
$id = $_GET['id'];
if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = mysqli_prepare(
    $conn,
    "UPDATE posts
     SET title=?, content=?
     WHERE id=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssi",
    $title,
    $content,
    $id
);

mysqli_stmt_execute($stmt);

echo "Post Updated";
}
$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM posts WHERE id=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
?>
<form method="POST">
<input type="text" name="title"
value="<?php echo $row['title']; ?>">
<br><br>
<textarea name="content"><?php
echo $row['content'];
?></textarea>
<br><br>
<button type="submit" name="update">
Update
</button>
</form>
<link rel="stylesheet" href="../assets/style.css">