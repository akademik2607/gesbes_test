<?php 

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    || empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
    || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

      header('Location: /');
  }


$users = [
  [
    'email' => 'exemple@mail.ru',
    'password' => '$2y$10$m0ovSf2rSVvq3BpSXtLXlOLg0LkrW9W5.5wicMYRsxCzz8ULEaDk6'   //1234
  ],

  [
    'email' => 'test@google.ru',
    'password' => '$2y$10$YAvNy4N6uVRK3ob9Kr5lOOkvVGWoqD1JuhS9PTxjC/qLshfDsqSLy'   //test!
  ],

  [
    'email' => 'user@yandex.ru',
    'password' => '$2y$10$MmZA38qA5frScp6briNDD.JZQkFvYs7bcXoF29uIK4f34PMzOcKTu'   //user_password123
  ],
];