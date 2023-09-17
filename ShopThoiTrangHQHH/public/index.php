<?php
require_once('../app/routes.php');
$ini = parse_ini_file('../config/app.ini');

try {
  $pdo = new PDO("mysql:host={$ini['db_host']};dbname={$ini['db_name']}", $ini['db_username'], $ini['db_password']);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

$route = $_GET['route'] ?? '/';
if (isset($routes[$route])) {
  $controllerName = $routes[$route]['controller'];
  $action = $routes[$route]['action'];
  require_once('../app/controllers/' . $controllerName . '.php');
  $controller = new $controllerName();
  $controller->$action();
} else {
  require_once('../app/views/404.php');
}
