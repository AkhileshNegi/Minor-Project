<?php
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$Tno = $_POST['Tno'] ;
$user_payment = "UPDATE payments SET end_payment = 'Paid' WHERE Transaction_No = '$Tno';";
$success_payment = mysqli_query($conn, $user_payment);
?>