<?php
require_once('../config/database.php');
require_once('../app/routes.php');

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
