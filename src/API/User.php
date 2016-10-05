<?php

namespace Vinkas\Discourse\PHP\API;

class User
{

  protected $client;
  protected $username;

  function __construct(Client $client, $username) {
    $this->client = $client;
    $this->username = $username;
  }

  public function info() {
    return $this->client->request('/users/' . $this->username . '.json', $params, 'GET');
  }

  public function updateUsername($new_username) {
    $params = ['new_username' => $new_username ];
    return $this->client->request('/users/' . $this->username . '/preferences/username', $params, 'PUT');
  }

  public function updateEmail($email) {
    $params = ['email' => $email ];
    return $this->client->request('/users/' . $this->username . '/preferences/email', $params, 'PUT');
  }

}
