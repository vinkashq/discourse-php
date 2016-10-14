<?php

namespace Vinkas\Discourse\PHP\API;

class Post
{

  protected $client;
  protected $id;

  function __construct(Client $client, $id) {
    $this->client = $client;
    $this->id = $id;
  }

  public function wikify() {
    $params = ['wiki' => true ];
    return $this->client->putRequest('/posts/' . $this->id . '/wiki', $params);
  }

  public function edit($raw) {
    $params = ['raw' => $raw ];
    return $this->client->putRequest('/posts/' . $this->id, $params);
  }

}
