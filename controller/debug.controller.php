<?php

class debugController extends controller {
  public function index() {
    echo "SESSION : ";
    print_r($_SESSION);
    echo "<br /> <br />POST : ";
    print_r($_POST);
    echo "<br /> <br />FILE : ";
    print_r($_FILES);
  }
}
?>
