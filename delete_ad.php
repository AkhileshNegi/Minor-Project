<?php
$uid = $_POST['uid'] ;
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "DELETE FROM travel WHERE uid='$uid'";
mysqli_query($conn, $sql);
?>