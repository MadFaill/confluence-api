## API calls

1. [ ] All Pages from Space with limit
2. [ ] The next page of results for Space
3. [ ] Find blog posts
4. [x] Browse Content
5. [ ] Read content, and expand the body
6. [x] Find a page by title and space keywords
7. [x] Create new page
8. [x] Create a new page as a child of another page
9. [x] Update a page
10. [x] Delete a page
11. [ ] Upload an attachment
12. [x] Create a Space
13. [ ] Convert storage format to view format
14. [ ] Convert wiki markup to storage format
15. [ ] Convert storage format to view format using a particular page for the conversion context

## Library

1. [ ] Error handling for client configuration
2. [ ] Error handling for auth

```shell
curl -u admin:Coentros1 -X POST -H 'Content-Type: application/json' -d'{"key":"TEST-BOT","name":"Space Test for bot","description":{"plain":{"value":"New space test created by outdare bot","representation":"plain"}}}' https://etdare.atlassian.net/wiki/rest/api/space
```

```shell
curl -u admin:Coentros1 -X POST -H 'Content-Type: application/json' -d'{"type":"page","title":"Pagina de teste [OUTDAREBOT]","space":{"key":"DEVOPS"},"body":{"storage":{"value":"<p>Pagina automaticamente criada pelo bot outdare<\/p>","represenation":"storage"}}}' https://etdare.atlassian.net/wiki/rest/api/content/
```
