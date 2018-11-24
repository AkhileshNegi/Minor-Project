<?php
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$Tno = $_POST['Tno'] ;
$user_payment = "UPDATE payments SET end_payment = 'Paid' WHERE Transaction_No = '$Tno';";
$success_payment = mysqli_query($conn, $user_payment);
$select_transaction = "SELECT * FROM payments WHERE Transaction_No = '$Tno';";
$transaction = mysqli_query($conn, $select_transaction);
$transaction_details = $transaction ->fetch_assoc();
$AdID = $transaction_details['AdID'];
$status = "UPDATE travel SET status = 'Fullfilled' WHERE AdID = '$AdID';";
$status_update = mysqli_query($conn, $status);
?>