<?php
session_start();

function unsubscribe($database, $email) {
    $update = "UPDATE Users
                SET Newsletter = 0
                WHERE Email = ?";
    $stmt = $database -> prepare($update);
    $stmt -> bind_param("s", $email);

    if($stmt -> execute()) {
        $stmt -> close();
        return TRUE;
    }
    else {
        $stmt -> close();
        return FALSE;
    }
}

/** @var mysqli $conn */
include "../../../../private/database.php";

include "../mail/mails.php";
include "../mail/send_mail.php";

$name = $_SESSION["name"];
$lastname = $_SESSION["lastname"];
$email = $_SESSION["email"];

if($_SESSION["newsletter"] == 1) {

    if(unsubscribe($conn, $email)) {

        $_SESSION["newsletter"] == 0;
        $body = goodbye_mail($name);

        send_one_mail($email, $name, $lastname, "Subscription Resignation", $body, "../img/logo/head-white-bg.png", "../img/logo/bolt-white-bg.png");

        echo <<<END
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Unsubscription Result</title>
            <link rel="stylesheet" href="../styles/utilities.css">
            <link rel="stylesheet" href="../styles/menu.css">
            <link rel="stylesheet" href="../styles/footer.css">
        </head>
        
        <body>
        
END;

        include("../menu/menu_bar.php");

        echo <<< END
    
            <div class='content'>
                <h2>Success!</h2>
                <br>
                <p>You have unsubscribed from the newsletter.</p>
                <div class="poster_div">
                    <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
                </div>
                <form action="../profile/show_profile.php" method ="POST" name ="profile_button" id="tryagain_form">
                    <input class="submit_button" type="submit" value="Go Back To Your Profile">
                </form>
                <form action="../home/index.php" method ="POST" name ="home_button">
                    <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
            </div>
END;

        $conn -> close();

        include("../footer/footer.php");

        echo <<< END

            <script src="../utilities/size.js"></script>
        </body>
    </html>

END;
    }
    else {
        $conn -> close();
        header("Location: ../utilities/ups.php");
        exit;
    }
}
else {
    echo <<<END
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Unsubscription Result</title>
            <link rel="stylesheet" href="../styles/utilities.css">
            <link rel="stylesheet" href="../styles/menu.css">
            <link rel="stylesheet" href="../styles/footer.css">
        </head>
        
        <body>
        
END;

    include("../menu/menu_bar.php");

    echo <<< END
    
            <div class='content'>
                <h2>Error!</h2>
                <br>
                <p>You are not subscribing to the newsletter.</p>
                <div class="poster_div">
                    <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
                </div>
                <form action="../profile/show_profile.php" method ="POST" name ="profile_button" id="tryagain_form">
                    <input class="submit_button" type="submit" value="Go Back To Your Profile">
                </form>
                <form action="../home/index.php" method ="POST" name ="home_button">
                    <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
            </div>
END;

    $conn -> close();

    include("../footer/footer.php");

    echo <<< END

            <script src="../utilities/size.js"></script>
        </body>
    </html>

END;
}
