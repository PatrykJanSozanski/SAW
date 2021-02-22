<?php
session_start();

function send_to_all($database, $subject, $body) {
    include "../mail/send_mail.php";
    include "../mail/mails.php";

    $sql = "SELECT Email, FirstName, LastName
            FROM Users
            WHERE Newsletter = 1";

    $stmt = $database -> prepare($sql);
    if(!$stmt -> execute()) {
        return FALSE;
    }
    else {
        $sqlresult = $stmt -> get_result();
        $stmt -> close();

        $fixed_body = normal_email($body);
        $path_img1 = "../img/logo/head-white-bg.png";
        $path_img2 = "../img/logo/bolt-white-bg.png";

        send_many_mails($sqlresult, $subject, $fixed_body, $path_img1, $path_img2);

        return TRUE;
    }
}

/** @var mysqli $conn */
include "../../../../private/database.php";

if ($_SESSION["privileged"] == 1) {

    if (isset($_POST["email_subject"]) and isset($_POST["email_body"])) {

        $subject = $_POST["email_subject"];
        $body = $_POST["email_body"];

        if(send_to_all($conn, $subject, $body)) {
            echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>New Email Result</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;
            include("../menu/menu_bar.php");

            echo "<div class='content'>";
            echo "<h2>Success!</h2>";
            echo "<br>";
            echo "<p>The email has been sent to all the subscribing users.</p>";

            echo "<div class='poster_div'>";
            echo "<img src='../img/logo/bolt-white-bg.png' alt='Red bolt.'>";
            echo "</div>";

            echo '<form action="../home/index.php" method ="POST" name ="home_button">
                            <input class="submit_button" type="submit" value="Go Back To The Home Page">
                      </form>';
            echo "</div>";

            include("../footer/footer.php");

            echo "<script src='../utilities/size.js'></script>";
            echo "</body>";
            echo "</html>";
        }
        else {
            header("Location: ../utilities/ups.php");
            exit;
        }

    }
    else {
        header("Location: ../utilities/ups.php");
        exit;
    }
}
else {
    header("Location: ../utilities/access_denied.php");
    exit;
}
