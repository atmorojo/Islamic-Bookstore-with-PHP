<?php
$username = isset($_SESSION['nama']) ? $_SESSION['nama'] : "login";
$login = isset($_SESSION['nama']) ? "/controlpanel/" : "/login/";
$totalitem = isset($_SESSION['totaljumlah']) ? $_SESSION['totaljumlah'] : 0;
$grandtotal = isset($_SESSION['grandtotal']) ? $_SESSION['grandtotal'] : 0;
?>

<nav class='navigasi'>
  <ul class='kiri'>
    <li> <a href='/'>Beranda</a></li>
    <li> <a href='#menu' class='menu-link'>Kategori</a> </li>
    <li> <a href='/about/'>About Us</a></li>
  </ul>
  <ul class='kanan'>
    <li class='log'> 
    <i class='fa fa-user'></i>
    <a href='<?php echo $login; ?>'><?php echo $username; ?></a></li>
    &middot;
    <li> <a href='/cart/'><?php echo $totalitem; ?> <i class='fa fa-shopping-cart'></i> - Rp. <?php echo number_format($grandtotal, 2, ',', '.'); ?></a></li>
  </ul>
</nav>
