<?php
/*
Template Name: Contact
*/
?>
&nbsp;
<?php
if(isset($_POST[‘submitted’])) {
if(trim($_POST[‘contactName’]) === ”) {
$nameError = ‘Please enter your name.’;
$hasError = true;
} else {
$name = trim($_POST[‘contactName’]);
}
&nbsp;
if(trim($_POST[’email’]) === ”)  {
$emailError = ‘Please enter your email address.’;
$hasError = true;
} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST[’email’]))) {
$emailError = ‘You entered an invalid email address.’;
$hasError = true;
} else {
$email = trim($_POST[’email’]);
}
&nbsp;
if(trim($_POST[‘comments’]) === ”) {
$commentError = ‘Please enter a message.’;
$hasError = true;
} else {
if(function_exists(‘stripslashes’)) {
$comments = stripslashes(trim($_POST[‘comments’]));
} else {
$comments = trim($_POST[‘comments’]);
}
}
&nbsp;
if(!isset($hasError)) {
$emailTo = get_option(‘tz_email’);
if (!isset($emailTo) || ($emailTo == ”) ){
$emailTo = get_option(‘admin_email’);
}
$subject = ‘[PHP Snippets] From ‘.$name;
$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
$headers = ‘From: ‘.$name.’ <‘.$emailTo.’>’ . "\r\n" . ‘Reply-To: ‘ . $email;
&nbsp;
wp_mail($emailTo, $subject, $body, $headers);
$emailSent = true;
}
&nbsp;
} ?>
<?php get_header(); ?>
<div id="container">
<div id="content">
&nbsp;
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h1><?php the_title(); ?></h1>
<div>
<?php if(isset($emailSent) && $emailSent == true) { ?>
<div>
<p>Thanks, your email was sent successfully.</p>
</div>
<?php } else { ?>
<?php the_content(); ?>
<?php if(isset($hasError) || isset($captchaError)) { ?>
<p>Sorry, an error occured.<p>
<?php } ?>
&nbsp;
<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
<ul>
<li>
<label for="contactName">Name:</label>
<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST[‘contactName’])) echo $_POST[‘contactName’];?>" />
<?php if($nameError != ”) { ?>
<span><?=$nameError;?></span>
<?php } ?>
</li>
&nbsp;
<li>
<label for="email">Email</label>
<input type="text" name="email" id="email" value="<?php if(isset($_POST[’email’]))  echo $_POST[’email’];?>" />
<?php if($emailError != ”) { ?>
<span><?=$emailError;?></span>
<?php } ?>
</li>
&nbsp;
<li><label for="commentsText">Message:</label>
<!-- <textarea name= -->"comments" id="commentsText" rows="20" cols="30"><?php if(isset($_POST[‘comments’])) { if(function_exists(‘stripslashes’)) { echo stripslashes($_POST[‘comments’]); } else { echo $_POST[‘comments’]; } } ?></textarea>
<?php if($commentError != ”) { ?>
<span><?=$commentError;?></span>
<?php } ?>
</li>
&nbsp;
<li>
<input type="submit">Send email</input>
</li>
</ul>
<input type="hidden" name="submitted" id="submitted" value="true" />
</form>
<?php } ?>
</div>
</div>
&nbsp;
<?php endwhile; endif; ?>
</div>
</div>
&nbsp;
<?php get_sidebar(); ?>
<?php get_footer(); ?>