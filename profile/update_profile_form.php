<?php
session_start();
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
            <title>Update Profile</title>
            <link rel="stylesheet" href="../styles/form.css">
            <link rel="stylesheet" href="../styles/menu.css">
            <link rel="stylesheet" href="../styles/footer.css">
        </head>

        <body>
END;

    include("../menu/menu_bar.php");

    echo <<<END

        <div class="content">
            <div class="form_div">
                <h2>Update your profile</h2>
                <br>
                <form action="update_profile.php" method ="POST" name ="update_profile_form" id="update_profile_form">
                    <label for="fname">Name:</label><br>
                    <input type="text" id="fname" name="firstname" value='$name'>
                    <div class="error" id="fname_error"></div>
                    <br><br>
                    <label for="lname">Surname:</label><br>
                    <input type="text" id="lname" name="lastname" value='$lastname'>
                    <div class="error" id="lname_error"></div>
                    <br><br>
                    <label for="email">Mail:</label><br>
                    <input type="email" id="email" name="email" value='$email'>
                    <div class="error" id="email_error"></div>
                    <div class="error" id="email_validation"></div>
                    <br><br>
                    <input class="submit_button" type="submit" value="Update">
                </form>
                <form action="show_profile.php" method ="POST" name ="profile_button" id="profile_button">
                        <input class="submit_button" type="submit" value="Go Back">
                </form>
                
                <p>Please contact the administrator if you want to change your password.</p>
                
            </div>
        </div>

        <script src="../profile/update_profile.js"></script>
        <script src="../registration/check_email.js"></script>
END;

    include("../footer/footer.php");

    echo <<<END
            <script src="../utilities/size.js"></script>
        </body>
        </html>
END;
}