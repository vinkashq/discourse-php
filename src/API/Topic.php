<?php

namespace Vinkas\Discourse\PHP\API;

class Topic
{

  protected $client;
  protected $id;

  function __construct(Client $client, $id) {
    $this->client = $client;
    $this->id = $id;
  }

  public function tag(array $tags) {
    $params = ['topic_id' => $this->id, 'tags' => $tags ];
    return $client->request('/t/' . $this->id, $params, 'PUT');
  }

  public function clearTags() {
    $params = ['topic_id' => $this->id, 'tags_empty_array' => true ];
    return $client->request('/t/' . $this->id, $params, 'PUT');
  }

}
