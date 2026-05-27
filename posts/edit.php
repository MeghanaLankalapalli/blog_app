<?php
include "../config/db.php";
$id = $_GET['id'];
if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts
            SET title='$title', content='$content'
            WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "Post Updated";
}
$sql = "SELECT * FROM posts WHERE id=$id";
$result = mysqli_query($conn, $sql);
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