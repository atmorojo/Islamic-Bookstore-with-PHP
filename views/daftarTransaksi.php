<div class='tabel'>
  <table cellspacing='0' class='table table-condensed'>
    <thead>
      <tr>
        <th>No.</th>
        <th>Cart ID</th>
        <th>Pembeli</th>
        <th>Total</th>
        <th>Tujuan Pengiriman</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($data); $i++) {
?> 
    <tr>
      <td><?php echo $i + 1 . '.'; ?></td>
      <td><?php echo $data[$i]['cart_id']; ?></td>
      <td><?php echo $data[$i]['username']; ?></td>
      <td><?php echo $data[$i]['total']; ?></td>
      <td><?php echo $data[$i]['tujuan']; ?></td>
      <td><?php echo $data[$i]['tanggal']; ?></td>
      <td><?php echo $data[$i]['status']; ?></td>
      <td>
<?php
  if ($data[$i]['status'] == 'sent' OR $data[$i]['status'] == 'canceled') {
    echo "<td></td>";
  }
  else {
    if ($data[$i]['status'] == 'unpaid') {
      $aksi = 'bayar';
      $tombol = "<i class='fa fa-check'></i>";
    }

    else if ($data[$i]['status'] == 'paid') {
      $aksi = 'proses';
      $tombol = "<i class='fa fa-send'></i>";
    }
?>
        <a href='/transaksi/<?php echo $aksi; ?>/<?php echo $data[$i]['cart_id']; ?>'><?php echo $tombol; ?></a>
      </td>
      <td>
<a href='/transaksi/batal/<?php echo $data[$i]['cart_id']; ?>' class='btn-red'><i class='fa fa-times'></i></a>
      </td>
<?php
  }
?>
    </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
