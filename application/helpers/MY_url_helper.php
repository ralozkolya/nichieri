<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function static_url($segments = '') {

	return base_url('static').'/'.$segments;
}

function locale_url($segments = '') {

	$ci =& get_instance();
	return base_url($ci->config->item('language')).'/'.$segments;
}