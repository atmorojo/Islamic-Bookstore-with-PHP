<?php

class aboutController extends controller {

  public function index() {
    $this->view->title = 'Online Bookstore';

    $this->view->show('head');
    $this->view->show('sidebar');
    $this->view->show('header');
    $this->view->show('banner');
    $this->view->show('navbar');
    $this->view->show('about');
    $this->view->show('footer');
  }

}

?>
