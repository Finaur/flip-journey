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
            $this->flip->createTransaction($data);
        }
    }
}