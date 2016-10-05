<?php

namespace Vinkas\Discourse\PHP\API;

class Topics
{

  protected $client;

  function __construct(Client $client) {
    $this->client = $client;
  }

  public function create($name, $email, $password, $username, $active = true, $staged = false) {
    $params = ['name' => $name, 'email' => $email, 'password' => $password, 'username' => $username, 'active' => $active, 'staged' => $staged];
    return $this->client->request('/users', $params, 'POST');
  }

  public function list($type) {
    return $this->client->request('/admin/users/list/' . $type . '.json');
  }

}
