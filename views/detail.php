<div class='detail'>
  <div class='detail-gambar'>
    <img src='/img/cover/<?php echo $data['cover']; ?>' alt='' />
    <div class='detail-harga'>Rp. <?php echo number_format($data['harga'], 2, ',', '.'); ?> </div>
    <a href='/cart/add/<?php echo $data['ISBN']; ?>' class='tombol'>Tambah ke keranjang</a>
  </div>
  <div class='detail-text'>
    <div class='row-1'><h4 class='detail-judul'><?php echo $data['judul']; ?></h4></div>
    <div class='row-2'><?php echo $data['pengarang']; ?> — <?php echo $data['penerbit']; ?></div>
    <div class='row-3'><br /><p></p><p><?php echo $data['sinopsis']; ?><p></div>
  </div>
</div>
