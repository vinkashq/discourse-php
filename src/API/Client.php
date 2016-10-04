<?php

namespace Vinkas\Discourse\PHP\API;

class Client
{

  protected $http;

  public function __construct($domain, $ssl, $api_key, $api_username = 'system') {
    $this->setUrl($domain, $ssl);
    $this->http = new \GuzzleHttp\Client(['base_uri' => $this->getUrl()]);
    $this->setQueryParams($api_key, $api_username);
  }

  private $url;

  public function getUrl() {
    return $this->url;
  }

  protected function setUrl($domain, $ssl) {
    $protocol = $ssl ? 'https' : 'http';
    $this->url = sprintf('%s://%s', $protocol, $domain);
  }

  protected $queryParams;

  protected function getQueryParams() {
    return $this->queryParams;
  }

  protected function setQueryParams($api_key, $api_username) {
    $this->queryParams = array();
    $this->queryParams['api_key'] = $api_key;
    $this->queryParams['api_username'] = $api_username;
  }

  public function setUsername($api_username) {
    $this->queryParams['api_username'] = $api_username;
  }

  public function request($path, $queryParams = null, $method = "GET") {
    if ($queryParams == null) {
      $queryParams = array();
    }
    $queryParams = array_merge($this->getQueryParams(), $queryParams);
    $params = ['query' => $queryParams];
    $res = $this->http->request($method, $path, $params);
    if ($res->getStatusCode() == 200) {
      $body = $res->getBody();
      $json = json_decode($body);
      return $json;
    }
    return null;
  }

  private $topics;

  public function topics() {
    if($this->topics == null) {
      $this->topics = new Topics($this);
    }
    return $this->topics;
  }

}
