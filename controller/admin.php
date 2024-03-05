<?php

function admin_index(){
    if(isset($_SESSION['email'])){
        require_once "views/admin/index.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function create_admin(){
    include "../conn.php";
    if(isset($_SESSION['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'admin')";
        $user = mysqli_query($conn, $query);
        if($user){
            echo "202";
        } else {
            echo "403";
        }
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function edit_admin(){
    if(isset($_SESSION['email'])){
        require_once "views/admin/edit.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function show_admin($id){
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM users WHERE id = $id";
        $user = mysqli_query($conn, $query);
        return $user;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'create') {
    session_start();
    create_admin();
}

?>