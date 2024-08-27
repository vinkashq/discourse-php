# discourse-php

Lets you use Discourse as the forum or community engine for a PHP website using API and SSO.

## Installation

The package is registered at Packagist as [vinkas/discourse-php](https://packagist.org/packages/vinkas/discourse-php) and can be installed using composer:

```
composer require vinkas/discourse-php
```

## Documentation

### Creating discourse client

```php
$discourse = new Vinkas\Discourse\PHP\Client('discourse.example.com', true);  // set true if ssl enabled
```

### [API](https://codiss.com/t/discourse-api-documentation-for-php/14)

```
$api = $discourse->api('API_KEY', 'API_USERNAME');
$api->topics()->create('TITLE', 'CONTENT', 'CATEGORY_SLUG')
```

### [SSO](https://codiss.com/t/discourse-sso-client-documentation-for-php/15)

```
$payload = $_GET['sso'];
$signature = $_GET['sig'];

$sso = $discourse->sso('SECRET', $payload, $signature);

if (!($sso->isValid())) {
    header("HTTP/1.1 403 Forbidden");
    echo("Bad SSO request");
    die();
}

$userParams = array(
    'external_id' => 'USER_ID',
    'email'     => 'EMAIL_ADDRESS',
    'username' => 'USERNAME',  // optional
    'name'     => 'FULL_NAME'  // optional
    // for more available fields https://meta.discourse.org/t/official-single-sign-on-for-discourse/13045
);

$url = $sso->getResponseUrl($userParams)
header('Location: ' . $url);
exit(0);
```
