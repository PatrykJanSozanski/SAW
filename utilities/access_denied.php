<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Access Denied</title>
        <link rel="stylesheet" href="../styles/utilities.css">
        <link rel="stylesheet" href="../styles/menu.css">
        <link rel="stylesheet" href="../styles/footer.css">
    </head>

    <body>

<?php
    include("../menu/menu_bar.php");
?>
    <div class="content">
        <h2>Access denied!</h2>
        <br>
        <p>The user authentication required to proceed.</p>
        <div class="poster_div">
            <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
        </div>
        <form action="../home/index.php" method ="POST" name ="home_button">
            <input class="submit_button" type="submit" value="Go Back To The Home Page">
        </form>
    </div>

<?php
include("../footer/footer.php");
?>

    <script src="../utilities/size.js"></script>
    </body>
</html>