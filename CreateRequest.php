<?php
require_once (__DIR__ . "/Autoload.php");

use Core\Withdraw;
use Vendor\FlipSlightly;

$a = new Withdraw();
$a->execute();
