<?php
require_once 'config.php';
$params = array(
	'client_id'     => $go_client_id,
	'redirect_uri'  => BASE_URL . '/google_callbacks/google.php',
	'response_type' => 'code',
	'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
	'state'         => '123'
);

 
header('Location: ' . 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params)));exit();
