<?php

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST,'message', FILTER_SANITIZE_STRING);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;
	}
	
	if (mb_strlen($message) < 25) {
		$errors['message'] = true;
	}

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
            <input id="name" name="name" value="<?php echo $name;?>" required>
        </div>
        <div>
            <label for="email">E-mail Address<?php if (isset($errors['email'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input type="email" id="email" name="email" value="<?php echo $email;?>">
        </div>
        <div>
            <label for="message">Message<?php if (isset($errors['message'])) : ?> <strong>must be at least 25 characters</strong><?php endif; ?></label>
            <textarea id="message" name="message" required><?php echo $message;?></textarea>
        </div>
        <div>
            <button type="submit">Send Message</button>
        </div>
    </form>

</body>
</html>