<?php
function welcome_mail($fname) {

    return "
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='The logo of the strike.' src='cid:img1' style='width: 230px'>
            </div>
            <div style='margin-left: 20%; margin-right: 20%'>
                <h3>Dear ".$fname.",</h3>
                <p>thank you for subscribing to the newsletter!</p>
                <p>From now on, we will keep you informed about all the upcoming events.</p>
                <p>In the meantime, check out our <a href='https://webdev19.dibris.unige.it/~S5089822/SAW/main/home/index.php'>website</a>.</p>
                <br>
                <p style='size:80%'>Visit your profile and unsubscribe if you wish to stop receiving email newsletters.</p>
                <br>
                <p>Best regards,</p>
                <h4>All-Poland Women's Strike Team</h4>
            </div>
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='Red bolt.' src='cid:img2' style='width: 180px; align-items: center; display: inline-block'>
            <div>
            ";
}

function goodbye_mail($fname) {

    return "
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='The logo of the strike.' src='cid:img1' style='width: 230px'>
            </div>
            <div style='margin-left: 20%; margin-right: 20%'>
                <h3>Dear ".$fname.",</h3>
                <p>you have successfully unsubscribed from the newsletter!</p>
                <p>From now on, we will not send you any email about the upcoming events.</p>
                <p>You can still check out our <a href='https://webdev19.dibris.unige.it/~S5089822/SAW/main/home/index.php'>website</a> to keep yourself informed.</p>
                <br>
                <p style='size:80%'>Visit your profile and subscribe if you wish to start again receiving email newsletters.</p>
                <br>
                <p>Best regards,</p>
                <h4>All-Poland Women's Strike Team</h4>
            </div>
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='Red bolt.' src='cid:img2' style='width: 180px; align-items: center; display: inline-block'>
            <div>
            ";
}

function normal_email($body) {

    return "
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='The logo of the strike.' src='cid:img1' style='width: 230px'>
            </div>
                <div style='margin-left: 20%; margin-right: 20%'>
                <br>
                <h3>Hello,</h3>
                <br>
                <p>".$body."</p>
                <br>
                <p>Check out our <a href='https://webdev19.dibris.unige.it/~S5089822/SAW/main/home/index.php'>website</a> to see more!</p>
                <br>
                <p style='size:80%'>Visit your profile and unsubscribe if you wish to stop receiving email newsletters.</p>
                <br>
                <p>Best regards,</p>
                <h4>All-Poland Women's Strike Team</h4>
            </div>
            <div style='align-items: center; display: flex; justify-content: center'>
                <img alt='Red bolt.' src='cid:img2' style='width: 180px; align-items: center; display: inline-block'>
            <div>
            ";
}