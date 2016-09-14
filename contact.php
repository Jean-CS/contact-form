<?php

// Transfering information submitted to form and posted to this file back again
// erros or old form data
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$errors = [];

// print_r($_POST);

if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {

    $fields = [
        'name'    => $_POST['name'],
        'email'   => $_POST['email'],
        'message' => $_POST['message'],
    ];

    /**
     * Check empty fields
     * $field == key
     * $data  == value
     */
    foreach($fields as $field => $data) {
        if (empty($data)) {
            $errors[] = 'The ' . $field . ' field is required';
        }
    }

    if(empty($errors)) {

        $mail   = new PHPMailer();
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->SMTPDebug = 2;

        // Connect to GMAIL SMTP service
        $mail->Host       = getenv('MAIL_HOST');
        $mail->Username   = getenv('MAIL_USERNAME');
        $mail->Password   = getenv('MAIL_PASSWORD');
        $mail->SMTPSecure = getenv('MAIL_SMTPSECURE');
        $mail->Port       = getenv('MAIL_PORT');;

        $mail->isHTML();

        $mail->Subject = 'Contact form submitted';
        $mail->Body =
            'From: ' . $fields['name'] .
            ' ('     . $fields['email'] . ')' .
            '<p>'    . $fields['message'] . '</p>';

        $mail->FromName = 'Contact';

        // $mail->AddReplyTo($fields['email'], $fields['name']);

        $mail->AddAddress(getenv('MAIL_ADDRESS'), getenv('MAIL_ADDRESS_NAME'));

        if ($mail->send()) {
            header('Location: thanks.php');
            die();
        } else {
            // $errors[] = 'Mailer error: ' . $mail->ErrorInfo;
            $errors = 'Sorry, could not send email. Please try again later.';
        }

    }

} else {
    $errors[] = 'Something went wrong.';
}

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('Location: index.php');

 ?>
