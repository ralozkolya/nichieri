<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

	public function index() {
		$this->view('pages/add_to_fb');
	}

	public function redirect($path = NULL) {
		redirect('https://www.facebook.com/gpcvizrunoTsicocxleze/app/624359667744524/');
	}

	public function privacy() {

		echo '<h1>Under construction...</h1>';
	}

}

/* End of file Add_to_fb.php */
/* Location: ./application/controllers/Add_to_fb.php */