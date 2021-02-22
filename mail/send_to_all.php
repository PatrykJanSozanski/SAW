<?php
session_start();

/** @var mysqli $conn */
include "../../../../private/database.php";

if ($_SESSION["privileged"] == 1) {

    echo <<< END
    <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>New Email</title>
                <link rel="stylesheet" href="../styles/email.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            
            <body>
            
END;

    include("../menu/menu_bar.php");

    echo <<< END
        <div class="content">
            <h2>New email to all subscribers</h2>
            <br>
            <form action="../mail/send_to_all_action.php" method="post"> 
                <label for="email_subject">Subject of the email:</label>
                <br>
                <input type="text" name="email_subject" id="email_subject"/>
                <br> 
                <br>
                <label for="email_subject">Body of the email:</label>
                <br>
                <textarea name="email_body" id="email_body"></textarea>
                <br> 
                <br>
                <input class="submit_button" type="submit" name= "submit" value="Send to all"/> 
            </form>
        </div>
END;

    include("../footer/footer.php");

    echo <<< END
            <script src="../utilities/size.js"></script>
        </body>
        </html>
END;
}
else {
    header("Location: ../utilities/access_denied.php");
    exit;
}