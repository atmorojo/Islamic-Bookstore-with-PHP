<h1><?php echo $head; ?></h1>

<?php

$_SESSION['username'] = "test";
$_SESSION['tujuan'] = "test";
print_r($_SESSION);
$tes = new transaksi;
$tes->addDetail();
$tes->simpan();

?>
