<div class='cart'>
  <a href='/cart/' class='btn'><i class='fa fa-arrow-left'></i> Kembali</a>
</div>
<div class='cart'>
  <div class='list-barang'>
    <table cellspacing='0' class='table table-condensed'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Judul</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
<?php
$buku = new buku;
$i = 0;
foreach ($_SESSION['cart'] as $key => $val) {
  $databuku = $buku->fetch($key);
?>
      <tr>
        <td><?php echo ++$i . '.'; ?></td>
        <td><?php echo $databuku['judul']; ?></td>
        <td><?php echo $val['harga']; ?></td>
        <td><?php echo $val['jumlah']; ?></td>
        <td><?php echo $val['subtotal']; ?></td>
      </tr>
<?php
}
?>
      <tr>
        <td colspan='3'></td>
        <th>Total</th>
        <td><?php echo $_SESSION['grandtotal']; ?></td>
      </tr>
      </tbody>
    </table>
  </div>

  <div class='tujuan'>
    <div class='input submit'>
      <div class='center bold'>Tujuan Pengiriman</div>
      <div>
      <?php echo $_SESSION['tujuan']; ?>
    </div>
    </div>
    <div>
      <a href='/cart/proses/' class='btn submit input center'>Proses</a>
    </div>
