<?php namespace Outdare\Confluence;

class Space {

  private $client = null;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function create($key,$name,$type,$description)
  {
    $params = [
      'key' => $key,
      'name' => $name,
      // 'type' => $type,
      'description' => [
        'plain' => [
          'value' => $description,
          'representation' => 'plain'
        ]
      ]
    ];
    $jsonString = json_encode($params);
    $response = $this->client->callPost('/wiki/rest/api/space',$jsonString);
    return $response;
  }

  public function all()
  {
    $uri = '/wiki/rest/api/space';
    $response = $this->client->callGet($uri);
    return $response;
  }

  public function pages($spaceKey)
  {
    $uri = '/wiki/rest/api/content?type=page&spaceKey='.$spaceKey;
    $response = $this->client->callGet($uri);
    return $response;
  }

  public function pagesWithItems($spaceKey,$items)
  {
    $uri = '/wiki/rest/api/content?type=page&spaceKey='.$spaceKey."&expand=".$items;
    $response = $this->client->callGet($uri);
    return $response;
  }

}
