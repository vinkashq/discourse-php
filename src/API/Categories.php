<?php

namespace Vinkas\Discourse\PHP\API;

class Categories
{

  protected $client;

  function __construct(Client $client) {
    $this->client = $client;
  }

  public function all() {
    return $this->client->getRequest('/categories.json');
  }

  public function create($name, $color, $text_color) {
    $params = ['name' => $name, 'color' => $color, 'text_color' => $text_color];
    return $this->client->postRequest('/categories', $params);
  }

}
