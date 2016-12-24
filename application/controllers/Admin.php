<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Auth');

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->message(lang('unauthorized'), ERROR, FALSE);
			$this->redirect('login/admin');
		}

		$this->load->helper('view');
		$this->load->language('admin');
		$this->load->library('form_validation');
		$this->load->model(['Chosen', 'Rules', 'User']);

		$this->data['redirect_base'] = base_url('admin');
	}

	public function index() {

		$this->chosen_ones();
	}

	public function chosen_ones() {

		$this->data['type'] = $type = 'Chosen';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);

		$this->data['highlighted'] = 'chosen_ones';
		$this->view('pages/admin/chosen_ones');
	}

	public function Chosen($id) {

		$this->data['type'] = $type = 'Chosen';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);

		$this->data['highlighted'] = 'chosen_ones';
		$this->view('pages/admin/chosen');
	}

	public function Rules($id = 1) {

		$this->data['type'] = $type = 'Rules';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);

		$this->data['highlighted'] = 'rules';
		$this->view('pages/admin/rules');
	}

	public function users() {

		$this->data['type'] = $type = 'User';

		$this->data['items'] = $this->get_items($type);

		$this->data['highlighted'] = 'users';
		$this->view('pages/admin/users');
	}


	/*	MODIFIERS	*/

	public function modify($type, $data = NULL) {

		if(!$this->input->post()) {
			return;
		}

		if(empty($data)) {
			$data = $this->input->post();
		}

		if(empty($data['id'])) {
			$this->add($type, $data);
		}

		else {
			$this->edit($type, $data);
		}
	}

	public function add($type, $data) {

		$allowed = [
			'Chosen',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("add_{$type}")) {

			try {
				$this->$type->add($data);
				$this->message(lang('added_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->validation_errors();
		}
	}

	public function edit($type, $data) {

		$allowed = [
			'Chosen', 'Rules',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("edit_{$type}")) {

			try {
				$this->$type->edit($data);
				$this->message(lang('changed_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->validation_errors();
		}
	}

	public function delete($type, $id) {

		$allowed = [
			'Chosen',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->$type->delete($id)) {
			$this->message(lang('deleted_successfully'));
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}
	}


	/*	HELPERS	*/

	private function is_allowed($array, $type) {

		foreach($array as $a) {
			if($type === $a) {
				return TRUE;
			}
		}

		return FALSE;
	}

	private function validation_errors() {
		$message = validation_errors('<div>', '</div>');
		$message = $message ? $message : lang('no_validation_rules');
		$this->message($message, ERROR, FALSE);
	}

	private function get_items($type) {

		$items = $this->$type->get_list();
		return $items;
	}

	private function get_item($type, $id) {

		$item = $this->$type->get($id);

		if(empty($item)) {
			show_404();
			exit;
		}

		return $item;
	}

	public function valid_date($date) {
		$format = 'Y-m-d H:i:s';
		$dateTime = DateTime::createFromFormat($format, $date);
		return $dateTime && $dateTime->format($format) == $date;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */