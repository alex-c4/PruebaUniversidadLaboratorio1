<?php
	if (!isset($_SESSION)) { session_start(); }

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '1499841116813598',
		'app_secret' => '2c41bde445f1300ad8f5e0eb830ae8e8',
		'default_graph_version' => 'v2.10' 

	]);

	$helper = $FB->getRedirectLoginHelper();

?>
