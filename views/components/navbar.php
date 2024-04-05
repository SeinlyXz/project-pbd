<?php
    $pages = (isset($_GET['pages'])) ? $_GET['pages'] : "";
    $email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
?>
<div class="navbar">
    <div></div>
    <a href="/home">
        <img src="./public/static/logo.svg" alt="logo" style="width: 60px; height: 60px;" class="icon">
    </a>
    <div class="my-auto">
        <form id="search" class="my-auto">
            <input type="text" placeholder="Search">
        </form>
    </div>
</div>
<script>
    var page = "<?php echo $pages; ?>";
    $("#search").submit(function(e){
        e.preventDefault();
        if($("#search input").val() == ""){
            window.history.replaceState({}, document.title, "/" + page);
        } else {
            let search = $("#search input").val();
            window.location.href = "/"+page+"?search=" + search;
        }
    });
</script>