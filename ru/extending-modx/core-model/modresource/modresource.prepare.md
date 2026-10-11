---
title: "modResource.prepare"
translation: "extending-modx/core-model/modresource/modresource.prepare"
description: "Запустить всё конвейер вывода ресурса"
---

## modResource::prepare

Запускает три этапа, которые превращают сохранённый ресурс в разметку для браузера. `process()` собирает кэшируемую часть, `syncScripts()` копирует реестры скриптов, `parseContent()` вычисляет всё остальное. Результат попадает в публичное свойство `_output`.

`modResponse::outputContent()` вызывает его один раз на запрос для типов содержимого, не являющихся бинарными.

## Синтаксис

``` php
void prepare ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->prepare();
echo $resource->_output;
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)
- [modResource.parseContent](extending-modx/core-model/modresource/modresource.parsecontent)
- [modResource.syncScripts](extending-modx/core-model/modresource/modresource.syncscripts)
