<?php

require __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;

session_start(); // Remove if session.auto_start=1 in php.ini

if(!$oauth_credentials=getOauth)

$client=new Google_Client();
$client->setAuthConfig("client_secrets.json");
$client->addScope("https://www.googleapis.com/auth/cloud-platform");

?>












