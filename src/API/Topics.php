<?php

namespace Vinkas\Discourse\PHP\API;

class Topics
{

  protected $client;

  function __construct(Client $client) {
    $this->client = $client;
  }

  public function latest() {
    return $this->client->request('/latest.json');
  }

  public function top() {
    return $this->client->request('/top.json');
  }

  public function create($title, $raw, $category) {
    $params = ['title' => $title, 'raw' => $raw, 'category' => $category];
    return $this->client->request('/posts', $params, 'POST');
  }

}
