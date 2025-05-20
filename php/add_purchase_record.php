<?php
session_start();
include 'db.php';

$date_of_purchase = $_POST['date_of_purchase'];
$name = $_POST['name'];
$total_amount_paid = $_POST['total_amount_paid'];
$total_area = $_POST['total_area'];
$user = $_SESSION['user'];

$query = "INSERT INTO purchased_properties (date_of_purchase, name, total_amount_paid, total_area, user) VALUES ('$date_of_purchase', '$name', '$total_amount_paid', '$total_area', '$user')";
if (mysqli_query($conn, $query)) {
    header('Location: ../dashboard.html');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
