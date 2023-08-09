<?php
session_start();
require_once '../config.php';


if (isset($_GET['code'])) {


 $result = false;
    $params = array(
        'client_id' => $vk_client_id,
        'client_secret' => $vk_client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $vk_redirect_uri,
    );


    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
}

if(isset($token['email']) {
    $_SESSION['auth'] = true;
}

?>
<!DOCTYPE html>
<head></head>
<body>
<form id="myForm" action="/" method="post">
<?php
    echo '<input type="hidden" name="vk" value="1">';
    echo '<input type="hidden" name="email" value="' . $token['email'] . '">';
?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
</body>