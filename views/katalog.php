<div class='product-wrap'>
<?php
for ($i = 0; $i < count($data); $i++) {
  if ($i == 0 or ($i > 1 && $i % 4 == 0)) {
?>
  <div class='product-grid'>
<?php
  }
?>
<div class='product-container'>
      <a class='product-link' href='/katalog/detail/<?php echo $data[$i]['ISBN']; ?>'>
        <div class='image-container'>
          <img src="/img/cover/<?php echo $data[$i]['cover']; ?>" />
        </div>
        <div class='judul'>
          <?php echo '<strong>'.$data[$i]['judul'].'</strong>'; ?>
        </div>
      <div class='harga'>
        <?php echo 'Rp. '.number_format($data[$i]['harga'], 2, ',', '.'); ?>
      </div>
      <a href='/cart/add/<?php echo $data[$i]['ISBN']; ?>' class='btn'><i class='fa fa-plus'></i> keranjang</a>
  </a>
</div>
<?php
  if ($i > 1) {
    if ($i % 4 == 3) {
?>
  </div>
<?php
    }
  }
}

?>
</div>
