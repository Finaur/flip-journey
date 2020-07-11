<?php
namespace Vendor;

use \Core\Config;

class FlipSlightly
{

    public function createTransaction($data)
    {
        //TO-DO Hits API Slightly Flip - Create Transaction
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::URL_FLIP,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_VERBOSE => false,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "bank_code=".$data['bank_code']."&account_number=".$data['account_number'].
                "&amount=".$data['amount']."&remark=".$data['remark'],
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Basic ".Config::SECRET_KEY_FLIP
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}