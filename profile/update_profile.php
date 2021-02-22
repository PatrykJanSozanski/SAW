<?php
session_start();
if (!isset($_SESSION["authorization"])) {
    header("Location: ../utilities/access_denied.php");
    exit;
}
else {
    /** @var mysqli $conn */
    include "../../../../private/database.php";

    include("../menu/menu_bar.php");

    $namepattern = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";

    if (preg_match($namepattern, $_POST["firstname"]) and preg_match($namepattern, $_POST["lastname"]) and filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $newname = $conn -> real_escape_string(htmlspecialchars($_POST["firstname"]));
        $newlastname = $conn -> real_escape_string(htmlspecialchars($_POST["lastname"]));
        $newemail = $conn -> real_escape_string(htmlspecialchars($_POST["email"]));
        $email = $_SESSION['email'];

        $update = "UPDATE Users
                SET Email = ?, FirstName = ?, LastName = ?
                WHERE Email = ?";
        $stmt = $conn -> prepare($update);
        $stmt -> bind_param("ssss", $newemail, $newname, $newlastname, $email);

        if ($stmt -> execute()) {
            echo <<<END
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <title>Update Result</title>
                            <link rel="stylesheet" href="../styles/utilities.css">
                            <link rel="stylesheet" href="../styles/menu.css">
                            <link rel="stylesheet" href="../styles/footer.css">
                        </head>
                        <body>
                            <div class='content'>
                                <h2>Success!</h2>
                                <br>
                                <p>Your account has been successfully updated.</p>
                                <div class="poster_div">
                                    <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
                                </div>
                                <form action="show_profile.php" method ="POST" name ="profile_button" id="tryagain_form">
                                    <input class="submit_button" type="submit" value="Go Back To Your Profile">
                                </form>
                                <form action="../home/index.php" method ="POST" name ="home_button">
                                    <input class="submit_button" type="submit" value="Go Back To The Home Page">
                                </form>
                            </div>
END;
            $_SESSION["name"] = $newname;
            $_SESSION["lastname"] = $newlastname;
            $_SESSION["email"] = $newemail;
        }
        else {
            $stmt -> close();
            $conn -> close();
            header("Location: ../utilities/ups.php");
            exit;
        }
    }
    else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo <<<END
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <title>Update Result</title>
                            <link rel="stylesheet" href="../styles/utilities.css">
                            <link rel="stylesheet" href="../styles/menu.css">
                            <link rel="stylesheet" href="../styles/footer.css">
                        </head>
                        <body>
END;
            echo "<div class='content'>";
            echo "<h2>Error!</h2>";
            echo "<br>";
            echo "<p>The input format of the email address is incorrect.</p>";

            echo <<< END
                <div class="poster_div">
                    <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
                </div>
                <form action="update_profile_form.php" method ="POST" name ="tryagain_button" id="tryagain_form">
                     <input class="submit_button" type="submit" value="Try Again">
                </form>
                <form action="../home/index.php" method ="POST" name ="home_button">
                     <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
            </div>
END;
        }
        else {
            echo <<<END
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <title>Update Result</title>
                            <link rel="stylesheet" href="../styles/utilities.css">
                            <link rel="stylesheet" href="../styles/menu.css">
                            <link rel="stylesheet" href="../styles/footer.css">
                        </head>
                        <body>
END;
            echo "<div class='content'>";
            echo "<h2>Error!</h2>";
            echo "<br>";
            echo "<p>The input format of the first name or the last name is incorrect.</p>";

            echo <<< END
                <div class="poster_div">
                    <img src="../img/logo/bolt-white-bg.png" alt="Red bolt.">
                </div>
                <form action="update_profile_form.php" method ="POST" name ="tryagain_button" id="tryagain_form">
                    <input class="submit_button" type="submit" value="Try Again">
                </form>
                <form action="../home/index.php" method ="POST" name ="home_button">
                     <input class="submit_button" type="submit" value="Go Back To The Home Page">
                </form>
            </div>
END;
        }
    }
    $stmt -> close();
    $conn -> close();
}

include("../footer/footer.php");

echo <<<END
            <script src="../utilities/size.js"></script>
            </body>
        </html>
END;
