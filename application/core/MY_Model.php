<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $upload_path = 'static/uploads/';
	protected $thumbs_path = NULL;

	protected $table;
	protected $images_table;
	protected $images_model;
	protected $with_image = FALSE;
	protected $image_required = FALSE;
	protected $slug = FALSE;

	public function get($id) {

		$this->db->where("{$this->table}.id", $id);

		$r = $this->db->get($this->table);

		return $r->row();
	}

	public function get_by_key($key, $value) {

		$this->db->where($key, $value);

		return $this->db->get($this->table)->row();
	}

	public function add($data) {

		if($this->with_image) {

			try {
				$upload = $this->upload();
				$data['image'] = $upload['file_name'];
			}

			catch(Exception $e) {
				if($this->image_required && empty($upload)) {
					throw $e;
				}
			}
		}

		if($this->slug) {
			$data['slug'] = $this->generate_slug($data[$this->slug]);
		}

		if(!empty($data['link'])) {
			$data['link'] = $this->prep_url($data['link']);
		}

		if($this->db->insert($this->table, $data)) {
			return TRUE;
		}

		else {
			throw new Exception(lang('unexpected_error'));
		}
	}

	public function edit($data) {

		if($this->with_image) {

			try {
				$upload = $this->upload();
				$data['image'] = $upload['file_name'];

				$this->delete_image($data['id']);
			}

			catch(Exception $e) {
				//Too bad
			}
		}

		if(!empty($data['link'])) {
			$data['link'] = $this->prep_url($data['link']);
		}

		$this->db->where(['id' => $data['id']]);

		if($this->db->update($this->table, $data)) {
			return TRUE;
		}

		else {
			throw new Exception(lang('unexpected_error'));
		}
	}

	public function delete($id) {

		if($this->with_image) {
			$this->delete_image($id);
		}

		if(!empty($this->images_model)) {
			$this->delete_images($id);
		}

		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function get_list($limit = NULL, $offset = NULL) {

		if($limit) {
			if($offset) {
				$this->db->limit($limit, $offset);
			}

			else {
				$this->db->limit($limit);
			}
		}

		$r = $this->db->get($this->table);

		return $r->result();
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		return $this->get_list($limit, $offset);
	}

	public function add_images($item) {

		$files = $_FILES;

		$count = count($_FILES['images']['name']);

		for($i = 0; $i < $count; $i++) {

			$_FILES['image']['name'] = $files['images']['name'][$i];
			$_FILES['image']['type'] = $files['images']['type'][$i];
			$_FILES['image']['tmp_name'] = $files['images']['tmp_name'][$i];
			$_FILES['image']['error'] = $files['images']['error'][$i];
			$_FILES['image']['size'] = $files['images']['size'][$i];

			$upload = $this->upload();

			if($upload) {

				$data['image'] = $upload['file_name'];
				$data['item'] = $item;

				$this->db->insert($this->table, $data);
			}

			else {
				throw new Exception($this->upload->display_errors());
			}
		}
	}

	protected function delete_image($id) {

		$item = $this->get($id);
		$path = $this->upload_path.$item->image;

		if(file_exists($path)) {
			unlink($path);
		}

		if(!empty($this->thumbs_path)) {

			$path = $this->thumbs_path.$item->image;
			if(file_exists($path)) {
				unlink($path);
			}
		}
	}

	protected function delete_images($item) {

		$model = $this->images_model;

		$this->load->model($model);

		$this->db->where('item', $item);
		$images = $this->$model->get_list();

		foreach($images as $i) {

			$this->$model->delete($i->id);
		}
	}

	protected function hash_password($password) {

		return password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));
	}

	protected function upload() {

		$this->load->library('upload');

		$config['allowed_types'] = 'png|jpg|gif';
		$config['upload_path'] = $this->upload_path;
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		if($this->upload->do_upload('image')) {

			$data = $this->upload->data();

			if($this->thumbs_path) {

				$this->load->library('image_lib');

				if(isset($data['full_path'])) {

					$config = [];
					$config['source_image'] = $data['full_path'];
					$config['width'] = 300;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = $this->thumbs_path.$data['file_name'];

					$this->image_lib->initialize($config);

					if(!$this->image_lib->resize()) {
						throw new Exception($this->image_lib->display_errors());
					}
				}

				else {
					throw new Exception(lang('unexpected_error'));
				}
			}

			return $data;
		}
		
		else {
			throw new Exception($this->upload->display_errors());
		}
	}

	protected function generate_slug($raw, $key = 'slug') {

		$i = 0;

		do {

			$slug = url_title($raw);

			if($i) {
				$slug .= $i;
			}

			$this->db->where($key, $slug);
			$r = $this->db->get($this->table);

			$i++;

		} while($r->num_rows());

		return $slug;
	}

	protected function prep_url($url) {

		if(empty($url) || $url === '#') {
			return $url;
		}

		else {
			return prep_url($url);
		}
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */