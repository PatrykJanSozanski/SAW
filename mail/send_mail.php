<?php
/*function save_mail($mail) {

    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}*/

function send_many_mails($rows, $subject, $body, $path_img1, $path_img2) {

    date_default_timezone_set('Etc/UTC');

    require '../PHPMailer/PHPMailerAutoload.php';

    /**
     * @var $googleuser
     * @var $googlepass
     */
    include "../../../../private/google.php";

    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->SMTPDebug = 0;

    $mail->Debugoutput = "html";

    $mail->Host = "smtp.gmail.com";

    $mail->Port = 587;

    $mail->SMTPSecure = "tls";

    $mail->SMTPAuth = true;

    $mail->Username = $googleuser;

    $mail->Password = $googlepass;

    if (!$mail->setFrom("allpolandwomensstrike@gmail.com", "All-Poland Women's Strike")) {
        header("Location: ../utilities/ups.php");
        exit;
    }

    if (gettype($rows) == "object") {
        while ($row = $rows -> fetch_assoc()) {
            $recipient = $row['Email'];
            $fname = $row['FirstName'];
            $lname = $row['LastName'];

            $mail -> addAddress($recipient, $fname . " " . $lname);
        }
    }
    elseif (gettype($rows) == "array") {
        $recipient = $rows['Email'];
        $fname = $rows['FirstName'];
        $lname = $rows['LastName'];

        $mail -> addAddress($recipient, $fname . " " . $lname);
    }

    $mail->Subject = $subject;

    $mail->AddEmbeddedImage("$path_img1", "img1", "img1.png");

    $mail->AddEmbeddedImage("$path_img2", "img2", "img2.png");

    $mail->Body = $body;

    $mail->AltBody = strip_tags($body);

    if (!$mail->send()) {
        header("Location: ../utilities/ups.php");
        exit;
    } else {
        //save_mail($mail);
    }
}