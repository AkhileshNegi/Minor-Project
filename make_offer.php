<?php
$cost = $_POST['cost'] ;
$AdID = $_POST['AdID'] ;
$user_name = $_POST['user_name'];
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "INSERT INTO proposal (price,AdID,Name) VALUES('$cost','$AdID','$user_name')";
mysqli_query($conn, $sql);
?>