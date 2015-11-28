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

$url = 'https://api.cdiscount.com/OpenApi/json/Search';

function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

$optional_headers = array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string));
$reponse = do_post_request($url, json_encode($fields), $optional_headers);

var_dump($optional_headers);