<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;


$data = ["Kerajinan Tangan", "Fashion", "Aksesoris", "Perabotan"];
$data_slug = ["kerajinan-tangan", "fashion", "aksesoris", "perabotan"];

?>

<head>
    <title>Produk </title>
</head>
<body>
    <h1>
        <?php echo $data[$id]; ?>
    </h1>
</body>