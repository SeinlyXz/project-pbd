<?php

/**
 * FILEPATH: /Applications/MAMP/htdocs/controller/admin.php
 * 
 * Renders the admin index page if the user is logged in, otherwise redirects to the signin page.
 *
 * @return void
 */
function admin_index(){
    if(isset($_SESSION['email'])){
        require_once "views/admin/index.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

/**
 * Creates a new admin user in the system.
 *
 * This function inserts a new record into the 'users' table with the provided email, password, and username.
 * The password is hashed using the PASSWORD_DEFAULT algorithm before storing it in the database.
 * The role of the user is set to 'admin'.
 *
 * @return void
 */

function create_admin(){
    include "../conn.php";
    if(isset($_SESSION['email'])){
        $uuid = substr(uniqid(), 0, 32); // Truncate to fit into 32 characters
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (uuid,username, email, password, role) VALUES ('$uuid','$username','$email', '$hashed_password', 'admin')";
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

function show_admin($uuid){
    include "conn.php";
    session_start();
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM users WHERE uuid = $uuid AND role = 'admin'";
        $user = mysqli_query($conn, $query);
        return $user;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function get_all_admin(){
    include "conn.php";
    if(isset($_SESSION['email'])){
        $query = "SELECT * FROM users WHERE role = 'admin'";
        $users = mysqli_query($conn, $query);
        return $users;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }

}

function search_admin($search){
    include "conn.php";
    if(isset($_SESSION['email'])){
        $escaped_search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT * FROM users WHERE username LIKE '%$escaped_search%' OR email LIKE '%$escaped_search%' AND role = 'admin'";
        $users = mysqli_query($conn, $query);
        return $users;
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

function delete_admin(){
    include "../conn.php";
    if(isset($_SESSION['email'])){
        $email = $_POST['email'];
        $query = "DELETE FROM users WHERE email = '$email' AND role = 'admin'";
        $user = mysqli_query($conn, $query);
        if($user){
            echo "202";
        } else {
            echo "404";
        }
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'create') {
    session_start();
    create_admin();
} else if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    session_start();
    delete_admin();
}

?>