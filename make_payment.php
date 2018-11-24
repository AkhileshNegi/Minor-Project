<?php
$cost = $_POST['cost'] ;
$AdID = $_POST['AdID'] ;
$Offered_by = $_POST['Offered_by'];
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "SELECT * FROM travel t1 LEFT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.AdID = '$AdID' UNION SELECT * FROM travel t1 RIGHT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.AdID = '$AdID'";
$result = mysqli_query($conn, $sql);
$pay = $result->fetch_assoc();
$fare = $pay["fare"];
$OID = $pay["OID"];
$AdID = $pay["AdID"];
$starting_location = $pay["starting_location"];
$Destination = $pay["destination"];
$Posted_By = $pay["Posted_by"];
$timing = $pay["timing"];
$payment = "INSERT INTO payments (Proposed_Price, Accepted_Price, Order_ID, AdID, Starting_Location, Destination, Posted_By, Fullfilled_By, Timing) VALUES('$fare','$cost','$OID' ,'$AdID','$starting_location','$Destination','$Posted_By', '$Offered_by','$timing')";
$success_trans = mysqli_query($conn, $payment);
?>