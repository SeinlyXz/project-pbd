<?php
require_once "controller/user.php";
$uuid = isset($_GET['uuid']) ? $_GET['uuid'] : "";
$user_data = show($uuid);
?>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../../public/style.css?v=<?php echo time(); ?>">
    <style>
        /* style.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        form > div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .success-message {
            color: green;
            margin-top: 5px;
        }

    </style>
</head>
<div>
    <h1>Edit Profile</h1>
    <form id="update" method="POST">
        <input type="hidden" name="uuid" value="<?= $user_data['uuid']; ?>">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $user_data['username']; ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $user_data['email']; ?>">
        </div>
        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" placeholder="********">
        </div>
        <div>
            <button type="submit" name="action" value="update">Update</button>
            <button id="close">Close</button>
        </div>
</div>

<script>
    function updateProfile() {
        var form = document.getElementById('update');
        var formData = new FormData(form);
        $.ajax({
            url: "controller/user.php",
            method: "POST",
            data: formData,
            action: "update"
        }).then((response) => {
            if (response == 200) {
                window.location.href = "/admin";
            } else if (response == 400) {
                alert("Failed to update user");
            }
        });
    }

    // Close button
    document.getElementById('close').addEventListener('click', function() {
        //clear url
        window.history.replaceState({}, document.title, "/" + "admin");
    });
</script>