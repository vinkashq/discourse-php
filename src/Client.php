<?php

namespace Vinkas\Discourse;

use Vinkas\Discourse\SSO\Helper;

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

  public function sso($secret, $payload = null, $signature = null) {
    return new Helper($this, $secret, $payload, $signature);
  }

}
