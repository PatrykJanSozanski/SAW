<?php
session_start();

/** @var mysqli $conn */
include "../../../../private/database.php";

if (!isset($_SESSION["authorization"])) {
    header("Location: ../utilities/access_denied.php");
    exit;
}
else {
    $name = $_SESSION["name"];
    $lastname = $_SESSION["lastname"];
    $email = $_SESSION["email"];

    echo <<<END
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="utf-8"/>
            <title>Profile</title>
            <link rel="stylesheet" href="../styles/profile.css">
            <link rel="stylesheet" href="../styles/menu.css">
            <link rel="stylesheet" href="../styles/footer.css">
        </head>

        <body>
        
END;

    include("../menu/menu_bar.php");

    echo <<<END

        <div class="content">
            <h2>See your profile</h2>
            <br>
            <div class="table_div">
                <table class="profile_table">
                    <tr>
                        <th><h3>Firstname:</h3></th>
                    </tr>
                    <tr>
                        <td><p>$name</p></td>
                    </tr>
                    <tr>
                        <th><h3>Lastname:</h3></th>
                    </tr>
                    <tr>
                        <td><p>$lastname</p></td>
                    </tr>
                    <tr>
                        <th><h3>Email:</h3></th>
                    </tr>
                    <tr>
                        <td><p>$email</p></td>
                    </tr>
                    <tr>
                        <th><h3>Newsletter:</h3></th>
                    </tr>
                    <tr>
                    
END;

    if ($_SESSION["newsletter"] == 1) {
        echo "<td><p>Subscribed</p></td>";
    }
    else {
        echo "<td><p>Not Subscribed</p></td>";
    }

    echo <<< END
                    </tr>
                </table>
            </div>
            <br>
END;

    if ($_SESSION["newsletter"] == 1) {

        echo <<< END

                <form class="top_form" action="update_profile_form.php" method ="POST" name ="update_button">
                    <input class="submit_button" type="submit" value="Update Profile">
                </form>
                <form class="middle_form" action="../newsletter/unsubscribe.php" method ="POST" name ="subscribe_button">
                    <input class="submit_button" type="submit" value="Unsubscribe From The Newsletter">
                </form>
                <form class="middle_form" action="../home/index.php" method ="POST" name ="home_button">
                    <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
                <form class="bottom_form" action="../logout/logout.php" method ="POST" name ="logout_button">
                    <input class="submit_button" type="submit" value="Log Me Out">
                </form>
            </div>

END;

    }
    else {
        echo <<< END

                <form class="top_form" action="update_profile_form.php" method ="POST" name ="update_button">
                    <input class="submit_button" type="submit" value="Update Profile">
                </form>
                <form class="middle_form" action="../newsletter/subscribe.php" method ="POST" name ="subscribe_button">
                    <input class="submit_button" type="submit" value="Subscribe To The Newsletter">
                </form>
                <form class="middle_form" action="../home/index.php" method ="POST" name ="home_button">
                    <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
                <form class="bottom_form" action="../logout/logout.php" method ="POST" name ="logout_button">
                    <input class="submit_button" type="submit" value="Log Me Out">
                </form>
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