<?php namespace Outdare\Confluence;

class Page {

  private $client = null;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function create($spaceKey,$title,$content)
  {
    $params = [
      'type' => 'page',
      'title' => $title,
      'space' => [
        'key' => $spaceKey
      ],
      'body' => [
        'storage' => [
          'value' => $content,
          'representation' => 'storage'
        ]
      ]
    ];
    $jsonString = json_encode($params);
    $response = $this->client->callPost('/wiki/rest/api/content/',$jsonString);
    return $response;
  }

  public function createChild($spaceKey,$parentPageId,$title,$content)
  {
    $params = [
      'type' => 'page',
      'title' => $title,
      'ancestors' => [
        [
          'id' => $parentPageId
        ]
      ],
      'space' => [
        'key' => $spaceKey
      ],
      'body' => [
        'storage' => [
          'value' => $content,
          'representation' => 'storage'
        ]
      ]
    ];
    $jsonString = json_encode($params);
    $response = $this->client->callPost('/wiki/rest/api/content/',$jsonString);
    return $response;
  }

  public function update($pageId, $spaceKey, $title, $content, $version)
  {
    $uri = "/wiki/rest/api/content/".$pageId;
    $params = [
      'id' => $pageId,
      'type' => 'page',
      'title' => $title,
      'space' => [
        'key' => $spaceKey
      ],
      'body' => [
        'storage' => [
          'value' => $content,
          'representation' => 'storage'
        ]
      ],
      'version' => [
        'number' => $version
      ]
    ];
    $jsonString = json_encode($params);
    $response = $this->client->callPut($uri,$jsonString);
    return $response;
  }

  public function delete($pageId)
  {
    $uri = '/wiki/rest/api/content/'.$pageId;
    $response = $this->client->callDelete($uri);
    return $response;
  }

  public function search($title,$spaceKey)
  {
    $urlTitle = urlencode($title);
    $uri = '/wiki/rest/api/content?title='.$urlTitle.'&spaceKey='.$spaceKey.'&expand=history';
    $response = $this->client->callGet($uri);
    return $response;
  }

}
