<?php
if (isset($_POST['submit'])) {
    $to = 'ayoub.maat@gmail.com'; // Use your own email address
    $subject = 'Feedback from my site';
    $message = 'Name: ' . $_POST['cf_name'] . "\r\n\r\n";
    $message .= 'Email: ' . $_POST['cf_email'] . "\r\n\r\n";
    $message .= 'Comments: ' . $_POST['cf_message'];

    $headers = "From: ayoub@ayoubm.com\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';

    $email = filter_input(INPUT_POST, 'cf_email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        $headers .= "\r\nReply-To: $email";
    }

    $success = mail($to, $subject, $message, $headers);

}

?>

<body>
    <?php if (isset($success) && $success) { ?>
    <h1>Thank You</h1>
        <p>Your message has been sent.</p>
    <?php } else { ?>
    <h1>Oops!</h1>
        <p>Sorry, there was a problem sending your message.</p>
    <?php } ?>
</body>
