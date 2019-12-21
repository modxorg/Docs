---
title: "modX.getParentIds"
translation: "extending-modx/modx-class/reference/modx.getparentids"
---

## modX::getParentIds

Получает все идентификаторы родительского ресурса для данного ресурса.

## Синтаксис

API Doc: [modX::getParentIds()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getParentIds())

``` php
array getParentIds ([integer $id = null], [integer $height = 10], [array $options = array()] )
```

## Пример

Получить все родительские идентификаторы для ресурса с идентификатором 23.

``` php
$parentIds = $modx->getParentIds(23);
```

Важно! Этот метод использует контекстный кэш для получения родительских идентификаторов. Если вы не укажете контекст в параметре options (третий), он будет использовать текущий контекст. **В плагине или внешнем приложении, которое часто является "mgr".** Когда этот метод возвращает пустой массив, он, скорее всего, ищет в неправильном контексте, поэтому вам придется указать третий параметр. Пример:

``` php
$pids = $modx->getParentIds($id, 10, array('context' => 'web'));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.getChildIds](extending-modx/modx-class/reference/modx.getchildids "modX.getChildIds")
