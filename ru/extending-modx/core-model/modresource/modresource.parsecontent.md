---
title: "modResource.parseContent"
translation: "extending-modx/core-model/modresource/modresource.parsecontent"
description: "Распарсить некэшируемые теги и получить вывод ресурса"
---

## modResource::parseContent

Копирует `_content` в `_output` и дважды прогоняет через парсер. Первый проход вычисляет некэшируемые теги; второй обрабатывает остальное и удаляет теги, которые так и не распарсились.

На время парсинга ресурс становится текущим `modx->resource`, а `$data` экспортируется как плейсхолдеры; и то, и другое восстанавливается до возврата метода. Если ресурс ещё не обработан, здесь же выполняется и кэшируемый проход.

## Синтаксис

``` php
string parseContent ([array $data = array()])
```

- `$data` _(array)_ значения, записываемые в плейсхолдеры на время вызова, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$output = $resource->parseContent(array('message' => 'foobar'));
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)
