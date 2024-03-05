<?php

  session_start();
  $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";

  $controllers = ["user", "protected", "dashboard", "admin"];

  foreach ($controllers as $controller) {
    require_once "controller/$controller.php";
  }

?>

<head>
    <link rel="stylesheet" href="./public/style.css?v=<?php echo time(); ?>">
    <script src="./public/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <nav class="w-full">
    <?php
      require "views/components/navbar.php";
    ?>
  </nav>
  <div class="p-10">
    <?php
      if ($pages == "" || $pages == "home") {
        require "views/home.php";
      } elseif ($pages == "signin") {
        if(isset($_SESSION['username'])){
          echo "<script>window.location.href='home'</script>";
        } else {
          require "views/auth/signin.php";
        }
      } elseif ($pages == "protected") {
        protected_index();
      } else if ($pages == "logout") {
        session_destroy();
        echo "<script>window.location.href='home'</script>";
      } else if ($pages == "user"){
        user_index();
      } else if ($pages == "about"){
        include "views/about.php";
      } else if ($pages == "dashboard"){
        dashboard_index();
      } else if ($pages == "admin"){
        admin_index();
      } else {
        require "views/404.php";
      }
    ?>
  </div>
</body>