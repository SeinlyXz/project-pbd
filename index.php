<?php

session_start();
$pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
require_once "controller/user.php";
require_once "controller/protected.php";
require_once "controller/dashboard.php";
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="./public/style.css?v=<?php echo time(); ?>">
    <script src="./public/script.js"></script>
</head>

<body>
  <nav class="w-full">
    <?php
      include "views/components/navbar.php";
    ?>
  </nav>
  <div class="p-10">
    <?php
      if ($pages == "" || $pages == "home") {
        include "views/home.php";
      } elseif ($pages == "signin") {
        if(isset($_SESSION['username'])){
          echo "<script>window.location.href='home'</script>";
        } else {
          include "views/auth/signin.php";
        }
      } elseif ($pages == "protected") {
        protected_index();
      } else if ($pages == "logout") {
        session_destroy();
        echo "<script>window.location.href='home'</script>";
      } else if ($pages == "user"){
        // Call index() from user controller
        user_index();
      } else if ($pages == "about"){
        include "views/about.php";
      } else if ($pages == "dashboard"){
        dashboard_index();
      } else {
        include "views/404.php";
      }
    ?>
  </div>
</body>