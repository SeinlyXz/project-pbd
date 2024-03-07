<?php
    $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
    $username = (isset($_SESSION['username'])) ? $_SESSION['username'] : "";
?>
<div>
    <?php if ($username) { ?>
        <a href="/admin" style="text-decoration: none; color: black;">
            <h1 class="navbar-top my-auto">Admin</h1>
        </a>
    <?php } else { ?>
        <a href="/signin" style="text-decoration: none; color: black;">
            <h1 class="navbar-top my-auto">Login</h1>
        </a>
    <?php } ?>
</div>