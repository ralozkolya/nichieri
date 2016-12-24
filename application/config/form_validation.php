<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['add_Chosen'] = [
	['field' => 'name', 'label' => 'lang:name', 'rules' => 'required'],
	['field' => 'ends_on', 'label' => 'lang:ends_on', 'rules' => 'callback_valid_date'],
];

$config['edit_Chosen'] = [
	['field' => 'id', 'label' => 'lang:id', 'rules' => 'required|is_natural'],
	['field' => 'name', 'label' => 'lang:name', 'rules' => 'required'],
	['field' => 'ends_on', 'label' => 'lang:ends_on', 'rules' => 'callback_valid_date'],
];

$config['edit_Rules'] = [
	['field' => 'id', 'label' => 'lang:id', 'rules' => 'required|is_natural'],
	['field' => 'body', 'label' => 'lang:body', 'rules' => 'required'],
];

$config['change_password'] = [
	['field' => 'current_password', 'label' => 'lang:current_password', 'rules' => 'callback_valid_password'],
	['field' => 'new_password', 'label' => 'lang:new_password', 'rules' => 'required|min_length[6]'],
	['field' => 'repeat_password', 'label' => 'lang:repeat_password', 'rules' => 'matches[new_password]'],
];

$config['enable_all'] = [
	['field' => 'ends_on', 'label' => 'lang:ends_on', 'rules' => 'callback_valid_date'],
];