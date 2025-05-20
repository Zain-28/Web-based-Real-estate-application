<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $email;
        header('Location: ../dashboard.html');
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "Invalid credentials";
}
?>