<?php
session_start();

require_once 'helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="Author" content="JeanCS">
    <meta name="Keywords" content="contact, form, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Form</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">

</head>
<body>

    <section class="contact">

        <!-- Print errors in a list -->
        <?php if(!empty($errors)): ?>
            <div id="errors">
                <ul>
                    <li>
                        <?php echo implode('</li><li>', $errors); ?>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

        <form id="contactForm" action="contact.php" method="post" name="ContactForm">

            <div id="from">
                <label for="name"><span class="fontawesome-user"></span></label>
                <input type="text" name="name" autocomplete="off" placeholder="Your name"
                    <?php echo isset($fields['name']) ? assignValue($fields['name']) : ''; ?>
                >
            </div>

            <div id="reply">
                <label for="email"><span class="fontawesome-envelope"></span></label>
                <input type="text" name="email" autocomplete="off" placeholder="Your email"
                    <?php echo isset($fields['email']) ? assignValue($fields['email']) : '' ?>
                >
            </div>

            <div id="message"></div>
                <label for="msg_text"></label>
                <textarea id="msg_text" name="message" placeholder="Your message here"><?php echo isset($fields['message']) ? sanitizeString($fields['message']) : ''; ?></textarea>
            </div>

            <p><input type="submit" value="Send"></p>

        </form>
    </section>

</body>
</html>

<?php

unset($_SESSION['errors']);
unset($_SESSION['fields']);

 ?>
