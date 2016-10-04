<?php

namespace Vinkas\Discourse\PHP\API;

class Categories
{

  protected $client;

  function __construct(Client $client) {
    $this->client = $client;
  }

  public function list() {
    return $client->request('/categories.json');
  }

  public function create($name, $color, $text_color) {
    $params = ['name' => $name, 'color' => $color, 'text_color' => $text_color];
    return $client->request('/categories', $params, 'POST');
  }

}
