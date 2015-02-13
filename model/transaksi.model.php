<?php

class transaksi extends database {

  public function generateID() {
    $sql = $this->connection->query('select count(*) from cart');
    $data = $sql->fetch(PDO::FETCH_NUM);
    $num = sprintf('%08s', $data[0] + 1);

    return $num;
  }

  public function addDetail() {
    $id = $this->generateID();

    $sql = $this->connection->prepare('INSERT INTO cart_detail(cart_id, ISBN, jumlah, subtotal) VALUES(:id, :isbn, :jumlah, :subtotal)');
    foreach ($_SESSION['cart'] as $isbn => $array) {

      $sql->bindParam(':id',        $id);
      $sql->bindParam(':isbn',      $isbn);
      $sql->bindParam(':jumlah',    $array['jumlah']);
      $sql->bindParam(':subtotal',  $array['subtotal']);

      $sql->execute();
    }

    return true;
  }

  public function simpan() {
    date_default_timezone_set('UTC');
    $id = $this->generateID();
    $tanggal = date("Y-m-d");

    $sql = $this->connection->prepare('INSERT INTO cart (cart_id, username, total, tujuan, tanggal) VALUES (:id, :user, :total, :tujuan, :tanggal)');

    $sql->bindParam(':id',      $id);
    $sql->bindParam(':user',    $_SESSION['username']);
    $sql->bindParam(':total',   $_SESSION['grandtotal']);
    $sql->bindParam(':tujuan',  $_SESSION['tujuan']);
    $sql->bindParam(':tanggal', $tanggal);

    $sql->execute();

    return $id;
  }

  public function fetchID($where) {
    $sql = $this->connection->prepare('SELECT * FROM cart WHERE cart_id=:where');
    $sql->bindParam(':where', $where);

    $sql->execute();

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }

  public function fetchDetail($where) {
    $sql = $this->connection->prepare('SELECT * FROM cart_detail WHERE cart_id=:where');
    $sql->bindParam(':where', $where);

    $sql->execute();

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }

  public function fetchAll($where = null) {
    if (empty($where)) {
      $sql = $this->connection->prepare('SELECT * FROM cart');
    }

    else {
      $sql = $this->connection->prepare('SELECT * FROM cart WHERE tanggal = :tanggal');
      $sql->bindParam(':tanggal',  $where);
    }

    $sql->execute();

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }

  public function update($where, $status) {
    $sql = $this->connection->prepare('UPDATE cart SET status = :status WHERE cart_id = :id');

    $sql->bindParam(':status', $status);
    $sql->bindParam(':id', $where);

    $sql->execute();
  }

}
?>
