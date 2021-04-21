<?php
  
  $receiving_email_address = 'cristianburloiu@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = 'mail@cristianbdavies.com';
  $contact->subject = $_POST['subject'];

  /*
  $contact->smtp = array(
    'host' => 'mail.cristianbdavies.com',
    'username' => 'mail@cristianbdavies.com',
    'password' => 'ubiQUi3do%ue$s89',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
