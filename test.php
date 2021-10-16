<?php

use Google\Service\AnalyticsReporting\EcommerceData;
use League\OAuth2\Client\Provider\Google;
use Firebase\JWT\JWT;

require_once __DIR__.'/vendor/autoload.php';

session_start();

$client=new Google_Client();
$client->setAuthConfig("client_secrets.json");
$client->addScope("https://www.googleapis.com/auth/userinfo.profile");

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
    $client->setAccessToken($_SESSION['access_token']);
}else{
    $redirect_uri='http://'.$_SERVER['HTTP_HOST'].'/ProiectLicenta/login.php';
    header('Location: '.filter_var($redirect_uri,FILTER_SANITIZE_URL));
}

$jwt=explode('.',$data)

//header("Location: https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=".$_SESSION['access_token']);

?>