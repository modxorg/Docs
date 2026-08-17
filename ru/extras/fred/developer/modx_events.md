---
title: "События MODX"
description: "События FredBeforeRender и жизненный цикл сохранения ресурса Fred"
translation: "extras/fred/developer/modx_events"
---

## FredBeforeRender

Событие срабатывает только на фронтенде до инициализации Fred. Используется для подключения кастомных плагинов Fred или загрузки своих JS/CSS.
Параметры в событие не передаются. Ожидается вывод в `$modx->event->_output` в формате:

```php
$modx->event->_output = [
    'includes' => $includes,
    'beforeRender' => $beforeRender,
    'lexicons' => $lexicons,
    'modifyPermissions' => $modifyPermissions
];
```

### includes

Строка HTML-разметки, которая добавится после подключения CSS и JS Fred.

#### Пример

```php
$includes = '
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
';
```

### beforeRender

Строка JS-команд, которая попадёт в функцию `beforeRender` Fred. Можно регистрировать плагины Fred.

#### Пример

```php
$beforeRender = '
    this.registerRTE("TinyMCE", FredRTETinyMCE);
';
```

### lexicons

Массив дополнительных lexicon, которые должен загрузить Fred.

#### Пример

```php
$lexicons = ['fredrtetinymce:default'];
```

### modifyPermissions

Строка JS-команд для функции `modifyPermissions` Fred. Параметр `permissions` доступен как объект всех прав текущего пользователя.

#### Пример

```php
$modifyPermissions = '
    permissions.save_document = false; // Disable save for the user
    permissions.my_plugin_show = true; // Custom permission
';
```

## FredOnBeforeFredResourceSave

Срабатывает до сохранения ресурса Fred из manager или с web.
Свойства:

-   id (ID ресурса, который сохраняют)
-   resource (объект modResource)

## FredOnFredResourceSave

Срабатывает после сохранения ресурса Fred из manager или с web.
Свойства:

-   id (ID ресурса, который сохраняют)
-   resource (объект modResource)

## FredOnFredResourceLoad

Срабатывает до того, как endpoint LoadContent на фронтенде вернёт данные в браузер.
Свойства:

-   id (ID загружаемого ресурса)
-   resource (объект modResource)
-   data (данные, которые endpoint вернёт, в виде stdClass)

## FredElementFormRender

@todo
