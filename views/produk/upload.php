<?php

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : null;
$umur = isset($_GET['umur']) ? $_GET['umur'] : null;
if($username == null){
  echo "<script>window.location.href='/signin'</script>";
}

$succes = isset($_GET['success']) ? $_GET['success'] : null;
?>
<head>
  <title>
    Produk
  </title>
</head>
<?php
if($kategori && $umur){
  echo "<h2> You are searching: $kategori and umur $umur </h2>";
}
?>
<div class="flex justify-center">
  <div class="">
    <form action="/upload.php" id="postingan" method="post" enctype="multipart/form-data">
      <h2>Select image to upload:</h2>
      <div style="display: flex; flex-direction: column; row-gap: 2em;">
        <input type="file" name="fileToUpload" id="fileToUpload" style="width: 15em; padding: 10px; background-color: gray; border:none; border-radius:20px;">
        <input type="submit" value="Upload Image" name="submit" style="width:10em; padding: 10px; border: none; background-color: orange;">
      </div>
    </form>
    <div class="error">
      <p <?php if($succes == "true"){ echo "style='color: green;'"; } else if($succes == "false"){ echo "style='color: red;'"; } ?>>
        <?php
          if($succes == "true"){
            echo "The file has been uploaded successfully";
          } else if($succes == "false") {
            echo "Failed to upload the image. Please try again.";
          }
        ?>
      </p>
    </div>
  </div>
</div>

<script>
  var success = "<?php echo $succes; ?>";
  if(success == "true" || success == "false"){
    setTimeout(() => {
      $(".error").remove();
      window.history.replaceState({}, document.title, "/produk");
    }, 5000)
  }
</script>