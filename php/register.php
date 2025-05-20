<?php
include 'db.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
if (mysqli_query($conn, $query)) {
    header('Location: ../index.html');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>