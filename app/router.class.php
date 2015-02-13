<?php

class router {
  private $path;

  public $file;
  public $controller;
  public $action;
  public $arg;

  function __construct($path) {
    if (!is_dir($path)) {
      throw new Exception ('Invalid controller path: `' . $path . '`');
    }

    $this->path = $path;
  }

  public function load() {
    $this->getController();

    if (!is_readable($this->file)) {
      include_once "404.html";
      die();
    }

    include_once $this->file;

    $class = $this->controller . 'Controller';
    $controller = new $class;

    if (!is_callable(array($controller, $this->action))) {
      $action = 'index';
    }

    else {
      $action = $this->action;
    }

    $arg = isset($this->arg) ? $this->arg : '';

    $controller->$action($arg);
  }

  private function getController() {
    $route = (empty($_GET['page'])) ? '' : $_GET['page'];

    if (empty($route)) { $route = 'index'; }

    else {
      $parts = explode('/', $route);
      $this->controller = $parts[0];

      if (isset($parts[1])) { $this->action = $parts[1]; }
      if (isset($parts[2])) { $this->arg = $parts[2]; }
    }

    if (empty($this->controller)) { $this->controller = 'index'; }
    if (empty($this->action)) { $this->action = 'index'; }

    $this->file = $this->path . '/' . $this->controller . '.controller.php';
  }
}

?>
