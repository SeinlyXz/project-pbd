<?php
session_start();
$target_dir = "public/img/";

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
if($username == null){
  echo "<script>window.location.href='/signin'</script>";
}
$file = isset($_FILES["fileToUpload"]) ? $_FILES["fileToUpload"] : null;
if($file == null){
  echo "<script>window.location.href='/produk'</script>";
}


$full_image_name = $_FILES["fileToUpload"]["name"];
$image_name = "photos" . time() . rand(1000, 9999);
$extension = pathinfo($full_image_name, PATHINFO_EXTENSION);
$customized_image_name = $image_name . "." . $extension;

$target_file = $target_dir . $customized_image_name;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if($check !== false) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    echo "<script>window.location.href='/produk/upload?success=true'</script>";

  } else {
    echo "<script>window.location.href='/produk/upload?success=false'</script>";
    $uploadOk = 0;
  }
}
?>