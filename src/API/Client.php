<?php

namespace Vinkas\Discourse\PHP\API;

use Vinkas\Discourse\PHP\Client as Discourse;

class Client
{

  protected $http;
  protected $discourse;

  public function __construct(Discourse $discourse, $api_key, $api_username = 'system') {
    $this->discourse = $discourse;
    $this->http = new \GuzzleHttp\Client(['base_uri' => $this->discourse->getUrl()]);
    $this->setQueryParams($api_key, $api_username);
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

  public function topic($id) {
    $topic = new Topic($this, $id);
    return $topic;
  }

  private $categories;

  public function categories() {
    if($this->categories == null) {
      $this->categories = new Categories($this);
    }
    return $this->categories;
  }

  private $posts;

  public function posts() {
    if($this->posts == null) {
      $this->posts = new Posts($this);
    }
    return $this->posts;
  }

}
