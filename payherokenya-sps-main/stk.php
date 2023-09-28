<?php 
include 'global.php';

//prepare an array that will contain your account details and payment details.
$data=array(
        'api_key' =>"",//provide api keyhere
        'username'=>"",//provide username here
        'amount'=>"",//provide amount here
        'phone'=>"",//provide phone number here
        'user_reference'=>""//provide user reference here
    );
  
$jdata=json_encode($data);
$response=sendRequest("https://payherokenya.com/sps/portal/app/stk",$jdata);
print_r($response);
//Thats it hit send and we will take care of the rest
