<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook {

	private $ci;
	private $fb;

	public function __construct($params) {

        $this->ci =& get_instance();

		$this->fb = new Facebook\Facebook($params);
	}

	public function get_user() {

		try {
			$token = $this->get_token();
			return $this->fb->get('/me?fields=name,picture', $token)->getDecodedBody();
		}
		
		catch(Exception $e) {}

		$this->ci->session->unset_userdata('access_token');
		return NULL;
	}

	private function get_token() {

		$token = $this->ci->session->userdata('access_token');

		if($token && !$token->isExpired()) {
			return $token;
		}

		$helper = $this->fb->getJavaScriptHelper();

		try {
			$token = $helper->getAccessToken();

			if($token) {

				if(!$token->isLongLived()) {

					$client = $this->fb->getOAuth2Client();
					$token = $client->getLongLivedAccessToken($token);

					$this->ci->session->set_userdata('access_token', $token);
				}

				return $token;
			}
		}

		catch(Exception $e) {}

		$this->ci->session->unset_userdata('access_token');
		return NULL;
	}
}

/* End of file Facebook.php */
/* Location: ./application/libraries/Facebook.php */
