<?php
if (!isset($_POST['firstname']) or !isset($_POST['lastname']) or !isset($_POST['email']) or !isset($_POST['pass']) or !isset($_POST['confirm'])) {
    header("Location: ../utilities/ups.php");
    exit;
}
?>

<?php
/** @var mysqli $conn */
include "../../../../private/database.php";

$namepattern = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";

if (preg_match($namepattern, $_POST['firstname']) and preg_match($namepattern, $_POST['lastname']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) and (strlen($_POST['pass']) >= 8) and ($_POST['pass'] == $_POST['confirm'])) {

    $fname = $conn -> real_escape_string(htmlspecialchars($_POST['firstname']));
    $lname = $conn -> real_escape_string(htmlspecialchars($_POST['lastname']));
    $email = $conn -> real_escape_string(htmlspecialchars($_POST['email']));
    $pass = $conn -> real_escape_string(htmlspecialchars($_POST['pass']));
    $confirm = $conn -> real_escape_string(password_hash(htmlspecialchars($_POST['confirm']), PASSWORD_DEFAULT));

    $insert = "INSERT INTO Users (Email, FirstName, LastName, Password)
                VALUES (?, ?, ?, ?)";
    $stmt = $conn -> prepare($insert);
    $stmt -> bind_param("ssss", $email, $fname, $lname, $confirm);

    if ($stmt -> execute()) {
        echo <<< END
                    <!DOCTYPE html>
                    <html lang="en">
                    
                    <head>
                        <meta charset="utf-8"/>
                        <title>Registration Result</title>
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
        echo "<p>Your account has been successfully created.</p>";

        echo "<div class='poster_div'>";
        echo "<img src='../img/logo/bolt-white-bg.png' alt='Red bolt.'>";
        echo "</div>";

        echo '<form action="../login/login_form.php" method ="POST" name ="login_button" id="tryagain_form">
                            <input class="submit_button" type="submit" value="Log Me In">
                      </form>';
        echo '<form action="../home/index.php" method ="POST" name ="home_button">
                            <input class="submit_button" type="submit" value="Go Back To The Home Page">
                      </form>';
        echo "</div>";
    }
    else {
        echo <<< END
                    <!DOCTYPE html>
                    <html lang="en">
                    
                    <head>
                        <meta charset="utf-8"/>
                        <title>Registration Result</title>
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
    }
    $stmt -> close();
    $conn -> close();
}
else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>Registration Result</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;

        include("../menu/menu_bar.php");

        echo "<div class='content'>";
        echo "<h2>Error!</h2>";
        echo "<br>";
        echo "<p>The input format of the email address is incorrect.</p>";

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
    }
    else if (!preg_match($namepattern, $_POST['firstname']) or !preg_match($namepattern, $_POST['lastname'])) {
        echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>Registration Result</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;

        include("../menu/menu_bar.php");

        echo "<div class='content'>";
        echo "<h2>Error!</h2>";
        echo "<br>";
        echo "<p>The input format of the first name or the last name is incorrect.</p>";

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
    }
    else if (!(strlen($_POST['pass']) >= 8)) {
        echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>Registration Result</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;

        include("../menu/menu_bar.php");

        echo "<div class='content'>";
        echo "<h2>Error!</h2>";
        echo "<br>";
        echo "<p>The input format of the password is incorrect.</p>";

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
    }
    else {
        echo <<< END
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8"/>
                <title>Registration Result</title>
                <link rel="stylesheet" href="../styles/utilities.css">
                <link rel="stylesheet" href="../styles/menu.css">
                <link rel="stylesheet" href="../styles/footer.css">
            </head>
            <body>
END;

        include("../menu/menu_bar.php");

        echo "<div class='content'>";
        echo "<h2>Error!</h2>";
        echo "<br>";
        echo "<p>The password confirmation does not match the password.</p>";

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
    }
}
include("../footer/footer.php");
?>

<script src='../utilities/size.js'></script>
</body>
</html>