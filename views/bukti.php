<div class='cart'>
<div>Silakan transfer ke rekening kami dengan nomor referensi berikut: <span class='bold'><?php echo $data[0]['cart_id']; ?></span></div>
<div>Transaksi tanggal: <span class='bold'><?php echo $data[0]['tanggal']; ?></span></div>
<div>Pembeli: <span class='bold'><?php echo $data[0]['username']; ?></span></div>
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
for ($i = 0; $i < count($detail); $i++) {
  $databuku = $buku->fetch($detail[$i]['ISBN']);
?>
<tr>
<td><?php echo $i + 1 . '.'; ?></td>
<td><?php echo $databuku['judul']; ?></td>
<td><?php echo $databuku['harga']; ?></td>
<td><?php echo $detail[$i]['jumlah']; ?></td>
<td><?php echo $detail[$i]['subtotal']; ?></td>
</tr>
<?php
}
?>
<tr>
<td colspan='3'></td>
<th>Total</th>
<td><?php echo $data[0]['total']; ?></td>
</tr>
</tbody>
</table>
</div>

<div class='tujuan'>
<div class='input submit'>
<div class='center bold'>Tujuan Pengiriman</div>
<div> <?php echo $data[0]['tujuan']; ?> </div>
</div>
</div>
