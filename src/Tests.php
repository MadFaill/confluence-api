<?php namespace Outdare\Confluence

class Tests {
  public function callClient()
  {
    $client = new Client([
      'hostname' => 'etdare.atlassian.net',
      'user' => 'admin',
      'pass' => 'Coentros1'
    ]);

    $path = '/wiki/rest/api/content?type=page&spaceKey=codedocs';

    $client->callGet($path);    
  }
}
