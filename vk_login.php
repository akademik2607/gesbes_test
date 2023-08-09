<?php 

require_once 'config.php';
$params = array(
        'client_id'     => $vk_client_id,
		    'scope'         => 'email',
        'redirect_uri'  => $vk_redirect_uri,
        'response_type' => 'code'

);

$url = 'https://oauth.vk.com/authorize';


header('Location: '. $url . '?' . urldecode(http_build_query($params)) ); exit();

