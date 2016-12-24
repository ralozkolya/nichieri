<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('admin');
	}

	public function user() {

		$this->view('pages/login');
	}

	public function admin() {
		
		$this->load->library('Auth');

		$post = $this->input->post();

		if($post) {

			$username = $post['username'];
			$password = $post['password'];

			$user = $this->auth->login($username, $password);

			if($user) {
				redirect(base_url('admin'));
			}

			$this->session->set_flashdata(ERROR, lang('incorrect_credentials'));
			redirect(current_url());
		}
		
		$this->view('pages/admin/login');
	}

	public function logout() {
		$this->load->library('Auth');
		$this->auth->logout();
		redirect(base_url('login/admin'));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */