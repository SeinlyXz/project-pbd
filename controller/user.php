<?php
function user_index(){
    if(isset($_SESSION['email'])){
        echo "<script>document.location.href='protected'</script>";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function get_all_user(){
    include "conn.php";
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM users";
        $users = mysqli_query($conn, $query);
        return $users;
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

function delete($id){
    include "../conn.php";
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "DELETE FROM users WHERE id = $id AND NOT email = '$email'";
        mysqli_query($conn, $query);
        if(mysqli_affected_rows($conn) > 0){
            echo "201";
        } else {
            echo "404";
        }
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

if (isset($_POST['action']) && $_POST['action'] == "delete"){
    session_start();
    delete($_POST['id']);
}

?>