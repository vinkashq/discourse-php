<?php

namespace Vinkas\Discourse;

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

  public function connect($secret, $payload = null, $signature = null) {
    return new Connect($this, $secret, $payload, $signature);
  }

}
