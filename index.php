<?php
	require_once('core.php');

	// Redirect to the last Expansion used
	$index = 'ew';
	if(empty($_COOKIE[Config::$cookie_last_expansion])){
		$index = 'ew';
		$arr_cookie_options = array (
			'expires' => time()+60*60*24*365,
			'path'    => '/',
			'domain'  => Config::$domain_cookie,
			'secure'  => true,
			'httponly' => false,
			'samesite' => 'Strict'
		);
		setcookie(Config::$cookie_last_expansion, $index, $arr_cookie_options);
	} else {
		$index = $_COOKIE[Config::$cookie_last_expansion];
		switch ($index) {
			case "arr":
				$index = 'arr';
				break;
			case "hw":
				$index = 'hw';
				break;
			case "sb":
				$index = 'sb';
				break;   
			case "shb":
				$index = 'shb';
				break;
			case "ew":
				$index = 'ew';
				break;  
			default:
				$index = 'ew';
				break;
		}
	}

	header("Location: https://".Config::$domain."/".$index."/"); /* Redirect browser */
	exit();