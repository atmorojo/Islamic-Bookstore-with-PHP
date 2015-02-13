<?php

class registerController extends controller {

  public function index() {
    $this->view->title = 'Register';

    $this->view->show('head');
    $this->view->show('sidebar');
    $this->view->show('header');
    $this->view->show('banner');
    $this->view->show('navbar');
    $this->view->show('register');
    $this->view->show('footer');
  }

  public function proses() {
    $user = new user($_POST); 
    $result = $user->daftar();

    if ($result) {
      if (isAdmin()) {
        header ("Location: /user/");
        exit();
      }
      else {
        header("Location: /login/");
        exit();
      }
    }

    else {
      $referer = $_SERVER['HTTP_REFERER'];
      $this->view->error = 'Username tidak tersedia. Silakan pilih username lain';
      $this->view->redirect = $referer;
      $this->view->show('error');
    }
  }

}
?>
