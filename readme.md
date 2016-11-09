# Attlassian Confluence PHP Client

## Installation

```json
"require": {
    "outdare/confluence-api":"dev-confluence-v1@dev"
},
```

## Examples

### Creating Space
```php
<?php
$client = new \Outdare\Confluence\Client([
  'hostname' => 'etdare.atlassian.net',
  'user' => '<user>',
  'pass' => '<pass>'
]);

$space = new \Outdare\Confluence\Space($client);
$space->create("SPACEKEY", "My new space","global", "It's my new space from API");
```

### Creating Page
```php
<?php
$page = new \Outdare\Confluence\Page($client);
$page->create("SPACEKEY", "My new page", "<p>Content for my page</p>");
```

## Contributions

Feel free to contribute with ideas and completing the todo.md file
