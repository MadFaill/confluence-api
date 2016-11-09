<?php namespace Outdare\Confluence;
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
    $uri = "https://".$this->host."".$path;

    $response = \Httpful\Request::get($uri)
    ->authenticateWith($this->user, $this->pass)
    ->addHeader('User-Agent','Outdare Integration')
    ->expectsJson()
    ->send();

    return $response;
  }

  public function callPost($path,$jsonString)
  {
    $uri = "https://".$this->host."".$path;
    Log::info("calling ".$uri." authed with ".$this->user." and ".$this->pass);
    Log::info($jsonString);
    $response = \Httpful\Request::post($uri)
    ->authenticateWith($this->user, $this->pass)
    ->sendsJson()
    ->addHeader('User-Agent','Outdare Integration')
    ->expectsJson()
    ->body($jsonString)
    ->send();

    return $response;
  }

  public function callPut($path,$jsonString)
  {
    $uri = "https://".$this->host."".$path;

    $response = \Httpful\Request::put($uri)
    ->sendsJson()
    ->authenticateWith($this->user, $this->pass)
    ->addHeader('User-Agent','Outdare Integration')
    ->expectsJson()
    ->body($jsonString)
    ->send();

    return $response;
  }

  public function callDelete($path)
  {
    $uri = "https://".$this->host."".$path;

    $response = \Httpful\Request::delete($uri)
    ->authenticateWith($this->user, $this->pass)
    ->addHeader('User-Agent','Outdare Integration')
    ->send();

    return $response;
  }

}
