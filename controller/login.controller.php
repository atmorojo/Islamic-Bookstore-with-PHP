<?php

class loginController extends controller {

  public function index() {
    $this->view->title = 'Login';

    $this->view->show('head');
    $this->view->show('sidebar');
    $this->view->show('header');
    $this->view->show('banner');
    $this->view->show('navbar');
    $this->view->show('login');
    $this->view->show('footer');
  }

  public function admin() {
    $this->view->title = 'Login Admin';
    $this->view->admin = True;

    $this->view->show('head');
    $this->view->show('sidebar');
    $this->view->show('header');
    $this->view->show('banner');
    $this->view->show('navbar');
    $this->view->show('login');
    $this->view->show('footer');
  }

  public function check() {
    $user = new user;

    $valid = $user->validasi($_POST['username'], $_POST['password']);

    if ($valid === false) {
      $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
      $this->view->error = 'Password dan Username salah';
      $this->view->redirect = $referer;
      $this->view->show('error');
    }

    else {
      $_SESSION = $valid;
      print_r($_SESSION);

      if ($_SESSION['akses'] == 1) {
        header("Location: /");
        exit();
      }

      else {
        header("Location: /controlpanel/");
        exit();
      }
    }
  }

}

?>
