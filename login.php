<?php

require __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;

session_start(); // Remove if session.auto_start=1 in php.ini

$provider = new Google([
    'clientId'     => '117975629972-8edjtponb6jiplnj8jd92bm5244q5f42.apps.googleusercontent.com',
    'clientSecret' => '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',
    'redirectUri'  => 'http://localhost/ProiectLicenta/index.html',
    'hostedDomain' => 'tuiasi.ro', // optional; used to restrict access to users on your G Suite/Google Apps for Business accounts
]);

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();

    $_SESSION['authUrl']=$authUrl;

    header('Location: ' . $authUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        printf('Hello %s!', $ownerDetails->getFirstName());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());

    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();

    // Use this to get a new access token if the old one expires
    echo $token->getRefreshToken();

    // Unix timestamp at which the access token expires
    echo $token->getExpires();
}

?>












