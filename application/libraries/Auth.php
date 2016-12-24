<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	private $CI;

	public function __construct() {

		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->model(['User_admin']);
	}

	public function login($username, $password) {

		$user = $this->check($username, $password);

		if($user) {
			
			$this->CI->session->set_userdata(USER, $user);

			return TRUE;
		}

		return FALSE;
	}

	public function login_by_id($id) {

		$user = $this->CI->User_admin->get($id);

		if($user) {

			$this->CI->session->set_userdata('user', $user);
		}

		return $user;
	}

	public function logout() {

		$this->CI->session->unset_userdata(USER);
	}

	public function is_logged_in() {
		
		$user = $this->get_current_user();

		if($user) {

			$user = $this->CI->User_admin->check($user->id, $user->username);

			if($user) {
				return TRUE;
			}
		}

		$this->logout();

		return FALSE;
	}

	public function get_current_user() {
		
		$user = $this->CI->session->userdata(USER);
		return $user;
	}

	public function refresh() {

		$user = $this->get_current_user();

		$user = $this->CI->User_admin->get($user->id);

		$this->CI->session->set_userdata(USER, $user);

		return $user;
	}

	public function check($username, $password) {

		$user = $this->CI->User_admin->get_by_key('username', $username);

		if($user) {

			if(password_verify($password, $user->password)) {

				return $user;
			}
		}

		return FALSE;
	}

}


/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */