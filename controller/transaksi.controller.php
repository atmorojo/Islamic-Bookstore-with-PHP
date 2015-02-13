<?php

class transaksiController extends controller {

  public function index() {
    date_default_timezone_set('UTC');
    $tanggal = date("Y-m-d");

    $transaksi = new transaksi;
//    $this->view->data = $transaksi->fetchAll($tanggal);
    $this->view->data = $transaksi->fetchAll();

    $this->view->title = 'Daftar Transaksi';

    $this->view->show('head');
    $this->view->show('headerAdmin');
    $this->view->show('daftarTransaksi');
    $this->view->show('greetAdmin');
    $this->view->show('footer');
  }

  public function bayar($id) {
    $bayar = new transaksi;
    $bayar->update($id, 'paid');

    header("Location: /transaksi");
    exit();
  }

  public function batal($id) {
    $bayar = new transaksi;
    $bayar->update($id, 'canceled');

    header("Location: /transaksi");
    exit();
  }

  public function proses($id) {
    $bayar = new transaksi;
    $stok = new buku;
    $data = $bayar->fetchDetail($id);

    print_r($data);

    foreach ($data as $i => $key) {
      print_r($key);
      $curStok = $stok->fetch($key['ISBN']);

      $newStok = $curStok['stok'] - $key['jumlah'];
      echo $newStok;
      $stok->updateStok($key['ISBN'], $newStok);
    }

   $bayar->update($id, 'sent');

    header("Location: /transaksi");
    exit();
  }

}

?>
