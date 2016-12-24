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