<div class='tabel'>
<a href='/user/add/' class='btn'><i class='fa fa-plus'></i> Tambah User baru</a>
  <table cellspacing='0' class='table table-condensed'>
    <thead>
      <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Hak Akses</th>
      </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($data); $i++) {
?> 
    <tr>
      <td><?php echo $i + 1 . '.'; ?></td>
      <td><?php echo $data[$i]['username']; ?></td>
      <td><?php echo $data[$i]['nama']; ?></td>
      <td><?php echo $data[$i]['email']; ?></td>
      <td><?php echo $data[$i]['telp']; ?></td>
      <td><?php echo $data[$i]['alamat']; ?></td>
      <td><?php echo $data[$i]['akses']; ?></td>
      <td>
<a href='/user/edit/<?php echo $data[$i]['username']; ?>' ><i class='fa fa-edit'></i></a>
      </td>
      <td>
<a href='/user/hapus/<?php echo $data[$i]['username']; ?>'><i class='fa fa-trash-o'></i></a>
      </td>
    </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
