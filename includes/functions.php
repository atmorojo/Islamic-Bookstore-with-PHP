<?php

function isAdmin() {
  if (isset($_SESSION['akses'])) {
    if ($_SESSION['akses'] == 0) {
      return true;
    }

    else {
      return false;
    }
  }

}

function setArray(&$array, $value) {
  $array = array_fill_keys(array_keys($array), $value);
}

function limitOutput($string) {
  $string = strip_tags($string);

  if (strlen($string) > 300) {

    // truncate string
    $stringCut = substr($string, 0, 300);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...'; 
  }
  return $string;
}

function totalItem() {
  $_SESSION['totaljumlah'] = 0;

  foreach($_SESSION['cart'] as $array) {
    $_SESSION['totaljumlah'] += $array['jumlah'];
  }
}

function grandTotal() {
  $_SESSION['grandtotal'] = 0;

  foreach($_SESSION['cart'] as $array) {
    $subtotal = $array['jumlah'] * $array['harga'];
    $_SESSION['grandtotal'] += $subtotal;
  }
}

function uploadCover() {
  $sumber = $_FILES['sampul']['tmp_name'];
  $tujuan =  __SITE_PATH . '/img/cover/' . $_POST['ISBN'].'.jpg';

  if(file_exists($tujuan)) {
    unlink($tujuan);
  }

  if (move_uploaded_file($sumber, $tujuan)) {
    return true;
  }

  else {
    return false;
  }
}

?>
