<?php

namespace Model;

use Core\Config;
use Vendor\ConnectDb;

class Withdraws
{
    protected $connect;
    protected $con_node;

    public function __construct()
    {
        $this->connect  = new ConnectDb();
        $this->con_node = $this->connect->connect_db();
    }

    public function getRequest()
    {
        // TO-DO Get Request Withdraw
        $getDataRequest = "SELECT * FROM flip_withdraw WHERE status = 'REQUEST'";
        $getData        = mysqli_query($this->con_node, $getDataRequest);

        return mysqli_fetch_all($getData, MYSQLI_ASSOC);
    }

    public function saveRequest()
    {
        // TO-DO Save Response after Withdraw Processed
    }

    public function updateRequest()
    {
        // TO-DO Update Status Response after Withdraw Processed
    }
}