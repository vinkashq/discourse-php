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

### [SSO](https://codiss.com/t/discourse-sso-client-documentation-for-php/15)
