<?php
include "conn.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $email, $password);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    echo "<script>document.location.href='dashboard'</script>";
} else {
    // Return to signin page with error message
    $failed = 1;
    echo "<script>document.location.href='signin?failed=$failed'</script>";
}