<?php
$AdID = $_POST['AdID'] ;
echo $AdID;
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "DELETE FROM travel WHERE AdID='$AdID'";
mysqli_query($conn, $sql);
?>