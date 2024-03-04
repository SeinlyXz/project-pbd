<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if($email == "test@gmail.com" && $password == "123"){
    $_SESSION['email'] = $email;
    $_SESSION['username'] = "Super Admin";
    echo "<script>document.location.href='dashboard'</script>";
} else {
    // Return to signin page with error message
    $failed = 1;
    echo "<script>document.location.href='signin?failed=$failed'</script>";
}