<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*  @author   : TheDevs
*  date      : 13 September, 2020
*/

class Email_model extends Base_model
{

	function password_reset($email_to = "", $email_message = "")
	{
		$email_sub = "Password Resetting Mail";
		return $this->send_mail_using_php_mailer($email_message, $email_sub, $email_to);
	}

	public function send_mail_using_php_mailer($message = NULL, $subject = NULL, $to = NULL)
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host       = get_smtp_settings('host');
		$mail->SMTPAuth   = true;
		$mail->Username   = get_smtp_settings('username');
		$mail->Password   = get_smtp_settings('password');
		$mail->SMTPSecure = get_smtp_settings('security');
		$mail->Port       = get_smtp_settings('port');

		$mail->setFrom(get_smtp_settings('username'), get_smtp_settings('from'));
		$mail->addReplyTo(get_system_settings('system_email'), get_system_settings('system_name'));

		// Add a recipient
		$mail->addAddress($to);

		// Email subject
		$mail->Subject = $subject;

		// Set email format to HTML
		$mail->isHTML(true);

		// Enabled debug
		$mail->SMTPDebug = false;

		$htmlContent = $this->load->view('email/template', array('message' => $message), TRUE);
		$mail->Body = $htmlContent;
		// Send email
		if (!$mail->send()) {
			// YOU CAN DEBUG HERE, WHETHER MAIL IS GOING OT NO. YOU CAN PRING THE "ErrorInfo" OF MAIL OBJECT
			return false;
		} else {
			// YOU CAN DEBUG HERE. WHETHER THE MAIL IS GOING OR NOT. YOU CAN ECHO HERE
			return true;
		}
	}
}
