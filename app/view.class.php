<?php

class view {

  private $vars = array();

  public function __set($index, $value) {
    $this->vars[$index] = $value;
  }

  function show($name) {
    $path = __SITE_PATH . '/views/' . $name . '.php';

    if (!file_exists($path)) {
      throw new Exception('View not found in ' . $path);
      return false;
    }

    foreach ($this->vars as $key => $value) {
      $$key = $value;
    }

    include ($path);
  }
}

?>
