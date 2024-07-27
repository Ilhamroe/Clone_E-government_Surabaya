<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$receiving_email_address = 'iramadani2003@gmail.com';

$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
if (file_exists($php_email_form_path)) {
  include ($php_email_form_path);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form();
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$contact->subject = $_POST['subject'];
$contact->message = '';

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['subject'], 'Subject');
$contact->add_message($_POST['message'], 'Message', 10);

if ($contact->send()) {
  echo 'OK';
} else {
  echo 'There was an error sending your message. Please try again later.';
}
?>