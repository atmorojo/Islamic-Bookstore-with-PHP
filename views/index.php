<section class='index-main'>
<?php

$buku = new buku;
$hadits = $buku->fetchAll('hadits', 4);
$aqidah = $buku->fetchAll('aqidah', 4);
$fiqh = $buku->fetchAll('fiqh', 4);
$tarikh = $buku->fetchAll('tarikh', 4);
$lain = $buku->fetchAll('lain-lain', 4);

$daftar = array($hadits, $fiqh, $tarikh, $aqidah, $lain);
?>

<?php
foreach ($daftar as $key) {
  for ($i = 0; $i < count($key); $i++) {
    if ($i == 0 or $i % 4 == 0) {
?>
<div class='submit bold center'>
  <?php echo $key[$i]['kategori']; ?>
</div>
<div class='product-grid'>
<?php
    }
?>
<div class='product-container'>

  <a class='product-link' href='/katalog/detail/<?php echo $key[$i]['ISBN']; ?>'>

    <div class='image-container'>
      <img src="/img/cover/<?php echo $key[$i]['cover']; ?>" />
    </div>

    <div class='judul'>
      <?php echo '<strong>'.$key[$i]['judul'].'</strong>'; ?>
    </div>

    <div class='harga'>
      <?php echo 'Rp. '.number_format($key[$i]['harga'], 2, ',', '.'); ?>
    </div>
  </a>
  <a href='/cart/add/<?php echo $key[$i]['ISBN']; ?>' class='btn'><i class='fa fa-plus'></i> keranjang</a>
</div>
<?php
    if (($i > 1 && $i % 4 == 3) or $i == (count($key)-1)) {
?>
</div>
<?php
    }
  }
}

?>
</div>
