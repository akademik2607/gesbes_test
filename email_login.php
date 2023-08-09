<?php 
session_start();

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    || empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
    || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

      header('Location: /');
  }

$email;
$password;

if (isset($_POST['email']) && $_POST['email']){
    $email = $_POST['email'];
} else {
    die(json_encode(['result' => 'error']));
}

if (isset($_POST['password']) && $_POST['password']){
    $password = $_POST['password'];
} else {
    die(json_encode(['result' => 'error']));
}


require_once 'db.php';

$result = false;
foreach($users as $user) {
    if ($user['email'] == $email) {
        $result = password_verify($password, $user['password']);
        if ($result) {
          break;
        }
    }
}

if ($result) {
    $_SESSION['auth'] = $result;
}


echo $result ? json_encode(['result' => $email]) : json_encode(['result' => 'error']);
exit;