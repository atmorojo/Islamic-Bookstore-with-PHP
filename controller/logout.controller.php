<?php

class logoutController extends controller {

  public function index() {
    session_destroy();

    header("Location: /");
  }
}

?>
