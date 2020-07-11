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

    public function saveRequest($data_db, $data_flip)
    {
        // TO-DO Save Response after Withdraw Processed
        $saveDataRequest = "UPDATE flip_withdraw 
            SET request_id = ".$data_flip->id.", status = 'PENDING', fee = ".$data_flip->fee."
            WHERE id = ".$data_db['id'];

        $updateData = mysqli_query($this->con_node, $saveDataRequest);

        return $updateData;
    }

    public function updateRequest()
    {
        // TO-DO Update Status Response after Withdraw Processed
    }
}