<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function send_recovery($user) {

	$ci =& get_instance();

	$user = purify($user);

	$data['name'] = 'No reply';
	$data['subject'] = lang('password_recovery');
	$data['from'] = NO_REPLY;
	$data['to'] = $user->email;
	$data['message'] = $ci->load->view('email/password_recovery', $user, TRUE);

	send_email($data);
}

function send_message($d) {

	$d = purify($d);

	$ci =& get_instance();

	$data['from'] = $d['email'];
	$data['name'] = $d['name'];
	$data['subject'] = $d['subject'];
	$data['message'] = $ci->load->view('emails/message', $d, TRUE);
	$data['reply_to'] = $d['email'];
	$data['to'] = INFO_MAIL;

	send_email($data);
}

function send_email($data) {

	$ci =& get_instance();

	$ci->load->library('email');

	$ci->email->from($data["from"], $data['name']);
	$ci->email->to($data['to']);

	if(!empty($data['reply_to'])) {
		$ci->email->reply_to($data['reply_to'], $data['name']);
	}

	$ci->email->subject($data['subject']);
	$ci->email->message($data['message']);

	$ci->email->send();
}

/* End of file email_sender_helper.php */
/* Location: ./application/helpers/email_sender_helper.php */