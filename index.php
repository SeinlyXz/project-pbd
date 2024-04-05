<?php

  session_start();
  $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
  $controllers = ["user", "protected", "dashboard", "admin"];

  foreach ($controllers as $controller) {
    require_once "controller/$controller.php";
  }

?>

<head>
    <link rel="shortcut icon" href="/public/static/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="/public/style.css?v=<?php echo time(); ?>">
    <script src="/public/script.js?v=<?php echo time(); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <nav class="w-full">
    <?php
      require "views/components/navbar-top.php";
      require "views/components/navbar.php";
    ?>
  </nav>
  <div class="p-6">
    <?php
      if($pages == ""){
        echo "<script>window.location.href='home'</script>";
      }
      if ($pages == "home") {
        require "views/home.php";
      } elseif ($pages == "signin") {
        if(isset($_SESSION['email'])){
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
        if(isset($_SESSION['email'])){
          require "views/user/index.php";
        } else {
          echo "<script>window.location.href='signin'</script>";
        }
      } else if ($pages == "about"){
        include "views/about.php";
      } else if ($pages == "dashboard"){
        dashboard_index();
      } else if ($pages == "admin"){
        admin_index();
      } else if($pages == "user"){
        require "views/user/index.php";
      } else if($pages == "produk") {
        require "views/produk/index.php";
      } else if ($pages == "produk/upload"){
        require "views/produk/upload.php";
      }
      else {
        require "views/404.php";
      }
    ?>
  </div>
</body>