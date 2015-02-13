<?php

class database {

  private $dsn      = 'mysql:host=localhost;dbname=proyekta';
  private $user     = 'root';
  private $password = 'sqlpwd';

  public $connection;

  public function __construct(PDO $connection = null) {
    $this->connection = $connection;

    if ($this->connection === null) {
      try {
        $this->connection = new PDO(
          $this->dsn,
          $this->user, 
          $this->password
        );

        $this->connection->setAttribute(
          PDO::ATTR_ERRMODE, 
          PDO::ERRMODE_EXCEPTION
        );
      }
      
      catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }
}

?>
