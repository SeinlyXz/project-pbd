<?php
require_once "controller/admin.php";
// var_dump($users);

$uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;
$edit = isset($_GET['edit']) ? $_GET['edit'] : null;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$admins = null;
if($search){
    $admins = search_admin($search);
} else {
    $admins = get_all_admin();
}
?>

<head>
    <title>Admin</title>
</head>

<div>
    <div>
        <?php include "create.php"; ?>
    </div>
    <h2>List of Admin</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 0;
            while ($admin = mysqli_fetch_assoc($admins)) : $count++; 
            ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $admin['username']; ?></td>
                    <td><?= $admin['email']; ?></td>
                    <td><?= $admin['password']; ?></td>
                    <td>
                        <button onclick="deleteAdmin(<?= $admin['id']; ?>)">Delete</button>
                        <a href="/admin?edit=true&uuid=<?= $admin['uuid']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
    if ($uuid && $edit) {
        require_once "views/admin/edit.php";
    }
    ?>
</div>
<script>
    // Delete user
    function deleteAdmin(id) {
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