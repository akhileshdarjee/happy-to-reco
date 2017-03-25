<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class EmailController extends Controller
{
	// send email
	public static function send($from, $to, $subject, $data, $module = null, $template = null) {
		$email_template_map = [
			'User' => [
				'from' => 'akhileshdarjee@gmail.com',
				'template' => 'emails.sign_up'
			],
		];

		if (!$from && $module) {
			$from = $email_template_map[$module]['from'];
		}

		if (!$subject && $module) {
			if ($module == "User") {
				$subject = "Sign Up successful";
			}
		}

		if ($module) {
			if (!$template) {
				$template = $email_template_map[$module]['template'];
			}
		}

		$mail_config = (object) array(
			'from' => $from ? $from : "akhileshdarjee@gmail.com",
			'to' => $to,
			'subject' => $subject
		);

		Mail::send($template, array('data' => $data), function ($message) use ($mail_config) {
			$message->from($mail_config->from, "Web App");
			$message->to($mail_config->to);
			$message->subject($mail_config->subject);
		});
	}
}