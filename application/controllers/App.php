<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {

	public function __construct() {

		parent::__construct();

		if(!$this->data['user']) {
			redirect('login');
		}
	}

	public function index() {
		$this->view('pages/home');
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */