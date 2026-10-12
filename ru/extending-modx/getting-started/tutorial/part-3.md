---
title: "Часть 3"
translation: "extending-modx/getting-started/tutorial/part-3"
description: "Как устроены процессоры MODX, на примере процессора создания Chunk"
---

В MODX обработка форм осуществляется **процессорами** — PHP-классами в ядре, которые загружают, проверяют и сохраняют данные. Доступ к ним осуществляется через **коннекторы**, которые обрабатывают запросы AJAX из пользовательского интерфейса (UI). В запросе есть переменная REQUEST с именем `action`, указывающая, какой процессор запустить. Процессор работает с очищенными данными запроса и отвечает сообщением JSON обратно в браузер. Это позволяет быстро и легко выполнять запросы, снижая нагрузку на сервер и браузер. Асинхронных запросов к процессорам может быть несколько.

Процессоры можно представить как модели в MVC-фреймворке. У MODX есть «модель», но она в основном состоит из классов слоя ORM — то есть это не традиционный слой моделей. Процессоры часто заполняют этот пробел.

Разберём подробно процессор создания Chunk и посмотрим, как устроены процессоры MODX.

## Как запрос доходит до процессора

Начиная с 2.3 отдельных файлов-коннекторов на элементы нет. Все запросы к коннектору идут во фронт-контроллер:

> /connectors/index.php

В JS URL коннектора — `MODX.config.connector_url` (это `connectors/index.php`). Запрос создания Chunk выглядит так:

``` javascript
MODx.Ajax.request({
    url: MODx.config.connector_url
    ,params: {
        action: 'element/chunk/create'
        ,name: 'MyChunk'
        ,snippet: '[[+php]]'
    }
    ,listeners: {
        success: {fn:function(r) { /* ... */ },scope:this}
    }
});
```

Строка `action` вида `element/chunk/create` отображается в класс:

> core/src/Revolution/Processors/Element/Chunk/Create.php
> (`MODX\Revolution\Processors\Element\Chunk\Create`)

Этот же класс вызывается на стороне PHP через `$modx->runProcessor('element/chunk/create', $props)` — runProcessor собирает имя класса из action (`Processors\` + ucfirst каждого сегмента через `/`). Процессор отвечает JSON `{success, message, total, object}`.

## Внутри процессора Chunk Create

Сам класс небольшой — большая часть работы в его родителях:

``` php
<?php
namespace MODX\Revolution\Processors\Element\Chunk;

use MODX\Revolution\modChunk;

class Create extends \MODX\Revolution\Processors\Element\Create
{
    public $classKey = modChunk::class;
    public $languageTopics = ['chunk', 'category', 'element'];
    public $permission = 'new_chunk';
    public $objectType = 'chunk';
    public $beforeSaveEvent = 'OnBeforeChunkFormSave';
    public $afterSaveEvent = 'OnChunkFormSave';
}
```

Каждое свойство управляет одной частью общего алгоритма создания:

| Свойство | Что делает |
| --- | --- |
| `$classKey` | Какой класс модели создаётся (`$modx->newObject($classKey)`) |
| `$languageTopics` | Топики лексикона, загружаемые до работы процессора (строки i18n разбиты по топикам; не путайте с контекстами gettext) |
| `$permission` | Ключ права, проверяемый заранее; нет права → ответ `permission_denied` |
| `$beforeSaveEvent` / `$afterSaveEvent` | Системные события вокруг `$object->save()` (`OnBeforeChunkFormSave`, `OnChunkFormSave`), с `mode` и `id` в параметрах |

Базовые классы (`Processors\Model\CreateProcessor` → `Processors\Model\Processor`) затем выполняют стандартную последовательность: проверка прав → загрузка лексиконов → `newObject($classKey, $properties)` → валидация → `beforeSave()` → `save()` → событие после сохранения → `logManagerAction()` → `clearCache()` → `success($message, $object)`.

Именно поэтому процедурные шаги из старых материалов — загрузка лексикона, проверка прав, поиск категории, `newObject`, события, журнал, кеш, `$modx->error->success()` — исчезли из пользовательского кода: теперь это фреймворк.

`$modx->error->success()` и `$modx->error->failure()` по-прежнему существуют (`MODX\Revolution\Error\modError`), если вы пишете процессор вручную; параметры `success()`:

1: $message — строковое сообщение в ответ. Используется для деталей успеха (или отказа).
2: $object — `xPDOObject` или массив полей данных, который сериализуется в JSON и возвращается в браузер.

Точечная настройка процессора создания обычно означает переопределение `beforeSave()` (дополнительные проверки, правка свойств) и `cleanup()` (дополнительные поля ответа) — как делает класс Chunk для статических чанков:

``` php
public function beforeSave()
{
    $isStatic = intval($this->getProperty('static', 0));
    if ($isStatic == 1) {
        $staticFile = $this->getProperty('static_file');
        if (empty($staticFile)) {
            $this->addFieldError('static_file', $this->modx->lexicon('static_file_ns'));
        }
    }
    return parent::beforeSave();
}
```

Далее мы поговорим о том, как создать собственные схемы и добавить их в каркас MODX без изменения ядра.
