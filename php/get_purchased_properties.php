<?php
session_start();
include 'db.php';

$user = $_SESSION['user'];
$query = "SELECT * FROM purchased_properties WHERE user='$user'";
$result = mysqli_query($conn, $query);

$purchased_properties = array();
while ($row = mysqli_fetch_assoc($result)) {
    $purchased_properties[] = $row;
}

echo json_encode($purchased_properties);
?>
