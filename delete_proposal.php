<?php
$OID = $_POST['OID'] ;
echo $OID;
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "DELETE FROM proposal WHERE OID='$OID'";
mysqli_query($conn, $sql);
?>