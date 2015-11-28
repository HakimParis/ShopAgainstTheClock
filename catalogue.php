<?php


$search_request = new stdClass();
$search_request->Keyword = 'Ps3';
$search_request->SortBy = 'minprice';
$search_request->Pagination = new stdClass();
$search_request->Pagination->ItemsPerPage = 10;
$search_request->Pagination->PageNumber = 0;
$search_request->Filters = new stdClass();
$search_request->Filters->Price = new stdClass();
$search_request->Filters->Price->min = 0;
$search_request->Filters->Price->max = 0;
$search_request->Filters->Navigation = 'all';
$search_request->Filters->IncludeMarketPlace = true;
$search_request->Filters->Brands = ['sony'];
$search_request->Filters->Condition = true;

$fields = array(
	'ApiKey' => '75243e65-dfd6-4058-91b0-9e2a89573eb8',
	'SearchRequest' => $search_request
);

                                                                   
$data_string = json_encode($fields);
echo '<pre>';
var_dump($data_string);
$url = 'https://api.cdiscount.com/OpenApi/json/Search';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST      ,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
$rep = curl_getinfo ($ch);

echo '<pre>';

var_dump(json_decode($result));
