<?php

namespace Vinkas\Discourse\PHP;

use Vinkas\Discourse\PHP\SSO\Client as SSOClient;
use Vinkas\Discourse\PHP\API\Client as APIClient;

class Client
{

  public function __construct($domain, $ssl) {
    $this->setUrl($domain, $ssl);
  }

  protected $url;

  public function getUrl() {
    return $this->url;
  }

  protected function setUrl($domain, $ssl) {
    $protocol = $ssl ? 'https' : 'http';
    $this->url = sprintf('%s://%s', $protocol, $domain);
  }

  public function sso($secret, $payload, $signature) {
    return new SSOClient($this, $secret, $payload, $signature);
  }

  public function api($key, $username = 'system') {
    return new APIClient($this, $key, $username);
  }

}
