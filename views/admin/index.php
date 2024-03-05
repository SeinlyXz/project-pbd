<?php
require_once "controller/user.php";
$users = get_all_user();
// var_dump($users);
?>

<head>
    <title>Admin</title>
</head>

<div>
    <h1>
        Welcome Admin
    </h1>
    <h2>
        List of Users
    </h2>
    <ul>
        <?php 
        while ($user = mysqli_fetch_assoc($users)) {
            echo "<li>
            {$user['email'] } - {$user['password']}
            <button onclick='deleteUser({$user['id']})'>Delete</button>
            </li>";
        }
        ?>
    </ul>
    <div>
        <?php include "create.php"; ?>
    </div>
</div>
<script>
    // Delete user
    function deleteUser(id) {
        var confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
            $.ajax({
                url: "controller/user.php",
                method: "POST",
                data: {
                    id: id,
                    action: "delete" // Menambahkan aksi delete
                },
            }).then((response) => {
                if (response == 201) {
                    alert("User has been deleted");
                    window.location.reload();
                } else if (response == 404){
                    alert("Tidak bisa menghapus akun sendiri");
                } else {
                    alert("Failed to delete user");
                }
            });
        }
    }
</script>