<?php
$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
?>
<div class="flex justify-center gap-x-4" style="padding: 20px 0px 20px 0px">
    <a href="/home" class="button-navbar-bottom">
        Home
    </a>
    <a href="/protected" class="button-navbar-bottom">
        Protected
    </a>
    <a href="/about" class="button-navbar-bottom">
        About
    </a>
    <a href="/dashboard" class="button-navbar-bottom">
        Dashboard
    </a>
    <?php
        if($email){
            echo '<a href="logout" class="button-navbar-bottom">Logout</a>';
        } else {
            echo '<a href="signin" class="button-navbar-bottom">Sign In</a>';
        }
    ?>
</div>