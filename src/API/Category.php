<?php

namespace Vinkas\Discourse\PHP\API;

class Category
{

  protected $client;

  function __construct(Client $client, $id) {
    $this->client = $client;
    $this->id = $id;
  }

}
