<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function admin_table($type, $items, $columns, $path = NULL) {

	$ci =& get_instance();

	return $ci->load->view('elements/admin/table', [
		'type' => $type,
		'items' => $items,
		'columns' => $columns,
		'path' => $path,
	], TRUE);
}

function form_fields($fields) {

	foreach($fields as $f) {

		$name = @get_value($f['name']);
		$value = @get_value($f['value']);
		$append = @get_value($f['append']);
		$type = @get_value($f['type'], 'text');

		$response[] = input_field($name, $value, $type, $append);
	}

	return $response;
}

function input_field($name, $value = NULL, $type = 'text', $append = NULL) {

	$ci =& get_instance();

	return $ci->load->view('elements/admin/input_field', [
		'name' => $name,
		'value' => $value,
		'type' => $type,
		'append' => $append,
	], TRUE);
}

function get_value($value, $default = NULL) {
	return empty($value) ? $default : $value;
}