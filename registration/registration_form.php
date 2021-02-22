<?php
session_start();
if (isset($_SESSION["authorization"])) {
    header("Location: ../utilities/logged_in.php");
    exit;
}
else {
    echo <<< END

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Registration Form</title>
    <link rel="stylesheet" href="../styles/form.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>

END;

    include("../menu/menu_bar.php");

    echo <<< END
<div class="content">
    <div class="form_div">
        <h2>Register with us</h2>
        <br>

        <form id="registration_form" action="registration.php" method ="POST" name ="registration_form">
            <label for="fname">Name:</label><br>
            <input type="text" id="fname" name="firstname">
            <div class="error" id="fname_error"></div>
            <br><br>
            <label for="lname">Surname:</label><br>
            <input type="text" id="lname" name="lastname">
            <div class="error" id="lname_error"></div>
            <br><br>
            <label for="email">Mail:</label><br>
            <input type="email" id="email" name="email">
            <div class="error" id="email_validation"></div>
            <div class="error" id="email_error"></div>
            <br><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass">
            <div class="error" id="pass_error"></div>
            <br><br>
            <label for="confirm">Password Confirmation:</label><br>
            <input type="password" id="confirm" name="confirm">
            <div class="error" id="confirm_error"></div>
            <br><br>
            <input class="submit_button" type="submit" value="Register">
        </form>

        <p>Click the "Register" button to register.</p>
        <p>If you already have an account, just <a href="../login/login_form.php">login</a>.</p>
    </div>
</div>
<script src="../registration/registration_form.js"></script>
<script src="../registration/check_email.js"></script>

END;

    include("../footer/footer.php");

    echo <<< END

    <script src="../utilities/size.js"></script>
</body>
</html>
    
END;
}