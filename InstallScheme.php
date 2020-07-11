<?php
require_once (__DIR__ . "/Autoload.php");

use Core\Config;
use Vendor\ConnectDb;

//TO-DO Create Database
$connect  = new ConnectDb();
$con_node = $connect->open_connect();

$qry_create_db = "CREATE DATABASE flip_journey";
$create_db = mysqli_query($con_node, $qry_create_db);

if ($create_db)
{
    echo "Database ".Config::DB_NAME." Created!"."\n";
}
else
{
    echo "Database ".Config::DB_NAME." Not Created!"."\n";
}

//TO-DO Create Table
$con_db = $connect->connect_db();

$qry_create_tbl = "CREATE TABLE `flip_withdraw` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`seller_name` VARCHAR(255) NOT NULL,
	`amount` INT(10) NOT NULL,
	`bank_code` VARCHAR(50) NOT NULL,
	`account_number` VARCHAR(50) NOT NULL,
	`remark` VARCHAR(100),
	`status` VARCHAR(50) NOT NULL,
	`request_id` INT(20),
	`receipt` VARCHAR(255),
	`fee` INT(10),
	`time_served` TIMESTAMP NULL DEFAULT NULL,
	`created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updated_date` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)";

$create_tbl = mysqli_query($con_db, $qry_create_tbl);
if ($create_tbl)
{
    echo "Table flip_withdraw Created!"."\n";
}
else
{
    echo "Table flip_withdraw Not Created!"."\n";
}

//TO-DO Insert Data Into Table flip_withdraw
$qry_insert_data = "INSERT INTO flip_withdraw (seller_name, amount, bank_code, account_number, 
remark, status, created_date) VALUES ('Seller Annie', 100000, 'bni', '129837719992', 'Withdraw Remark',
'REQUEST', NOW());";

$qry_insert_data .= "INSERT INTO flip_withdraw (seller_name, amount, bank_code, account_number, 
remark, status, created_date) VALUES ('Seller Bob', 200000, 'bca', '88772889199991', 'Withdraw Remark',
'REQUEST', NOW());";

$qry_insert_data .= "INSERT INTO flip_withdraw (seller_name, amount, bank_code, account_number, 
remark, status, created_date) VALUES ('Seller Gorge', 300000, 'bri', '12550991772', 'Withdraw Remark',
'REQUEST', NOW());";

$qry_insert_data .= "INSERT INTO flip_withdraw (seller_name, amount, bank_code, account_number, 
remark, status, created_date) VALUES ('Seller Stieve', 400000, 'mandiri', '5468992911028989', 'Withdraw Remark',
'REQUEST', NOW());";

if (mysqli_multi_query($con_db, $qry_insert_data)) {
    echo "New records created successfully"."\n";
} else {
    echo "Error: " . $qry_insert_data . "<br>" . mysqli_error($con_db)."\n";
}