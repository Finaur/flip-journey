<?php
namespace Core;

use \Model\Withdraws;
class Withdraw
{
    private $withdraw;

    public function __construct()
    {
        $this->withdraw = new Withdraws();
    }

    public function execute()
    {
        //TO-DO Process....
        echo $this->withdraw->getRequest();
    }
}