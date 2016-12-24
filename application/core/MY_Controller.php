<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = [
		'title' => 'Nichieri',
		'highlighted' => NULL,
	];

	public function __construct() {

		date_default_timezone_set('Asia/Tbilisi');

		parent::__construct();

		set_language();

		$this->load->language('general');
	}

	protected function message($message, $type = SUCCESS, $redirects = TRUE) {

		if($redirects) {
			$this->session->set_flashdata($type, $message);
			$this->redirect();
		}

		else {
			$this->data[$type] = $message;
		}
	}

	protected function redirect($path = NULL) {

		if(!empty($this->data[ERROR])) {
			$this->session->set_flashdata(ERROR, $this->data[ERROR]);
		}

		if(!empty($this->data[SUCCESS])) {
			$this->session->set_flashdata(SUCCESS, $this->data[SUCCESS]);
		}

		if($path) {
			redirect($path);
		}

		elseif($this->agent->referrer()) {
			redirect($this->agent->referrer());
		}

		redirect($this->data['redirect_base']);
	}

	protected function view($view) {
		$this->load->view($view, $this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */