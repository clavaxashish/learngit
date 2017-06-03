<?php

/**
 * Gearman custom config file.
 */
if(ENVIRONMENT !== 'production') {
	$config['gearman_server'] = array('dev01.kraftly.com');
	$config['gearman_port'] = array('4730');
}
else {
	$config['gearman_server'] = array(
		'combustor01-internal.kraftly.com',
		'combustor02-internal.kraftly.com',
//		'combustor03-internal.kraftly.com',
		'socializer01-internal.kraftly.com',
		'receiver01-internal.kraftly.com',
		'127.0.0.1'
	);
	$config['gearman_port'] = array('4730', '4730', '4730', '4730', '4730', '4730');
	
	$config['gearman_client'] = array (
		'127.0.0.1'
	);
	$config['gearman_client_port'] = array ('4730');
}
