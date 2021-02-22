<?php
session_start();

function user_verify($database, $email, $pass) {
    $sql = "SELECT FirstName, LastName, Password, Newsletter, Privileged
            FROM Users
            WHERE Email = ?";
    $stmt = $database -> prepare($sql);
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $sqlresult = $stmt -> get_result();
    $stmt -> close();
    if (!empty($sqlresult)) {
        $row = $sqlresult -> fetch_assoc();
        $sqlpass = $row["Password"];
        if (!empty($sqlpass) and (password_verify($pass, $sqlpass))) {
            $_SESSION["authorization"] = TRUE;
            $_SESSION["name"] = $row["FirstName"];
            $_SESSION["lastname"] = $row["LastName"];
            $_SESSION["email"] = $email;
            $_SESSION["newsletter"] = $row["LastName"];
            $_SESSION["privileged"] = $row["Privileged"];
            return TRUE;
        }
    }
    else {
        return FALSE;
    }
}

if (!isset($_POST['email']) or !isset($_POST['pass'])) {
    header("Location: ../utilities/ups.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login Result</title>
    <link rel="stylesheet" href="../styles/utilities.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>
<body>

<?php
    include("../menu/menu_bar.php");

/** @var mysqli $conn */
include "../../../../private/database.php";

$email = $conn -> real_escape_string(htmlspecialchars($_POST['email']));
$pass = $conn -> real_escape_string(htmlspecialchars($_POST['pass']));

if (user_verify($conn, $email, $pass)) {

    echo "<div class='content'>";
    echo "<h2>Welcome!</h2>";
    echo "<br>";
    echo "<p>You have successfully logged in to your account!</p>";
    echo "<div class='poster_div'>";
    echo "<img src='../img/logo/bolt-white-bg.png' alt='Red bolt.'>";
    echo "</div>";
    echo '<form action="../home/index.php" method ="POST" name ="home_button">
                         <input class="submit_button" type="submit" value="Go Back To The Home Page">
                         </form>';
    echo "</div>";
}
else {
    echo "<div class='content'>";
    echo "<h2>Error!</h2>";
    echo "<br>";
    echo "<p>Incorrect email address or password!</p>";
    echo "<div class='poster_div'>";
    echo "<img src='../img/logo/bolt-white-bg.png' alt='Red bolt.'>";
    echo "</div>";
    echo '<form action="login_form.php" method ="POST" name ="tryagain_button"  id="tryagain_form">
                         <input class="submit_button" type="submit" value="Try Again">
                         </form>';
    echo '<form action="../home/index.php" method ="POST" name ="home_button">
                         <input class="submit_button" type="submit" value="Go Back To The Home Page">
                         </form>';
    echo "</div>";
}

$conn -> close();

include("../footer/footer.php");
?>
    <script src="../utilities/size.js"></script>
    </body>
</html>