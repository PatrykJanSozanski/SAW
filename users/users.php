<?php
session_start();

/** @var mysqli $conn */
include "../../../../private/database.php";

$email = $_SESSION["email"];

if ($_SESSION["privileged"] == 1) {
    echo <<< END

        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="utf-8"/>
            <title>Registered users</title>
            <link rel="stylesheet" href="../styles/users.css">
            <link rel="stylesheet" href="../styles/menu.css">
            <link rel="stylesheet" href="../styles/footer.css">
        </head>
        
        <body>

END;

    include("../menu/menu_bar.php");

    echo <<< END
    
        <div class="content">
            <h2>Registered users</h2>
            <br>
            <div class="table_div">
                <table id="users">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Newsletter</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

END;

    include("../footer/footer.php");

    echo <<< END
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="./users_table.js"></script>
        
        </body>
        </html>

END;
}
else {
    header("Location: ../utilities/access_denied.php");
    exit;
}