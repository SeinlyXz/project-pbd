<?php

$error_message = $_GET['failed'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>

<body>
    <h2 class="text-center">Sign In</h2>
    <form action="login" method="POST">
        <div class="login">
            <div class="flex flex-col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div class="flex flex-col">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <div>
                <button type="submit">Sign In</button>
            </div>
            <?php
            // Tampilkan pesan error jika ada
            if (isset($error_message) && $error_message) {
                echo '<p> Email atau Password Salah </p>';
            }
            ?>
        </div>
    </form>
    <script>
        if(window.location.href.includes("failed")){
            setTimeout(() => {
                window.history.replaceState({}, document.title, "/" + "signin");
                document.querySelector('p').remove();
            }, 5000);
        }
    </script>
</body>

</html>
