<?php

abstract class controller {

  public $view;

  public function __construct() {
    $this->view = new view;
  }

  abstract function index();
}

?>
