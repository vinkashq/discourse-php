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
    return $this->client->putRequest('/t/' . $this->id, $params);
  }

  public function clearTags() {
    $params = ['topic_id' => $this->id, 'tags_empty_array' => true ];
    return $this->client->putRequest('/t/' . $this->id, $params);
  }

  public function updateTitle($title) {
    $params = ['topic_id' => $this->id, 'title' => $title ];
    return $this->client->putRequest('/t/' . $this->id, $params);
  }

  public function updateCategory($category_id) {
    $params = ['topic_id' => $this->id, 'category_id' => $category_id ];
    return $this->client->putRequest('/t/' . $this->id, $params);
  }

  public function posts() {
    return $this->client->getRequest('/t/' . $this->id . '/posts.json');
  }

  public function createPost($raw) {
    return $this->client->posts()->create($this->id, $raw);
  }

}
