<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION["authorization"])) {
    echo <<<END

        <footer>
            <div class="follow">
                <div class="social_media_div">
                    <a href="https://www.facebook.com/ogolnopolskistrajkkobiet/?fref=ts">
                        <img class="social_media_icon" src="../img/icons/facebook.png" alt="Facebook icon.">
                    </a>
                </div>
                <div class="social_media_div">
                    <a href="https://twitter.com/strajkkobiet">
                        <img class="social_media_icon" src="../img/icons/twitter.png" alt="Twitter icon.">
                    </a>
                </div>
                <div class="social_media_div">
                    <a href="https://www.instagram.com/strajk_kobiet/">
                        <img class="social_media_icon" src="../img/icons/instagram.png" alt="Instagram icon.">
                    </a>
                </div>
            </div>
        
            </div>
            <div class="row">
                <div class="column1">
                    <p>The Women's Strike</p>
                    <div class="footer_logo_div">
                        <img src="../img/logo/head-white.png" alt="Strike's logo.">
                    </div>
                    <ul>
                        <li><a href="../profile/show_profile.php"><button class="register_button">Profile</button></a></li>
                        <li><a href="../logout/logout.php"><button class="login_button">Log out</button></a></li>
                    </ul>
                </div>
                <div class="column2">
                    <p>Organisation</p>
                    <ul>
                        <li><a href="../home/index.php">Home</a></li>
                        <li><a href="../about/about_us.php">About Us</a></li>
                        <li><a href="../history/history.php">History</a></li>
                        <li><a href="../events/events.php">Events</a></li>
                        <li><a href="../utilities/under_construction.php">Map of Events</a></li>
                        <li><a href="https://zrzutka.pl/en/akcje-i-dzialania-strajku-kobiet-mrsynp">Support Us</a></li>
                    </ul>
                </div>
                <div class="column3">
                    <p>Contact</p>
                    <ul>
                        <li>For Media: press@strajkkobiet.eu</li>
                        <li>Coordination Council: rada@strajkkobiet.eu</li>
                        <li>Voluntary Service: wolontariat@strajkkobiet.eu</li>
                        <li>Legal Support: parasolki.osk@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="project">
                <div>
                    <p>65704 SAW</p>
                </div>
                <div>
                    <p>Patryk Jan Sozański</p>
                </div>
                <div>
                    <p>2020-2021</p>
                </div>
            </div>
        </footer>

    
END;
}
else {

    echo <<<END

        <footer>
            <div class="follow">
                <div class="social_media_div">
                    <a href="https://www.facebook.com/ogolnopolskistrajkkobiet/?fref=ts">
                        <img class="social_media_icon" src="../img/icons/facebook.png" alt="Facebook icon.">
                    </a>
                </div>
                <div class="social_media_div">
                    <a href="https://twitter.com/strajkkobiet">
                        <img class="social_media_icon" src="../img/icons/twitter.png" alt="Twitter icon.">
                    </a>
                </div>
                <div class="social_media_div">
                    <a href="https://www.instagram.com/strajk_kobiet/">
                        <img class="social_media_icon" src="../img/icons/instagram.png" alt="Instagram icon.">
                    </a>
                </div>
            </div>
        
            </div>
            <div class="row">
                <div class="column1">
                    <p>The Women's Strike</p>
                    <div class="footer_logo_div">
                        <img src="../img/logo/head-white.png" alt="Strike's logo.">
                    </div>
                    <ul>
                        <li><a href="../registration/registration_form.php"><button>Register</button></a></li>
                        <li><a href="../login/login_form.php"><button>Log in</button></a></li>
                    </ul>
                </div>
                <div class="column2">
                    <p>Organisation</p>
                    <ul>
                        <li><a href="../home/index.php">Home</a></li>
                        <li><a href="../about/about_us.php">About Us</a></li>
                        <li><a href="../history/history.php">History</a></li>
                        <li><a href="../events/events.php">Events</a></li>
                        <li><a href="../utilities/under_construction.php">Map of Events</a></li>
                        <li><a href="https://zrzutka.pl/en/akcje-i-dzialania-strajku-kobiet-mrsynp">Support Us</a></li>
                    </ul>
                </div>
                <div class="column3">
                    <p>Contact</p>
                    <ul>
                        <li>For Media: press@strajkkobiet.eu</li>
                        <li>Coordination Council: rada@strajkkobiet.eu</li>
                        <li>Voluntary Service: wolontariat@strajkkobiet.eu</li>
                        <li>Legal Support: parasolki.osk@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="project">
                <div>
                    <p>65704 SAW</p>
                </div>
                <div>
                    <p>Patryk Jan Sozański</p>
                </div>
                <div>
                    <p>2020-2021</p>
                </div>
            </div>
        </footer>

END;
}