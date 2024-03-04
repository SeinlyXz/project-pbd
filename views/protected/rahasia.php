<?php
$username =  $_SESSION['username'];
?>

<body>
    <h1>Ini Rahasia, Anda hanya bisa melihat ini ketika sudah login</h1>
    <h1 class="text-xl text-red-200"><?php echo $username; ?></h1>
</body>