<?php
$data = ["Kerajinan Tangan", "Fashion", "Aksesoris", "Perabotan"];
$data_slug = ["kerajinan-tangan", "fashion", "aksesoris", "perabotan"];
$image = ["pic2.jpeg", "pic2.jpeg", "pic2.jpeg", "pic2.jpeg"];
?>

<?php foreach ($data as $key => $value) { ?>
    <a href="/produk?kategori=<?php echo $data_slug[$key]; ?>" style="text-decoration:none; color: black;" class="card">
        <div>
            <img src="/public/static/<?php echo $image[$key]; ?>" alt="<?php echo $value; ?>">
            <h1>
                <?php echo $value; ?>
            </h1>
        </div>
    </a>
<?php } ?>