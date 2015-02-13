<?php

class user extends database {

  public $username;
  public $password;
  public $email;
  public $nama;
  public $alamat;
  public $telp;
  public $akses;

  public function __construct($data = NULL) {
    parent::__construct();

    if (is_array($data)) {
      $this->username = $data['username'];
      $this->password = $data['password'];
      $this->email    = $data['email'];
      $this->nama     = $data['nama'];
      $this->alamat   = $data['alamat'];
      $this->telp     = $data['telp'];
      $this->akses    = isset($data['akses']) ? $data['akses'] : 1;
    }
  }

  public function fetch($username) {
    $sql = $this->connection->prepare('SELECT * FROM user WHERE username = :username');

    $sql->bindParam(':username', $username);
    $sql->execute();

    $data = $sql->fetch(PDO::FETCH_ASSOC);

    return $data;
  }

  public function daftar() {
    if (empty($this->fetch($this->username))) {
      $sql = $this->connection->prepare('INSERT INTO user(username, password, email, nama, alamat, telp, akses) VALUES(:username, :password, :email, :nama, :alamat, :telp, :akses)');

      $sql->bindParam(':username',  $this->username);
      $sql->bindParam(':password',  $this->password);
      $sql->bindParam(':email',     $this->email);
      $sql->bindParam(':nama',      $this->nama);
      $sql->bindParam(':alamat',    $this->alamat);
      $sql->bindParam(':telp',      $this->telp);
      $sql->bindParam(':akses',     $this->akses);

      $sql->execute();

      return true;
    } 

    else { return false; }
  }

  public function hapus($username) {
    $sql = $this->connection->prepare('DELETE FROM user WHERE username = :username'); 
    $sql->bindParam(':username', $username);
    $sql->execute();
  }

  public function update() {
    $sql = $this->connection->prepare('UPDATE user SET password = :password, email = :email, nama = :nama, alamat = :alamat, telp = :telp, akses = :akses WHERE username = :username');

    $sql->bindParam(':username',  $this->username);
    $sql->bindParam(':password',  $this->password);
    $sql->bindParam(':email',     $this->email);
    $sql->bindParam(':nama',      $this->nama);
    $sql->bindParam(':alamat',    $this->alamat);
    $sql->bindParam(':telp',      $this->telp);
    $sql->bindParam(':akses',     $this->akses);

    $sql->execute();
  }

  public function fetchAll() {
    $sql = $this->connection->prepare('SELECT * FROM user');

    $sql->execute();

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }

  public function validasi($username, $password) {
    $data = $this->fetch($username);

    if (!empty($data)) {
      if ($data['username'] === $username && $data['password'] === $password) {
        return $data;
      }
    }
    return false;
  }

}

?>
