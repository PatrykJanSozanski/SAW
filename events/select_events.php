<?php
/** @var mysqli $conn */
include "../../../../private/database.php";

$like = $conn -> real_escape_string(htmlspecialchars($_GET["like"]));

if (isset($_GET["like"])) {

    $sql = "SELECT City, Location, Date, Time, Title, Description
            FROM Events
            WHERE Date > current_date() AND(
                  DATE LIKE ?
               OR City LIKE ?
               OR Location LIKE ?
               OR Date LIKE ?
               OR Title LIKE ?
               OR Description LIKE ?
                )
                ORDER BY Date, TIME ASC";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("ssssss", $like, $like, $like, $like, $like, $like);
    $stmt -> execute();
    $sqlresult = $stmt -> get_result();
    $stmt -> close();

    // prepare JSon
    $data = "";

    if (!empty($sqlresult)) {
        $data .= '{"data":[  ';
        while ($row = $sqlresult -> fetch_assoc()) {
            $data .= '[';
            $data .= '"' . $row["City"] . '"';
            $data .= ',';
            $data .= '"' . $row["Location"] . '"';
            $data .= ',';
            $data .= '"' . $row["Date"] . '"';
            $data .= ',';
            $data .= '"' . $row["Time"] . '"';
            $data .= ',';
            $data .= '"' . $row["Title"] . '"';
            $data .= ',';
            $data .= '"' . $row["Description"] . '"';
            $data .= '], ';
        }
        $data = substr($data, 0, -2);
        $data .= ']}';
    }

    echo $data;
}
else {
    header("Location: ../utilities/ups.php");
    exit;
}