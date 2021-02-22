<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Events</title>
    <link rel="stylesheet" href="../styles/events.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/search.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>

<?php
include("../menu/menu_bar_search.php");
?>

<div>
    <div id="no_match">
        <h2></h2>
        <p></p>
        <div>
            <img id="poster">
        </div>
    </div>
</div>

<div class="content" id="content">

</div>

<?php
include("../footer/footer.php");
?>

<script src="../utilities/size_base.js"></script>
<script src="../events/select_events.js"></script>

</body>
</html>