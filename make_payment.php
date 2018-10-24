<?php
$cost = $_POST['cost'] ;
$AdID = $_POST['AdID'] ;
$user_name = $_POST['user_name'];
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "SELECT * FROM travel t1 LEFT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.Offered_by = '$user_name' UNION SELECT * FROM travel t1 RIGHT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.Offered_by = '$user_name'";
mysqli_query($conn, $sql);
?>