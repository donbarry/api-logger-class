<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '6LdBBv0SAAAAABAiILm8YOhJ4fSHixwpl1RiawZI');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-metro-cyan.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-metro-cyan.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-metro-cyan" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>My form</h2></div>
	<div class="element-input<?frmd_add_class("input")?>"><label class="title">Input Text</label><input class="large" type="text" name="input" /></div>
	<div class="element-multiple<?frmd_add_class("multiple")?>"><label class="title">Multiple select</label><div class="large"><select data-no-selected="Nothing selected" name="multiple[]" multiple="multiple" >

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select></div></div>
	<div class="element-textarea<?frmd_add_class("textarea")?>"><label class="title">Text Area</label><textarea class="medium" name="textarea" cols="20" rows="5" ></textarea></div>
	<div class="element-recaptcha<?frmd_add_class("captcha")?>"><label class="title">reCAPTCHA</label><script type="text/javascript">var RecaptchaOptions = {theme : "clean"};</script>
<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LdBBv0SAAAAAOLtUjhIQ8uXGw1bTIfUofcO64Y_&theme=clean"></script>
<noscript><iframe src="http://www.google.com/recaptcha/api/noscript?k=6LdBBv0SAAAAAOLtUjhIQ8uXGw1bTIfUofcO64Y_&hl=en" height="300" width="500" frameborder="0"></iframe></br>
<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea><input type="hidden" name="recaptcha_response_field" value="manual_challenge"></noscript>
<script type="text/javascript">if (/#invalidcaptcha$/.test(window.location)) (document.getElementById("recaptcha_widget_div")).className += " error"</script></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?=dirname($form_path)?>/formoid-metro-cyan.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>