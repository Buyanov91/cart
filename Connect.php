<?php

class Connect extends PDO
{
    private $host = 'localhost';
    private $db = 'cart';
    private $user = 'root';
    private $pass = '11111111';
    private $charset = 'utf8';

    public function __construct()
    {
            parent::__construct("mysql:host=$this->host;dbname=$this->db;charset=$this->charset",
                $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
