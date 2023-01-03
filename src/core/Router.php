<?php

namespace Metakomputer\core;



class Router {

  private $controller = null;
  private string $function;
  private array $params;
  private array $routes = [];

  function add(string $method, $controller, string $path, $handler)
  {
    $this->routes[] = [
      'method' => strtoupper($method),
      'path' => str_replace("{*}", "([0-9A-Za-z]*)", $path),
      'controller' => $controller,
      'handler' => $handler,
    ];
  }

  function run()
  {

    foreach ($this->routes as $route) {

      $method_request = $_SERVER['REQUEST_METHOD'];

      if (preg_match_all('#^' . $route['path'] . '$#', "/" . $_GET['url'], $params) && $method_request === $route['method']) {
        $this->controller = new $route['controller'];
        $this->function = $route['handler'];
        $params = array_column($params, 0);
        unset($params[0]);
        $this->params = $params;
      }

    }

    if($this->controller === null) {
      echo '404 Not found';
      exit;
    }
    if (method_exists($this->controller, $this->function)) {
      call_user_func_array([$this->controller, $this->function], $this->params);
    }
  }

  private function parseUrl()
  {
    if (isset($_GET['url'])) {
      $url = $_GET['url'];
      $url = filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
    return ['/'];
  }
}