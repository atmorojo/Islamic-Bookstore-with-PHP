<?php

class buku extends database {

  public $ISBN;
  public $judul;
  public $pengarang;
  public $penerbit;
  public $sinopsis;
  public $cover;
  public $stok;
  public $bs;
  public $harga;
  public $kategori;

  public function __construct($data = NULL) {
    parent::__construct();

    if (is_array($data)) {
      $this->ISBN       = $data['ISBN'];
      $this->judul      = $data['judul'];
      $this->pengarang  = $data['pengarang'];
      $this->penerbit   = $data['penerbit'];
      $this->sinopsis   = $data['sinopsis'];
      $this->cover      = $data['ISBN'].'.jpg';
      $this->stok       = $data['stok'];
      $this->bs         = $data['bs'];
      $this->harga      = $data['harga'];
      $this->kategori   = $data['kategori'];
    }
  }

  public function fetch($ISBN) {
    $sql = $this->connection->prepare('SELECT * FROM buku WHERE ISBN = :ISBN');

    $sql->bindParam(':ISBN', $ISBN);
    $sql->execute();

    $data = $sql->fetch(PDO::FETCH_ASSOC);

    return $data;
  }

  public function add() {
    if (empty($this->fetch($this->ISBN))) {
      $sql = $this->connection->prepare('INSERT INTO buku(ISBN, judul, pengarang, penerbit, sinopsis, cover, stok, bs, harga, kategori) VALUES(:ISBN, :judul, :pengarang, :penerbit, :sinopsis, :cover, :stok, :bs, :harga, :kategori)');

      $sql->bindParam(':ISBN',      $this->ISBN);
      $sql->bindParam(':judul',     $this->judul);
      $sql->bindParam(':pengarang', $this->pengarang);
      $sql->bindParam(':penerbit',  $this->penerbit);
      $sql->bindParam(':sinopsis',  $this->sinopsis);
      $sql->bindParam(':cover',     $this->cover);
      $sql->bindParam(':stok',      $this->stok);
      $sql->bindParam(':bs',        $this->bs);
      $sql->bindParam(':harga',     $this->harga);
      $sql->bindParam(':kategori',  $this->kategori);


      if(uploadCover()) {

        $sql->execute();

        return true;
      }
      else {
        return false;
      }
    } 

  }

  public function hapus($ISBN) {
    $sql = $this->connection->prepare('DELETE FROM buku WHERE ISBN = :ISBN'); 
    $sql->bindParam(':ISBN', $ISBN);
    $sql->execute();
  }

  public function update() {
    $sql = $this->connection->prepare('UPDATE buku SET 
      judul     = :judul,
      pengarang = :pengarang,
      penerbit  = :penerbit,
      sinopsis  = :sinopsis,
      cover     = :cover,
      stok      = :stok,
      bs        = :bs,
      harga     = :harga,
      kategori  = :kategori

      WHERE ISBN = :ISBN');


    $sql->bindParam(':ISBN',      $this->ISBN);
    $sql->bindParam(':judul',     $this->judul);
    $sql->bindParam(':pengarang', $this->pengarang);
    $sql->bindParam(':penerbit',  $this->penerbit);
    $sql->bindParam(':sinopsis',  $this->sinopsis);
    $sql->bindParam(':cover',     $this->cover);
    $sql->bindParam(':stok',      $this->stok);
    $sql->bindParam(':bs',        $this->bs);
    $sql->bindParam(':harga',     $this->harga);
    $sql->bindParam(':kategori',  $this->kategori);

    if (!empty($_FILES['sampul']['name'])) {
      uploadCover();
    }

    $sql->execute();
  }

  public function fetchAll($where = null, $limit = null) {
    if (empty($where) && empty($limit)) {
      $sql = $this->connection->prepare('SELECT * FROM buku');
    }

    else {
      if (empty($limit)) {
        $sql = $this->connection->prepare('SELECT * FROM buku WHERE kategori = :kategori');
        $sql->bindParam(':kategori',  $where);
      }

      else {
        $sql = $this->connection->prepare('SELECT * FROM buku WHERE kategori = :kategori LIMIT :limit');
        $sql->bindParam(':kategori',  $where);
        $sql->bindValue(':limit',  (int)$limit, PDO::PARAM_INT);
      }
    }

    $sql->execute();

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }

  public function validasi($isbn) {
    $data = $this->fetch($isbn);

    if (empty($data)) {
      return false;
    }
    else {
      return $data;
    }
  }

  public function updateStok($isbn, $stok) {
    $sql = $this->connection->prepare('UPDATE buku SET 
      stok     = :stok
      WHERE ISBN = :isbn');

    $sql->bindParam(':stok', $stok);
    $sql->bindParam(':isbn', $isbn);

    $sql->execute();
  }
}
?>
