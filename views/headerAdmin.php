<?php
if (!isAdmin()) {
  header("Location: /");
  exit();
}
?>

<div class='main'>
  <div class='logo-admin'>
    <div class='logotype'> <a href='#'>Control Panel Admin</a> </div>
  </div>
<div class='outer'>
  <nav class='panel-admin'>
    <ul>
      <li> <a href='/user/'>User</a> </li>
      <li> <a href='/buku/'>Buku</a> </li>
      <li> <a href='/transaksi/'>Transaksi</a> </li>
      <li> <a href='/logout/'>Log Out</a> </li>
    </ul>
  </nav>
  <section class='main-admin'>
