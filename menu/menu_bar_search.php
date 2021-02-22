<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION["authorization"])) {
    echo <<<END

        <div class="top">
                <div class="search_bar">
                    <input id="search" type="text" placeholder="Search..."/>
                    <button id="search_button">
                        <img class="icon" src="../img/icons/magnifying-glass.png" alt="Magnifying glass.">
                    </button>
                </div>
        </div>

END;

    include ("../menu/menu_bar.php");
}
else {

    echo <<<END
        <div class="top">
                <div class="search_bar">
                    <input id="search" type="text" placeholder="Search..."/>
                    <button id="search_button">
                        <img class="icon" src="../img/icons/magnifying-glass.png" alt="Magnifying glass.">
                    </button>
                </div>
        </div>
END;

    include ("../menu/menu_bar.php");
}