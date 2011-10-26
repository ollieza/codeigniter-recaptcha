<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>reCaptcha</title>
</head>
<body>
<?php echo form_open('recaptchademo'); ?>
<?php echo form_error('recaptcha_response_field'); ?>
<?php echo $recaptcha; ?>
<?php echo form_submit('recaptchasubmit', 'Check Recaptcha'); ?>
<?php echo form_close(); ?>
</body>
</html>
