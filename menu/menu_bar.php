<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION["authorization"])) {
    echo <<<END

        <div class="menu_div">
            <div class="logo_div">
                <a href="../home/index.php"><img class="logo" src="../img/logo/head-black.png" alt="Strike's logo."></a>
            </div>
            <nav id="menu_bar" class="menu_bar">
                <ul>
                    <li><a href="../home/index.php">Home</a></li>
                    <li><a href="../about/about_us.php">About Us</a></li>
                    <li><a href="../history/history.php">History</a></li>
                    <li><a href="../events/events.php">Events</a></li>
                    <li><a href="../utilities/under_construction.php">Map of Events</a></li>
                    <li><a href="https://zrzutka.pl/en/akcje-i-dzialania-strajku-kobiet-mrsynp"><u>Support Us</u></a></li>
                </ul>
            </nav>
            <nav id="login_bar" class="login_bar">
                <ul>
                    <li><a href="../logout/logout.php"><button class="login_button">Log out</button></a></li>
                    <li><a href="../profile/show_profile.php"><button class="register_button">Profile</button></a></li>
                </ul>
            </nav>
        </div>

END;
}
else {

    echo <<<END

        <div class="menu_div">
            <div class="logo_div">
                <a href="../home/index.php"><img class="logo" src="../img/logo/head-black.png" alt="Strike's logo."></a>
            </div>
            <nav id="menu_bar" class="menu_bar">
                <ul>
                    <li><a href="../home/index.php">Home</a></li>
                    <li><a href="../about/about_us.php">About Us</a></li>
                    <li><a href="../history/history.php">History</a></li>
                    <li><a href="../events/events.php">Events</a></li>
                    <li><a href="../utilities/under_construction.php">Map of Events</a></li>
                    <li><a href="https://zrzutka.pl/en/akcje-i-dzialania-strajku-kobiet-mrsynp"><u>Support Us</u></a></li>
                    
                </ul>
            </nav>
            <nav id="login_bar" class="login_bar">
                <ul>
                    <li><a href="../login/login_form.php"><button class="login_button">Log in</button></a></li>
                    <li><a href="../registration/registration_form.php"><button class="register_button">Register</button></a></li>
                </ul>
            </nav>
        </div>

END;
}