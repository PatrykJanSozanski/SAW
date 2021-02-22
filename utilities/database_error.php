<?php
echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>Database Error</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;

include("../menu/menu_bar.php");

echo "<div class='content'>";
echo "<h2>Database Error!</h2>";
echo "<br>";
echo "<p>Your account has not been created.</p>";

echo "<div class='poster_div'>";
echo "<img src='../img/logo/bolt-white-bg.png' alt='Red bolt.'>";
echo "</div>";

echo '<form action="../registration/registration_form.php" method ="POST" name ="tryagain_button" id="tryagain_form">
                            <input class="submit_button" type="submit" value="Try Again">
                            </form>';
echo '<form action="../home/index.php" method ="POST" name ="home_button">
                            <input class="submit_button" type="submit" value="Go Back To The Home Page">
                            </form>';
echo "</div>";

include("../footer/footer.php");

echo "<script src='../utilities/size.js'></script>";
echo "</body>";
echo "</html>";