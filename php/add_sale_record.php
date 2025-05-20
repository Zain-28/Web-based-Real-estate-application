<?php
include 'db.php';

$property_id = $_POST['property_id'];
$date_of_sale = $_POST['date_of_sale'];
$total_selling_amount = $_POST['total_selling_amount'];
$received_amount = $_POST['received_amount'];
$next_receiving_date = $_POST['next_receiving_date'];

$query = "INSERT INTO sold_properties (property_id, date_of_sale, total_selling_amount, received_amount, next_receiving_date) VALUES ('$property_id', '$date_of_sale', '$total_selling_amount', '$received_amount', '$next_receiving_date')";
if (mysqli_query($conn, $query)) {
    $update_query = "UPDATE purchased_properties SET sold = 1 WHERE id = '$property_id'";
    mysqli_query($conn, $update_query);
    header('Location: ../dashboard.html');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>