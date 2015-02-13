<div class='cart'>
  <a href='/cart/eraseall/' class='btn'><i class='fa fa-trash-o'></i> Kosongkan keranjang</a>
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
foreach ($data['cart'] as $key => $val) {
  $databuku = $buku->fetch($key);
?>
      <tr>
        <td><?php echo ++$i . '.'; ?></td>
        <td><?php echo $databuku['judul']; ?></td>
        <td><?php echo $val['harga']; ?></td>
        <td><?php echo $val['jumlah']; ?></td>
        <td><?php echo $val['subtotal']; ?></td>
        <td>
          <a href='/cart/remove/<?php echo $key; ?>'> <i class='fa fa-minus'></i> </a>
        </td>
        <td>
          <a href='/cart/add/<?php echo $key; ?>'> <i class='fa fa-plus'></i> </a>
        </td>
      </tr>
<?php
}
?>
      <tr>
        <td colspan='3'></td>
        <th>Total</th>
        <td><?php echo $_SESSION['grandtotal']; ?></td>
        <td></td>
        <td></td>
      </tr>
      </tbody>
    </table>
  </div>
  
  <div class='tujuan'>
    <form action='/cart/cek/' method='POST' class='form'>
      <fieldset>
        <legend>Tujuan Pengiriman</legend>
        <div>
          <textarea name='tujuan' class='submit tujuan input'></textarea>
        </div>
        <div>
          <button type='submit' class='btn submit input'>Proses Pesanan</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
