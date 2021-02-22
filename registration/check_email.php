<?php
function find_user($database, $email){
    $sql = "SELECT count(*) AS  EmailCount
            FROM Users
            WHERE Email = ?";
    $stmt = $database -> prepare($sql);
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt -> get_result() -> fetch_assoc()['EmailCount'];
    $stmt -> close();
    return $result > 0;
}
?>

<?php
    /** @var mysqli $conn */
    include "../../../../private/database.php";

    $email = $_GET["typed_email"];

    if(find_user($conn, $email) == TRUE && (!isset($_SESSION["authorization"]))) {
        echo "<span class=''>The email address is already registered!</span>";
    }
