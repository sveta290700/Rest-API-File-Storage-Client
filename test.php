<?php

use MyApp\Client\ApiClient;

require_once 'vendor/autoload.php';

$client = new ApiClient('http://178.62.205.95');
$res = $client->upload('testfile.txt');
//var_dump($res);
$res2 = $client->getAll();
//var_dump($res2);
$res3 = $client->download('testfile.txt');
//var_dump($res3);
$res4 = $client->deleteFile('testfile.txt');
//var_dump($res4);