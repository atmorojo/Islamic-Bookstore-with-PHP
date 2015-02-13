<?php

class userController extends controller {
  public function index() {
    $this->view->title = 'Daftar User';
    $user = new user;

    $data = $user->fetchAll();
    $this->view->data = $data;

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('daftarUser');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function add() {
    $this->view->title = 'Add User';

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('register');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function hapus($username) {
    $user = new user;
    $user->hapus($username);
    header("Location: /user/");
    exit();
  }

  public function edit($user) {
    $data = new user;
    $this->view->data = $data->fetch($user);

    if (isAdmin()) {
      $this->view->title = 'Edit User';

      $this->view->show('head');
      $this->view->show('headerAdmin');
      $this->view->show('userEdit');
      $this->view->show('greetAdmin');
    }
    else {
      $this->view->title = 'Edit Profil';

      $this->view->show('head');
      $this->view->show('sidebar');
      $this->view->show('header');
      $this->view->show('banner');
      $this->view->show('navbar');
      $this->view->show('userSide');
      $this->view->show('userEdit');
    }
    $this->view->show('footer');
  }

  public function update() {
    $user = new user($_POST);
    $user->update();

    if (isAdmin()) {
      header("Location: /user/");
      exit();
    }
    else {
      header("Location: /logout/");
      exit();
    }
  }
}
?>
