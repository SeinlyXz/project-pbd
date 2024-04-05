<?php
    $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
    $username = (isset($_SESSION['username'])) ? $_SESSION['username'] : "";
    $data = ["Kerajinan Tangan", "Fashion", "Aksesoris", "Perabotan"];
    $data_slug = ["kerajinan-tangan", "fashion", "aksesoris", "perabotan"];
    $image = ["pic2.jpeg", "pic2.jpeg", "pic2.jpeg", "pic2.jpeg"];
?>
<style>
    .card {
        margin-top: 2rem;
        margin-bottom: 10rem;
        position: relative; /* Menjadikan posisi relatif untuk membuat overlay */
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        margin-right: 25px;
        font-size: 10px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 14rem;
        /* Opacity direction */
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
        border-radius: 20px;
    }

    .card h1 {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        position: relative;
        z-index: 1;
        top: -30px;
        text-align: center;
        color: white;
        margin: -20px;
        padding: 0;
    }

    .card img {
        width: 14rem;
        object-fit: cover;
        height: 14rem;
        border-radius: 20px;
    }

</style>
<div>
    <h1>
        List Produk
    </h1>
   <?php
    foreach ($data as $key => $value) { ?>
        <a href="/produk?kategori=<?php echo $data_slug[$key]; ?>" style="text-decoration:none; color: black;" class="card">
            <div>
                <img src="/public/static/<?php echo $image[$key]; ?>" alt="<?php echo $value; ?>">
                <h1>
                    <?php echo $value; ?>
                </h1>
            </div>
        </a>
    <?php } ?>
</div>