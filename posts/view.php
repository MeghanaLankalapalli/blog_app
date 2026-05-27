<?php
include "../config/db.php";
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo "<h2>".$row['title']."</h2>";
    echo "<p>".$row['content']."</p>";
    echo "<hr>";
}
?>