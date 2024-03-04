<?php
$pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
?>
<div class="navbar">
    <h1>UMKM</h1>
    <div class="my-auto flex gap-x-4 font-navbar">
        <?php
        if ($pages == "home" || $pages == "") {
            echo '<a href="home" class="active my-auto">Home</a>';
        } else {
            echo '<a href="home" class="my-auto">Home</a>';
        }
        if ($pages == "protected") {
            echo '<a href="protected" class="active my-auto">Protected</a>';
        } else {
            echo '<a href="protected" class="my-auto">Protected</a>';
        }
        if ($pages == "dashboard") {
            echo '<a href="dashboard" class="active my-auto">Dashboard</a>';
        } else {
            echo '<a href="dashboard" class="my-auto">Dashboard</a>';
        }
        if ($pages == "about") {
            echo '<a href="about" class="active my-auto">About</a>';
        } else {
            echo '<a href="about" class="my-auto">About</a>';
        }
        if ($pages == "signin") {
            echo '<a href="signin" class="button-primary my-auto">Sign In</a>';
        } else {
            echo '<a href="signin" class="button-primary">Sign In</a>';
        }
        if ($pages == "logout") {
            echo '<a href="logout" class="active my-auto">Logout</a>';
        } else {
            echo '<a href="logout" class="button-primary">Logout</a>';
        }
        ?>
    </div>
</div>