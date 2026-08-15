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

## Create a Chunk

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

## Create a User

You can create a user with extended fields, group membership, a generated password, and email notification in one call:

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

Exact keys depend on the processor. Check the processor class under `core/src/Revolution/Processors/` (3.x) or the matching 2.x path when a field fails validation.

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

See the [Processors overview](extending-modx/processors) for login, Resource create, nesting core processors, and writing your own classes.
