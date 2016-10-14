<?php

namespace Vinkas\Discourse\PHP\API;

class Posts
{

  protected $client;

  function __construct(Client $client) {
    $this->client = $client;
  }

  public function create($topic_id, $raw) {
    $params = ['topic_id' => $topic_id, 'raw' => $raw ];
    return $this->client->postRequest('/posts', $params);
  }

}
