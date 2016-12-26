<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(['Facebook' => 'fb']);
		
		$fb_user = $this->fb->get_user();

		if(!$fb_user) {
			redirect('login');
		}

		$this->load->model('User');
		$this->User->register($fb_user);
		$this->data['user'] = $this->User->get_by_key('fb_id', $fb_user['id']);

		$this->data['now'] = strtotime('now');
	}

	public function index() {
		$this->chosen_ones();
	}

	public function chosen_ones() {

		$this->load->model(['Chosen', 'Rules', 'Like']);

		$last_like = $this->Like->last_like_time($this->data['user']->id)->modified;

		$this->data['chosen_ones'] = $this->Chosen->get_with_votes($this->data['user']->id);
		$this->data['rules'] = $this->Rules->get(1);
		$this->data['url'] = static_url('uploads/chosen_ones');
		$this->data['user_allowed'] = $this->user_allowed($last_like);

		for($i = count($this->data['chosen_ones']) + 1; $i <= 4; $i++) {
			$this->data['chosen_ones'][] = (object) [
				'type' => 'dummy',
				'label' => lang("will_be_added_{$i}"),
				'image' => 'question.png',
			];
		}

		$this->view('pages/home');
	}

	public function vote($id) {

		$this->load->model(['Chosen', 'Like']);

		$ends_on = $this->Chosen->get($id)->ends_on;
		$last_like = $this->Like->last_like_time($this->data['user']->id)->modified;

		if($this->chosen_allowed($ends_on) && $this->user_allowed($last_like)) {
			$this->Like->add_like($id, $this->data['user']->id);
		}

		$this->redirect();
	}

	public function vote_ends_in() {

		header('Content-Type: application/json');

		$this->load->model('Chosen');

		$chosen_ones = $this->Chosen->get_list();

		$vote_ends = 0;

		foreach($chosen_ones as $c) {
			$ends_on = strtotime($c->ends_on);
			if($this->chosen_allowed($c->ends_on)) {
				if(!$vote_ends || $vote_ends > $ends_on) {
					$vote_ends = $ends_on - $this->data['now'];
				}
			}
		}

		echo json_encode(['vote_ends_in' => $vote_ends]);
	}

	private function user_allowed($last_like) {
		return !$last_like || ($this->data['now'] - strtotime($last_like)) > 86400;
	}

	private function chosen_allowed($ends_on) {
		return $this->data['now'] < strtotime($ends_on);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */