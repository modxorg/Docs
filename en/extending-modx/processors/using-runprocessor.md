---
title: "Using runProcessor"
_old_id: "493"
_old_uri: "2.x/developing-in-modx/advanced-development/using-runprocessor"
---

## Using runProcessor

[`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor) runs a processor from any PHP context that has a `$modx` instance: a [Snippet](extending-modx/snippets), [Plugin](extending-modx/plugins), custom script, or another processor.

```php
$response = $modx->runProcessor($action, $scriptProperties, $options);
```

| Argument | Role |
| -------- | ---- |
| `$action` | Processor to run. In 3.x: full class name, `Resource\Create`, or legacy path `resource/create`. |
| `$scriptProperties` | Data the processor reads via `getProperty()` / `getProperties()`. |
| `$options` | Optional. Main key: `processors_path` for extras outside the core tree. |

Returns a `ProcessorResponse` (3.x) / `modProcessorResponse` (2.x). Use `isError()`, `getMessage()`, and `getObject()` (array of returned fields).

For how MODX resolves `$action` to a class or file in 3.x, read [Processor loading logic](extending-modx/modx-class/reference/modx.runprocessor#processor-loading-logic).

`runProcessor` exists since Revolution 2.0.8. Older installs used the deprecated [`executeProcessor`](extending-modx/modx-class/reference/modx.executeprocessor).

Exact property names differ per processor. When validation fails, open the class under `core/src/Revolution/Processors/` (3.x) or check the [Core processor list](extending-modx/processors/list).

## Handle the response

```php
$response = $modx->runProcessor('resource/get', ['id' => 10]);
if ($response->isError()) {
    if ($response->hasFieldErrors()) {
        foreach ($response->getFieldErrors() as $error) {
            // $error->getField(), $error->getMessage()
            $modx->log(modX::LOG_LEVEL_ERROR, $error->getField() . ': ' . $error->getMessage());
        }
    }
    return $response->getMessage();
}
$resource = $response->getObject();
```

`$response->getResponse()` returns the full array (`success`, `message`, `object`, `total`, ...).

## Resources

### Create

```php
$response = $modx->runProcessor('resource/create', [
    'pagetitle' => 'News item',
    'alias' => 'news-item',
    'content' => '<p>Body</p>',
    'parent' => 5,
    'template' => 2,
    'context_key' => 'web',
    'published' => 1,
    'class_key' => 'modDocument',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$id = (int)$response->getObject()['id'];
```

### Update

```php
$response = $modx->runProcessor('resource/update', [
    'id' => $id,
    'pagetitle' => 'News item (edited)',
    'content' => '<p>Updated body</p>',
    'published' => 1,
]);
if ($response->isError()) {
    return $response->getMessage();
}
```

### Get one / list

```php
$response = $modx->runProcessor('resource/get', ['id' => $id]);
if (!$response->isError()) {
    $row = $response->getObject();
}

$response = $modx->runProcessor('resource/getlist', [
    'parent' => 5,
    'start' => 0,
    'limit' => 20,
    'sort' => 'menuindex',
    'dir' => 'ASC',
]);
if (!$response->isError()) {
    $payload = $response->getResponse();
    // typically: success, total, results
}
```

### Publish, unpublish, delete, undelete, duplicate

```php
$modx->runProcessor('resource/publish', ['id' => $id]);
$modx->runProcessor('resource/unpublish', ['id' => $id]);
$modx->runProcessor('resource/delete', ['id' => $id]);      // soft-delete to recycle bin
$modx->runProcessor('resource/undelete', ['id' => $id]);

$response = $modx->runProcessor('resource/duplicate', [
    'id' => $id,
    'name' => 'News item copy',
]);
```

Always check `isError()` in real code. These one-liners omit it for brevity.

## Elements

### Chunk

```php
$response = $modx->runProcessor('element/chunk/create', [
    'name' => 'NewChunk',
    'description' => 'A test Chunk made with runProcessor.',
    'snippet' => '<h3>Chunkify!</h3>',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$chunk = $response->getObject();
return 'Created Chunk "' . $chunk['name'] . '" with ID ' . $chunk['id'];
```

### Snippet

```php
$response = $modx->runProcessor('element/snippet/create', [
    'name' => 'HelloUser',
    'description' => 'Returns the username',
    'snippet' => 'return $modx->user->get("username");',
]);
```

### Template Variable

```php
$response = $modx->runProcessor('element/templatevar/create', [
    'name' => 'articleImage',
    'caption' => 'Article image',
    'type' => 'image',
    'category' => 0,
]);
```

In 3.x you can also call `\MODX\Revolution\Processors\Element\TemplateVar\Create::class` as `$action`.

## Users and auth

### Login / logout

```php
$response = $modx->runProcessor('security/login', [
    'username' => $username,
    'password' => $password,
    'rememberme' => 1,
    'login_context' => 'web',
]);
if ($response->isError()) {
    return $response->getMessage();
}

$response = $modx->runProcessor('security/logout');
```

### Create a user

```php
$groups = [
    'Group1' => [
        'usergroup' => '7', // user group ID
        'role' => '1',      // role ID
    ],
    'Group2' => [
        'usergroup' => '8',
        'role' => '1',
    ],
];
$fields = [
    'active' => true,
    'passwordgenmethod' => 'g',
    'passwordnotifymethod' => 'e',
    'email' => $email,
    'username' => $username,
    'fullname' => $fullname,
    'extended' => [
        'container' => [
            'name' => $value,
        ],
    ],
    'groups' => $groups,
];
$response = $modx->runProcessor('security/user/create', $fields);
if ($response->isError()) {
    return $response->getMessage();
}
```

### Change password

```php
$response = $modx->runProcessor('security/profile/changepassword', [
    'password_old' => $oldPassword,
    'password_new' => $newPassword,
    'password_confirm' => $newPassword,
]);
```

Property names can vary by MODX version. Confirm them in the processor class if the call fails.

## System

### Clear cache

```php
$response = $modx->runProcessor('system/clearcache');
if ($response->isError()) {
    return $response->getMessage();
}
```

### Create a system setting

```php
$response = $modx->runProcessor('system/settings/create', [
    'key' => 'myextra.some_flag',
    'value' => '1',
    'xtype' => 'combo-boolean',
    'namespace' => 'myextra',
    'area' => 'myextra',
]);
```

## Files (media browser)

Upload and filesystem processors expect media-source paths and manager permissions. Typical actions: `browser/file/upload`, `browser/file/remove`, `browser/directory/create`. Pass the same fields the manager file tree sends (source, path, file). From a web Snippet you rarely call these unless the user is authenticated for `mgr` (or you opened that context on purpose).

```php
// Example shape only: required keys depend on source and request
$response = $modx->runProcessor('browser/directory/create', [
    'name' => 'exports',
    'parent' => '/',
    'source' => 1,
]);
```

## 3.x class name as action

```php
use MODX\Revolution\Processors\Resource\Create;

$response = $modx->runProcessor(Create::class, [
    'pagetitle' => 'Via FQCN',
    'context_key' => 'web',
]);
```

## Nest core processors inside your own

```php
$response = $modx->runProcessor('resource/create', $resourceData);
if ($response->isError()) {
    return $this->failure($response->getMessage());
}
$id = (int)$response->getObject()['id'];

$tvResponse = $modx->runProcessor('resource/update', [
    'id' => $id,
    'pagetitle' => $resourceData['pagetitle'],
    // include TV values the update processor expects for your setup
]);
```

Plugins on Resource save still run for each successful core call.

## Custom processor path

```php
$response = $modx->runProcessor(
    'mgr/item/update',
    ['id' => 12, 'name' => 'Updated'],
    [
        'processors_path' => $modx->getOption('core_path')
            . 'components/myextra/processors/',
    ]
);
```

## Permissions from the front end

Many core processors need manager permissions. From a `web` Snippet either:

1. Run as a user who already has those policies in `web`, or
2. Initialize the manager context for trusted/internal scripts only: `$modx->initialize('mgr');`

Do not expose privileged processors on public forms without your own auth and CSRF checks.

## See also

- [Processors overview](extending-modx/processors)
- [Core processor list](extending-modx/processors/list)
- [modX.runProcessor](extending-modx/modx-class/reference/modx.runprocessor)
- [Connectors](extending-modx/processors/connectors)
