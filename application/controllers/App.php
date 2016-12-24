<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(['Facebook' => 'fb']);
		
		$fb_user = $this->fb->get_user();

		if(!$fb_user) {
			redirect('login');
		}

		$this->load->model('User');
		$this->User->register($fb_user);
		$this->data['user'] = $this->User->get_by_key('fb_id', $fb_user['id']);
	}

	public function index() {
		$this->view('pages/home');
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */