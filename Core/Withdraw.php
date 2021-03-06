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
        $dataRequest = $this->withdraw->getRequest("REQUEST");

        foreach($dataRequest as $data)
        {
            $response_create = $this->flip->createTransaction($data);
            $dt_create_transaction = json_decode($response_create);

            echo "Process create transaction to API \n";
            echo "Data from database\n :";
            print_r($data);
            echo "Response from API \n";
            print_r($dt_create_transaction);
            echo "\n=================\n";

            if(isset($dt_create_transaction->id)) {
                $this->withdraw->saveRequest($data, $dt_create_transaction);
            }
        }
    }
    
    public function update()
    {
        //TO-DO Process....
        $dataRequest = $this->withdraw->getRequest("PENDING");

        foreach($dataRequest as $data)
        {
            $response_transaction = $this->flip->getTransaction($data);
            $dt_update_transaction = json_decode($response_transaction);

            echo "Process create transaction to API \n";
            echo "Data from database\n :";
            print_r($data);
            echo "Response from API \n";
            print_r($dt_update_transaction);
            echo "\n=================\n";
            
            if(isset($dt_update_transaction->status) && ($dt_update_transaction->status == 'SUCCESS')) {
                $this->withdraw->updateRequest($dt_update_transaction);
            }
        }
    }
}