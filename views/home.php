<?php

?>
<style>
    .home-cover {
        background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 2em;
    }

    .home-cover h1 {
        font-size: 3em;
    }

    .home-cover p {
        font-size: 1.5em;
    }

    .home-carousel {
        margin-top: 50px;
    }

    .home-carousel img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .home-carousel-card {
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

    .home-carousel-card::before {
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

    .home-carousel-card h1 {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        position: relative;
        z-index: 1;
        top: -30px;
        text-align: center;
        color: white;
        margin: -20px;
        padding: 0;
    }

    .home-carousel-card img {
        width: 14rem;
        object-fit: cover;
        height: 14rem;
        border-radius: 20px;
    }
</style>
<head>
    <title>Home</title>
</head>
<body>
    <?php
    
    require './views/components/home-cover.php'; 
    require './views/components/home-carousel.php';

    ?>
    <div class="home-cover">
        <h1>Welcome to <span>U</span>m<span>k</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, quam, doloremque, quibusdam, voluptatibus, ipsa, dolor, iure, reiciendis, laboriosam, adipisci, repellat, fugiat, quaerat, nesciunt.</p>
    </div>
    <div class="home-carousel">
        <div class="home-carousel-card">
            <img src="./public/static/kerajinan-tangan.jpg" alt="Kerajinan Tangan">
            <h1>Kerajinan Tangan</h1>
        </div>
        <div class="home-carousel-card">
            <img src="./public/static/fashion.jpg" alt="Fashion">
            <h1>Fashion</h1>
        </div>
        <div class="home-carousel-card">
            <img src="./public/static/aksesoris.jpg" alt="Aksesoris">
            <h1>Aksesoris</h1>
        </div>
        <div class="home-carousel-card">
            <img src="./public/static/perabotan.jpg" alt="Perabotan">
            <h1>Perabotan</h1>
        </div>
    </div>
    <button onclick="hello()">
        Test
    </button>
</body>