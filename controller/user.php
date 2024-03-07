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
    session_start();
    if(isset($_SESSION['email'])){
        require_once "view/edit.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function show($uuid){
    include "conn.php";
    if(isset($_SESSION['email'])){
        // Escape the $uuid value using mysqli_real_escape_string
        $escaped_uuid = mysqli_real_escape_string($conn, $uuid);

        // Construct the SQL query with the escaped $uuid value
        $query = "SELECT * FROM users WHERE uuid = '$escaped_uuid'";
        
        // Execute the query
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        } else {
            echo "<script>document.location.href='signin'</script>";
        }
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function search_user($search){
    include "conn.php";
    if(isset($_SESSION['email'])){
        $escaped_search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT * FROM users WHERE username LIKE '%$escaped_search%' OR email LIKE '%$escaped_search%'";
        $users = mysqli_query($conn, $query);
        return $users;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function create(){
    session_start();
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
    session_start();
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

if (isset($_POST['action'])) {
    if ($_POST['action'] == "delete"){
        delete($_POST['id']);
    } elseif ($_POST['action'] == "create"){
        create();
    } elseif ($_POST['action'] == "show"){
        show($_POST['id']);
    } elseif ($_POST['action'] == "edit"){
        edit();
    } elseif ($_POST['action'] == "get_all_user"){
        get_all_user();
    }
}

?>