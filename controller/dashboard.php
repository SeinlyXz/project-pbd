<?php

function dashboard_index(){
    if(isset($_SESSION['email'])){
        require_once "views/dashboard/index.php";
    } else {
        echo "<script>document.location.href='signin'</script>";
    }
}