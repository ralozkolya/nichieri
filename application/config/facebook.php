<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['app_id'] = getenv('FB_ID');
$config['app_secret'] = getenv('FB_SECRET');
$config['default_graph_version'] = getenv('FB_V');
