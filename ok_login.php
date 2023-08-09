<?php

require_once 'config.php';



  $url = 'http://www.odnoklassniki.ru/oauth/authorize';

	$params = array(
	    'client_id'     => $ok_client_id,
	    'response_type' => 'code',
	    'redirect_uri'  => $ok_redirect_uri
	);


  header('Location: '. $url . '?' . urldecode(http_build_query($params)) ); exit();

