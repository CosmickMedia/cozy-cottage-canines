<?php

global $ajax_hooks;
$ajax_hooks = [
	[
		'action' => 'get_available_puppies',
		'function' => 'ajax_get_available_puppies',
		'public' => true
	]
];