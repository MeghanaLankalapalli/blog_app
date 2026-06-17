<?php
include '../config/db.php';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO posts(title, content) 
            VALUES('$title', '$content')";
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
<link rel="stylesheet" href="../assets/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Add New Post</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Enter Title">
    <br><br>
    <textarea name="content" placeholder="Enter Content"></textarea>
    <br><br>
    <button type="submit" name="submit">Add Post</button>
</form>
</body>
</html>