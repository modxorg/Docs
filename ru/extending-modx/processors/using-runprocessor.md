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

Точные имена свойств зависят от процессора. Если валидация падает, откройте класс в `core/src/Revolution/Processors/` (3.x) или смотрите [Список процессоров ядра](extending-modx/processors/list).

## Обработка ответа

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

`$response->getResponse()` возвращает весь массив (`success`, `message`, `object`, `total`, ...).

## Ресурсы

### Создание

```php
$response = $modx->runProcessor('resource/create', [
    'pagetitle' => 'Новость',
    'alias' => 'news-item',
    'content' => '<p>Текст</p>',
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

### Обновление

```php
$response = $modx->runProcessor('resource/update', [
    'id' => $id,
    'pagetitle' => 'Новость (правка)',
    'content' => '<p>Обновлённый текст</p>',
    'published' => 1,
]);
if ($response->isError()) {
    return $response->getMessage();
}
```

### Получить один / список

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
    // обычно: success, total, results
}
```

### Публикация, удаление, дублирование

```php
$modx->runProcessor('resource/publish', ['id' => $id]);
$modx->runProcessor('resource/unpublish', ['id' => $id]);
$modx->runProcessor('resource/delete', ['id' => $id]);      // в корзину
$modx->runProcessor('resource/undelete', ['id' => $id]);

$response = $modx->runProcessor('resource/duplicate', [
    'id' => $id,
    'name' => 'Копия новости',
]);
```

В боевом коде всегда проверяйте `isError()`. В однострочниках выше проверка опущена для краткости.

## Элементы

### Чанк

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

### Сниппет

```php
$response = $modx->runProcessor('element/snippet/create', [
    'name' => 'HelloUser',
    'description' => 'Возвращает имя пользователя',
    'snippet' => 'return $modx->user->get("username");',
]);
```

### TV

```php
$response = $modx->runProcessor('element/templatevar/create', [
    'name' => 'articleImage',
    'caption' => 'Картинка статьи',
    'type' => 'image',
    'category' => 0,
]);
```

В 3.x `$action` может быть и `\MODX\Revolution\Processors\Element\TemplateVar\Create::class`.

## Пользователи и авторизация

### Вход / выход

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

### Создание пользователя

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

### Смена пароля

```php
$response = $modx->runProcessor('security/profile/changepassword', [
    'password_old' => $oldPassword,
    'password_new' => $newPassword,
    'password_confirm' => $newPassword,
]);
```

Имена полей могут отличаться по версии MODX. Если вызов падает, сверьте их в классе процессора.

## Система

### Очистка кэша

```php
$response = $modx->runProcessor('system/clearcache');
if ($response->isError()) {
    return $response->getMessage();
}
```

### Создание системной настройки

```php
$response = $modx->runProcessor('system/settings/create', [
    'key' => 'myextra.some_flag',
    'value' => '1',
    'xtype' => 'combo-boolean',
    'namespace' => 'myextra',
    'area' => 'myextra',
]);
```

## Файлы (media browser)

Процессоры загрузки и ФС ждут пути media source и права менеджера. Типичные action: `browser/file/upload`, `browser/file/remove`, `browser/directory/create`. Передавайте те же поля, что шлёт дерево файлов в менеджере (source, path, file). Из веб-сниппета их вызывают редко, пока пользователь не аутентифицирован для `mgr` (или вы сами не открыли этот контекст).

```php
// Только форма вызова: нужные ключи зависят от источника и запроса
$response = $modx->runProcessor('browser/directory/create', [
    'name' => 'exports',
    'parent' => '/',
    'source' => 1,
]);
```

## Action как класс 3.x

```php
use MODX\Revolution\Processors\Resource\Create;

$response = $modx->runProcessor(Create::class, [
    'pagetitle' => 'Через FQCN',
    'context_key' => 'web',
]);
```

## Ядерный процессор внутри своего

```php
$response = $modx->runProcessor('resource/create', $resourceData);
if ($response->isError()) {
    return $this->failure($response->getMessage());
}
$id = (int)$response->getObject()['id'];

$tvResponse = $modx->runProcessor('resource/update', [
    'id' => $id,
    'pagetitle' => $resourceData['pagetitle'],
    // добавьте значения TV, которые ждёт update в вашей схеме
]);
```

Плагины на сохранение ресурса сработают на каждый успешный вызов ядра.

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

## Права с фронтенда

Многим процессорам ядра нужны права менеджера. Из сниппета в `web` либо:

1. Работайте под пользователем, у которого эти политики уже есть в `web`, либо
2. Для доверенных/внутренних скриптов инициализируйте менеджер: `$modx->initialize('mgr');`

Не отдавайте привилегированные процессоры на публичные формы без своей авторизации и CSRF.

## См. также

- [Процессоры](extending-modx/processors)
- [Список процессоров ядра](extending-modx/processors/list)
- [modX.runProcessor](extending-modx/modx-class/reference/modx.runprocessor)
- [Коннекторы](extending-modx/processors/connectors)
