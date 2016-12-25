<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model {

	protected $table = 'users';

	public function register($data) {

		$id = $data['id'];
		$name = $data['name'];
		$fb_img = $data['picture']['data']['url'];

		if(!parent::get_by_key('fb_id', $id)) {
			parent::add([
				'fb_id' => $id,
				'name' => $name,
				'fb_img' => $fb_img,
			]);
		}
	}

	public function total_rows() {
		return $this->db->get($this->table)->num_rows();
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */