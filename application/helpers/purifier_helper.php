<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function purify($dirty) {

	$purifier = new HTMLPurifier();

	if(is_array($dirty)) {

		foreach($dirty as $k => $d) {
			$dirty[$k] = purify($d);
		}

		return $dirty;
	}

	elseif(is_object($dirty)) {

		foreach($dirty as $k => $d) {
			$dirty->$k = purify($d);
		}

		return $dirty;
	}

	else {
		return $purifier->purify($dirty);
	}
}