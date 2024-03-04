<?php

function user_index(){
    if(isset($_SESSION['email'])){
        echo "<script>document.location.href='protected'</script>";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function edit(){
    if(isset($_SESSION['email'])){
        require_once "view/edit.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function show($id){
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM users WHERE id = $id";
        $user = mysqli_query($conn, $query);
        return $user;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function create(){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_SESSION['email'])){
        require_once "view/create.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}