<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chosen extends MY_Model {

	protected $upload_path = 'static/uploads/chosen_ones/';

	protected $table = 'chosen_ones';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_with_votes($user_id) {

		$this->db->select([
			"chosen_ones.name",
			"chosen_ones.image",
			"COUNT(likes.chosen) as count",
			"(CASE likes.user WHEN {$user_id} THEN 1 ELSE 0 END) as voted",
		]);
		$this->db->join('likes', "likes.chosen = chosen_ones.id", 'left');
		$this->db->group_by("chosen_ones.id");

		return parent::get_list();
	}

}

/* End of file Chosen.php */
/* Location: ./application/models/Chosen.php */