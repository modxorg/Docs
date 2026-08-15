---
title: "Использование runProcessor"
translation: "extending-modx/processors/using-runprocessor"
---

## Использование runProcessor

[`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor) запускает процессор из любого PHP-контекста с экземпляром `$modx`: [сниппет](extending-modx/snippets), [плагин](extending-modx/plugins), свой скрипт или другой процессор.

```php
$response = $modx->runProcessor($action, $scriptProperties, $options);
```

| Аргумент | Назначение |
| -------- | ---------- |
| `$action` | Какой процессор вызвать. В 3.x: полное имя класса, `Resource\Create` или путь в стиле 2.x `resource/create`. |
| `$scriptProperties` | Данные, которые процессор читает через `getProperty()` / `getProperties()`. |
| `$options` | Опционально. Главный ключ: `processors_path` для процессоров вне дерева ядра. |

Возвращает `ProcessorResponse` (3.x) / `modProcessorResponse` (2.x). Смотрите `isError()`, `getMessage()` и `getObject()` (массив полей).

Как 3.x превращает `$action` в класс или файл: [логика загрузки](extending-modx/modx-class/reference/modx.runprocessor#processor-loading-logic).

`runProcessor` есть с Revolution 2.0.8. Раньше использовали устаревший [`executeProcessor`](extending-modx/modx-class/reference/modx.executeprocessor).

## Создание чанка

```php
$response = $modx->runProcessor('element/chunk/create', [
    'name' => 'NewChunk',
    'description' => 'Тестовый чанк через runProcessor.',
    'snippet' => '<h3>Chunkify!</h3>',
]);
if ($response->isError()) {
    return $response->getMessage();
}
$chunk = $response->getObject();
return 'Создан чанк "' . $chunk['name'] . '" с ID ' . $chunk['id'];
```

## Создание пользователя

Можно за один вызов создать пользователя с расширенными полями, группами, сгенерированным паролем и письмом:

```php
$groups = [
    'Group1' => [
        'usergroup' => '7', // ID группы
        'role' => '1',      // ID роли
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

Нужные ключи зависят от процессора. Если валидация падает, откройте класс в `core/src/Revolution/Processors/` (3.x) или соответствующий путь в 2.x.

## Свой каталог процессоров

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

Обзор: [Процессоры](extending-modx/processors) — вход/выход, создание ресурса, вызов ядра из своего кода и скелет класса.
