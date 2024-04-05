<?php
    $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
    $username = (isset($_SESSION['username'])) ? $_SESSION['username'] : "";
    $email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
?>
<head>
    <title><?php echo $username ?> - Profile</title>
</head>
<div>
    <div class="flex">
        <div class="profile-kiri">
            <img src="./public/static/profile.svg" alt="profile">
            <div class="flex justify-center font-login">
                <div class="">
                    <p>
                        <?php echo $username; ?>
                    </p>
                    <a href="/logout" style="text-size;">
                        Logout
                    </a> 
                </div>
            </div>
        </div>
        <div class="profile-kanan">
            <div class="">
                <h1>
                    Profile Saya
                </h1>
                <p>Kelola data diri anda untuk mengontrol dan mengamankan akun anda</p>
            </div>
            <form action="/user/update" method="POST">
                <div class="flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" required>
                    <label for="nama">Nama</label>
                    <input type="text" required>
                    <label for="email">Email</label>
                    <input type="email" required>
                    <label for="no-telp">Nomor Telepon</label>
                    <input type="number" required>
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" required>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    <label for="tgl-lahir">Tanggal Lahir</label>
                    <input type="date" name="birthdate" required> 
                    <button>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#delete").click(function(){
        if(confirm("Are you sure you want to delete your account?")){
            $.ajax({
                url: "/controller/admin.php",
                type: "POST",
                data: {
                    action: "delete",
                    email: "<?php echo $email; ?>"
                },
            }).then((res) => {
                if(res == "202"){
                    alert("Your account has been deleted successfully");
                    window.location.href = "/logout";
                } else {
                    alert("Failed to delete your account. Please try again.");
                }
            });
        }
    });
</script>