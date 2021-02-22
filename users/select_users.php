<?php
session_start();
?>

<?php
/** @var mysqli $conn */
include "../../../../private/database.php";

$email = $_SESSION["email"];

if ($_SESSION["privileged"] == 1) {

    $sql = "SELECT U.FirstName, U.LastName, U.Email, REPLACE(REPLACE(IFNULL(U.Newsletter, 0), 1, 'Subscribed'), 0, 'Not Subscribed') AS Newsletter
            FROM Users U";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $sqlresult = $stmt -> get_result();
    $stmt -> close();

    // prepare JSon
    $data = "";
    $data .= '{"data":[  ';
    while ($row = $sqlresult -> fetch_assoc()) {
        $data .= '[';
        $data .= '"' . $row["FirstName"] . '"';
        $data .= ',';
        $data .= '"' . $row["LastName"] . '"';
        $data .= ',';
        $data .= '"' . $row["Email"] . '"';
        $data .= ',';
        $data .= '"' . $row["Newsletter"] . '"';
        $data .= '], ';
    }
    $data = substr($data, 0, -2);
    $data .= ']}';

    echo $data;
}
else {
    header("Location: ../utilities/access_denied.php");
    exit;
}
?>