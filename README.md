# discourse-php

Lets you use Discourse as the forum or community engine for a PHP website using API and SSO.

## Installation

The package is registered at Packagist as [vinkas/discourse-php](https://packagist.org/packages/vinkas/discourse-php) and can be installed using composer:

```
composer require vinkas/discourse-php
```

## Documentation
---

### Basic Usage

```php
$discourse = new Vinkas\Discourse\PHP\Client('discourse.example.com', true);  // set true if ssl enabled
```

### [API](https://codiss.com/t/discourse-api-documentation-for-php/14)

### SSO

```php
$sso = $discourse->sso('SECRET');

if ($sso->isValid()) {
  $userParams = array(
      'external_id' => 'USER_ID',
      'email'     => 'EMAIL_ADDRESS',
      'username' => 'USERNAME',  // optional
      'name'     => 'FULL_NAME'  // optional
      // for more available fields https://meta.discourse.org/t/official-single-sign-on-for-discourse/13045
  );

  header('Location: ' . $sso->getResponseUrl($userParams));
}
```
