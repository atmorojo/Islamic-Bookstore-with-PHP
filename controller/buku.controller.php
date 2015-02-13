<?php

class bukuController extends controller {
  public function index() {
    $this->view->title = 'Daftar Buku';
    $buku = new buku;

    $data = $buku->fetchAll();
    $this->view->data = $data;

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('daftarBuku');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function add() {
    $this->view->title = 'Add Buku';

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('tambahBuku');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function tambah() {
    $buku = new buku($_POST);
    $result = $buku->add();

    if ($result != NULL) {
      header("Location: /buku/");
      exit();
    }
    else {
      $referer = $_SERVER['HTTP_REFERER'];
      $this->view->error = 'Gagal. Silakan input ulang';
      $this->view->redirect = $referer;
      $this->view->show('error');
    }
  }

  public function hapus($isbn) {
    $buku = new buku;
    $buku->hapus($isbn);
    header("Location: /buku/");
    exit();
  }

  public function edit($isbn) {
    $data = new buku;
    $this->view->data = $data->fetch($isbn);

    $this->view->title = 'Edit Buku';

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('bukuEdit');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function update() {
    $user = new buku($_POST);
    $user->update();

    header("Location: /buku/");
    exit();
    }
 

}

?>
