<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Model {

	protected $table = 'pages';
	protected $slug = 'en_title';

	public function get_navigation() {

		$this->db->where('navigation', 1);
		$this->db->order_by('priority');

		return $this->get_localized_list();
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->select_localized();
		return parent::get_list();
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_title as title",
			"{$lang}_body as body",
			"id", "slug",
		]);
	}

}

/* End of file Page.php */
/* Location: ./application/models/Page.php */