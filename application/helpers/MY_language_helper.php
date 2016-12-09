<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_language($_lang = NULL) {

	$ci =& get_instance();

	$lang = $ci->uri->segment(1);
	$config = $ci->config->item('language');
	$cookie = json_decode(base64_decode(get_cookie('lang')));

	if($_lang) {
		$lang = $_lang;
	}

	if(!$cookie && !isset($cookie->value)) {
		$cookie = new stdClass;
		$cookie->value = $config;
		$cookie->expire = 0;
	}

	if($lang !== EN && $lang !== GE && $lang !== RU) {
		if($cookie->value === EN || $cookie->value === GE || $cookie->value === RU) {
			$lang = $cookie->value;
		}

		else {
			$lang = $config;
		}
	}

	if($config !== $lang) {
		$ci->config->set_item('language', $lang);
	}

	$diff = $cookie->expire - strtotime('now');

	$diff = $diff / 60 / 60 / 24;

	if($diff < 45 || $cookie->value !== $lang) { //if it's been at around 2 weeks

		$cookie = [
			'value' => $lang,
			'expire' => strtotime('2 months'),
		];

		$value = base64_encode(json_encode($cookie));

		set_cookie([
			'name' => 'lang',
			'value' => $value,
			'expire' => 60*60*24*60,
		]);
	}
}

function lang_link($lang) {

	$ci =& get_instance();

	$uri = $ci->uri->uri_string();

	$link = preg_replace('/'.GE.'|'.EN.'|'.RU.'/', $lang, $uri, 1);

	if(!$link) $link = $lang;

	return base_url().$link;
}

function get_lang() {
	
	$ci =& get_instance();

	return $ci->config->item('language');
}

function get_lang_code($lang) {
	switch($lang) {
		case EN: return 'en';
		case GE: return 'ka';
		case RU: return 'ru';
	}
}