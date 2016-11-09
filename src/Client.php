<?php namespace Outdare\Confluence

use Log;

class Client {

  private $host = null;

  private $user = null;
  private $pass = null;

  public function __construct($params)
  {
    $this->host = $params['hostname'];
    $this->user = $params['user'];
    $this->pass = $params['pass'];
  }

  public function callGet($path)
  {
    $uri = "https://".$host."".$path;

    $response = \Httpful\Request::get($uri)
    ->authenticateWith($user, $pass)
    ->send();

    Log::info($response);
  }



}
