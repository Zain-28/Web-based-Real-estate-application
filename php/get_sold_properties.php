<?php
session_start();
include 'db.php';

$user = $_SESSION['user'];
$query = "SELECT p.date_of_purchase, s.date_of_sale, p.name, s.total_selling_amount, s.received_amount, s.next_receiving_date, (s.total_selling_amount - p.total_amount_paid) AS total_profit 
          FROM sold_properties s 
          JOIN purchased_properties p ON s.property_id = p.id 
          WHERE p.user = '$user'";
$result = mysqli_query($conn, $query);

$sold_properties = array();
while ($row = mysqli_fetch_assoc($result)) {
    $sold_properties[] = $row;
}

echo json_encode($sold_properties);
?>