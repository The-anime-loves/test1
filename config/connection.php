<?php
//creating a class that is called connection
class Connection{
    public $dbc

    public function __construct() {
        $conn = require 'database/database.php';

        $this->dbc = new PDO("mysql:host=" . $conn["HOST"] . ";dbname=".$conn["DB"],$conn["USERNAME"],$conn["PASSWORD"]);

        $this->dbc->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
?>