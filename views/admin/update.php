<style>
    /* Create CSS for form */
    .form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form input[type="text"],
    .form input[type="email"],
    .form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form button[type="submit"] {
        width: 100%;
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form button[type="submit"]:hover {
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

    /* Create CSS for close button */
    #close {
        position: absolute;
        top: 0;
        right: 0;
        border: none;
        background-color: transparent;
        color: #4caf50;
        font-size: 24px;
        cursor: pointer;
    }

    #close:hover {
        color: #45a049;
    }
</style>


<div class="">
    <!-- Make a form with the name "update" -->
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
    </form>
</div>