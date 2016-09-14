<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Author" content="JeanCS">
    <meta name="Keywords" content="contact, form, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Form</title>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

    <section class="contact">
        <div class="panel">Errors will go in here</div>

        <form action="contact.php" method="post" name="ContactForm">
            <label>
                Your name *
                <input type="text" name="name" autocomplete="off">
            </label>

            <label>
                Your email address *
                <input type="text" name="email" autocomplete="off">
            </label>

            <label>
                Your message *
                <textarea name="message" rows="8"></textarea>
            </label>
            <input type="submit" value="Send">

            <p class="muted">* means a required field</p>
        </form>
    </section>

</body>
</html>
