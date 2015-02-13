<div class='tabel'>
  <a href='/buku/add/' class='btn'>Tambah Buku baru</a>
  <table cellspacing='0' class='table table-condensed'>
    <thead>
      <tr>
        <th>No.</th>
        <th>ISBN</th>
        <th>Judul</th>
        <th>Pengarang</th>
      </tr>
    </thead>
    <tbody>
<?php
for ($i = 0; $i < count($data); $i++) {
?> 
    <tr>
      <td><?php echo $i + 1 . '.'; ?></td>
      <td><?php echo $data[$i]['ISBN']; ?></td>
      <td><?php echo $data[$i]['judul']; ?></td>
      <td><?php echo $data[$i]['pengarang']; ?></td>
      <td>
        <a href='/buku/edit/<?php echo $data[$i]['ISBN']; ?>' ><i class='fa fa-edit'></i></a>
      </td>
      <td>
        <a href='/buku/hapus/<?php echo $data[$i]['ISBN']; ?>' ><i class='fa fa-trash-o'></i></a>
      </td>
    </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
