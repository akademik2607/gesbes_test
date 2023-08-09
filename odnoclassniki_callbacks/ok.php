<?php
session_start();
require_once '../config.php';
$tokenInfo;
	if (isset($_GET['code'])) {
	    $params = array(
	        'code' => $_GET['code'],
	        'redirect_uri' => $ok_redirect_uri,
	        'grant_type' => 'authorization_code',
	        'client_id' => $ok_client_id,
	        'client_secret' => $ok_client_secret
	    );
	    $url = 'http://api.odnoklassniki.ru/oauth/token.do';
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url); // url, куда будет отправлен запрос
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params))); // передаём параметры
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($curl);
	    curl_close($curl);
	    $tokenInfo = json_decode($result, true);
	    var_dump($tokenInfo);
	}



if (isset($tokenInfo['access_token']) && isset($ok_public_key)) {
    var_dump($tokenInfo);
    $sign = md5("application_key={$ok_public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$ok_client_secret}"));
    $params = array(
      'method'          => 'users.getCurrentUser',
      'access_token'    => $tokenInfo['access_token'],
      'application_key' => $ok_public_key,
      'format'          => 'json',
      'sig'             => $sign 
    );
    $userInfo = json_decode(file_get_contents('https://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);
    var_dump($userInfo);
}

if($userInfo) {
    $_SESSION['auth'] = true;
}
?>
<!DOCTYPE html>
<head></head>
<body>
<form id="myForm" action="/" method="post">
<?php
    echo '<input type="hidden" name="ok" value="1">';
    echo '<input type="hidden" name="name" value="' . $userInfo['first_name'] . ' ' . $userInfo['last_name'] . '">';
?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
</body>

