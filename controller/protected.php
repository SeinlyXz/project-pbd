<?php

function protected_index(){
    if(isset($_SESSION['email'])){
        require_once "views/protected/rahasia.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}