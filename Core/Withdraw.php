<?php
namespace Core;

use Model\Withdraws;
use Vendor\FlipSlightly;

class Withdraw
{
    private $withdraw;
    private $flip;

    public function __construct()
    {
        $this->withdraw = new Withdraws();
        $this->flip     = new FlipSlightly();
    }

    public function execute()
    {
        //TO-DO Process....
        $dataRequest = $this->withdraw->getRequest();

        foreach($dataRequest as $data)
        {
            $response_create = $this->flip->createTransaction($data);
            $dt_create_transaction = json_decode($response_create);

            if(isset($dt_create_transaction->id)) {
                $this->withdraw->saveRequest($data, $dt_create_transaction);
            }
        }
    }
}