<?php

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
var_dump($name);

if (empty($name)) {
	$errors['name'] = true;
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Contact Form</title>
<link href="css/general.css" rel="stylesheet">

</head>
<body>

    <form method="post" action="index.php">
        <div>
            <label for="name">Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="name" name="name" value"<?php echo $name;?>">
        </div>
        <div>
            <label for="email">E-mail Address</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <div>
            <button type="submit">Send Message</button>
        </div>
    </form>

</body>
</html>