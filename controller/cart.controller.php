<?php

class cartController extends controller {
  public function index() {
    $this->view->title = 'Keranjang Belanja';
    $this->view->data = isset($_SESSION['cart']) ? $_SESSION : false;

    if (!isset($_SESSION['cart'])) {
      $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
      $this->view->error = 'Data keranjang masih kosong.';
      $this->view->redirect = $referer;
      $this->view->show('error');
    }

    else {
      $this->view->show('head');
      $this->view->show('sidebar');
      $this->view->show('header');
      $this->view->show('banner');
      $this->view->show('navbar');
      $this->view->show('cart');
      $this->view->show('footer');
    }
  }

  public function add($isbn) {

    if (!isset($_SESSION['username'])) {
      $referer = '/login/';
      $this->view->error = 'Silakan Log in terlebih dahulu';
      $this->view->redirect = $referer;
      $this->view->show('error');
      exit();
    }

    $buku = new buku;
    $data = $buku->validasi($isbn);
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';

    if (!isset($_SESSION['cart'][$isbn]['jumlah'])) {
      $_SESSION['cart'][$isbn] = array();
      $_SESSION['cart'][$isbn]['jumlah'] = 0;
    }

    if (!$data) {
      $this->view->redirect = $referer;
      $this->view->error = 'Buku tidak tersedia. Mohon ulang transaksi';
      $this->view->show('error');
      return false;
    }
    $_SESSION['cart'][$isbn]['jumlah'] += 1;
    $_SESSION['cart'][$isbn]['harga'] = $data['harga'];
    $_SESSION['cart'][$isbn]['subtotal'] = $_SESSION['cart'][$isbn]['jumlah'] * $_SESSION['cart'][$isbn]['harga'];
    totalItem();
    grandTotal();
    header("Location: $referer");
    exit();
  }

  public function remove($isbn) {
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    if (isset($_SESSION['cart'][$isbn]['jumlah'])) {
      $_SESSION['cart'][$isbn]['jumlah']--;

      $_SESSION['cart'][$isbn]['subtotal'] = $_SESSION['cart'][$isbn]['jumlah'] * $_SESSION['cart'][$isbn]['harga'];
      totalItem();
      grandTotal();

      if($_SESSION['cart'][$isbn]['jumlah'] < 1) {
        unset($_SESSION['cart'][$isbn]);
      }

      if ($_SESSION['totaljumlah'] < 1) {
        unset($_SESSION['cart']);
        unset($_SESSION['totaljumlah']);
        unset($_SESSION['grandtotal']);
        header("Location: /katalog/");
        exit();
      }
    }

    header("Location: $referer");
    exit();
  }

  public function eraseAll() {
    unset($_SESSION['cart']);
    unset($_SESSION['totaljumlah']);
    unset($_SESSION['grandtotal']);
    header("Location: /");
    exit();
  }

  public function cek() {
    $_SESSION['tujuan'] = $_POST['tujuan'];

    $this->view->show('head');
    $this->view->show('sidebar');
    $this->view->show('header');
    $this->view->show('banner');
    $this->view->show('navbar');
    $this->view->show('cekCart');
    $this->view->show('footer');
  }

  public function proses() {

    if (!isset($_SESSION['cart'])) {
      $this->view->error = 'Data keranjang masih kosong.';
      $this->view->redirect = '/';
      $this->view->show('error');
    }

    else {
      $db = new transaksi;
      $db->addDetail();
     $id = $db->simpan();
// $id = '00000013';
      $data = $db->fetchID($id);
      $detail = $db->fetchDetail($id);

      $this->view->data = $data;
      $this->view->detail = $detail;

      unset($_SESSION['cart']);
      unset($_SESSION['totaljumlah']);
      unset($_SESSION['grandtotal']);
      unset($_SESSION['tujuan']);

      $this->view->show('head');
      $this->view->show('sidebar');
      $this->view->show('header');
      $this->view->show('banner');
      $this->view->show('navbar');
      $this->view->show('bukti');
      $this->view->show('footer');
    }

  }
}

?>
