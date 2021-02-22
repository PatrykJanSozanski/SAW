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
            <title>Login Form</title>
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
            <h2>Log in to your account</h2>
            <br>
    
            <form id="login_form" action="login.php" method ="POST" name ="login_form">
                <label for="email">Mail:</label><br>
                <input type="email" id="email" name="email" pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/">
                <div class="error" id="email_error"></div>
                <br><br>
                <label for="pass">Password:</label><br>
                <input type="password" id="pass" name="pass">
                <div class="error" id="pass_error"></div>
                <br><br>
                <input class="submit_button" type="submit" value="Login">
            </form>
    
            <p>Click the "Login" button to log in to your account.</p>
            <p>If you do not have an account yet, just <a href="../registration/registration_form.php">register</a>.</p>
        </div>
    </div>
    <script src="../login/login_form.js"></script>

END;

    include("../footer/footer.php");

    echo <<< END
    
                <script src="../utilities/size.js"></script>
            </body>
            </html>

END;
}