<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends MY_Model {

	protected $table = 'admins';

	public function add($raw) {

		$data['username'] = $raw['username'];
		$data['password'] = $this->hash_password($raw['password']);

		return parent::add($data);
	}

	public function edit($data) {

		$data['password'] = $this->hash_password($data['password']);

		return parent::edit($data);
	}

	public function edit_password($user, $password) {

		$data['id'] = $user;
		$data['password'] = $this->hash_password($password);

		return parent::edit($data);
	}

}

/* End of file User_admin.php */
/* Location: ./application/models/User_admin.php */