<?php

namespace Vendor;

use \Core\Config;

class ConnectDb
{
    public $conn;

    public function open_connect()
    {
        //TO-DO Create Open Connection to MySQL
        $conn = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function connect_db()
    {
        //TO-DO Create Open Connection to MySQL Specific DB
        $conn = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_NAME);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}