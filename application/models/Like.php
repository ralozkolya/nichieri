<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends MY_Model {

	protected $table = 'likes';

	public function last_like_time($user) {

		$this->db->select([
			"MAX({$this->table}.modified) as modified"
		]);
		$this->db->where('user', $user);
		return $this->db->get($this->table)->row();
	}

	public function add_like($chosen, $user) {

		$this->add([
			'chosen' => $chosen,
			'user' => $user,
		]);
	}

}

/* End of file Like.php */
/* Location: ./application/models/Like.php */