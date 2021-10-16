<?php

require __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;

session_start(); // Remove if session.auto_start=1 in php.ini

//configuration
$client=new Google_Client();
$client->setAuthConfig("client_secrets.json");
$client->addScope("https://www.googleapis.com/auth/userinfo.profile");
$client->setRedirectUri('http://'.$_SERVER['HTTP_HOST'].'/ProiectLicenta/login.php');
//$client->setAccessType("offline");
//$client->setState(random_bytes(128/8));
//$client->setIncludeGrantedScopes(true);
//$client->setLoginHint("@tuiasi.ro");
//$client->setPrompt("consent");

//redirecting to google oauth server -> authentification
if(!isset($_GET['code'])){
    $auth_url=$client->createAuthUrl();
    header("Location: ".filter_var($auth_url, FILTER_SANITIZE_URL));
}else{
    //$client->authenticate($_GET['code']);
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$client->getAccessToken();
    $redirect_uri='http://'.$_SERVER['HTTP_HOST'].'/ProiectLicenta/test.php';
    header("Location: ".filter_var($redirect_uri,FILTER_SANITIZE_URL));
}

?>












