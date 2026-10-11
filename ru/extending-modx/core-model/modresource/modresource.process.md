---
title: "modResource.process"
translation: "extending-modx/core-model/modresource/modresource.process"
description: "Собрать кэшируемую часть вывода ресурса"
---

## modResource::process

Заполняет `_content` кэшируемым выводом. Если у ресурса есть шаблон, сначала обрабатывается он, и его вывод используется. Без шаблона теги в исходном содержимом парсятся напрямую с лимитом `parser_max_iterations`.

Если ресурс кэсируем, уже обработан и `_content` не пуст, повторно ничего не парсится и возвращается существующий `_content`. Это обычный путь для ресурса, восстановленного из кэша сайта.

## Синтаксис

``` php
string process ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$content = $resource->process();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)
- [modResource.getProcessed](extending-modx/core-model/modresource/modresource.getprocessed)
