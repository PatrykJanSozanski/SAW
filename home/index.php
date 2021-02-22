<?php
session_start();
?>

<?php
/** @var mysqli $conn */
include "../../../../private/database.php";

if (isset($_SESSION["authorization"])) {
    echo <<< END

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8"/>
                <title>Home Page</title>
                <link rel="stylesheet" href="../styles/home.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>

            <body>

END;

    include("../menu/menu_bar.php");

    echo <<< END
        <div class="content" id="content">
            <div>
                <div class="poster_desc">
                    <h1>ALL-POLAND <span>W<span class="woman">&#x2640</span>MEN'S</span> STRIKE</h1>
                    <h3>OVER 150 CITIES IN POLAND</h3>
                    <h3>AND 60 CITIES ABROAD</h3>
                </div>
                <div class="poster_div">
                    <img class="poster" src="../img/back/back.jpg" alt="A poster representing female legs closed in a cage
                        with a crucifix on the top with the text below saying: 'Niewola boża'. ">
                </div>
            </div>
END;

    if ($_SESSION["newsletter"] == 1) {
        echo <<< END
                
                <div class="join">
                    <h2>CHECK THE UPCOMING EVENTS</h2>
                    <h3>AND SUPPORT US WITH YOUR PRESENCE</h3>
                </div>
                <div class="join_button">
                    <a href="../events/events.php"><button class="register_button"><h3>Events</h3></button></a>
                </div>
            </div>

END;
    }
    else {
        echo <<< END
                
                <div class="join">
                    <h2>SUBSCRIBE TO THE NEWSLETTER</h2>
                    <h3>AND KEEP UP TO DATE WITH NEWS AND EVENTS</h3>
                </div>
                <div class="join_button">
                    <a href="../newsletter/subscribe_home.php"><button class="register_button"><h3>Subscribe</h3></button></a>
                </div>
            </div>

END;
    }

    include("../footer/footer.php");

    echo <<<END
                
                <script src="../utilities/size.js"></script> 
            </body>
            </html>

END;
}
else {
    echo <<< END
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8"/>
                <title>Home Page</title>
                <link rel="stylesheet" href="../styles/home.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>

            <body>

END;

    include("../menu/menu_bar.php");

    echo <<< END
        <div class="content" id="content">
            <div>
                <div class="poster_desc">
                    <h1>ALL-POLAND <span>W<span class="woman">&#x2640</span>MEN'S</span> STRIKE</h1>
                    <h3>OVER 150 CITIES IN POLAND</h3>
                    <h3>AND 60 CITIES ABROAD</h3>
                </div>
                <div class="poster_div">
                    <img class="poster" src="../img/back/back.jpg" alt="A poster representing female legs closed in a cage
                        with a crucifix on the top with the text below saying: 'Niewola boża'. ">
                </div>
            </div>
            
            <div class="join">
                <h1>JOIN US</h1>
                <h3>AND KEEP UP TO DATE WITH NEWS AND EVENTS</h3>
            </div>
            <div class="join_button">
                <a href="../registration/registration_form.php"><button class="register_button"><h3>Register</h3></button></a>
            </div>
        </div>

END;

    include("../footer/footer.php");

    echo <<<END
                
                <script src="../utilities/size.js"></script> 
            </body>
            </html>
END;
}
