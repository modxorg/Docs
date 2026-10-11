---
title: "modResource.syncScripts"
translation: "extending-modx/core-model/modresource/modresource.syncscripts"
description: "Скопировать в ресурс реестры скриптов, собранные при обработке"
---

## modResource::syncScripts

Копирует `jscripts`, `sjscripts` и `loadedjscripts` из экземпляра MODX в соответствующие свойства `_jscripts`, `_sjscripts` и `_loadedjscripts` ресурса. Скрипты, зарегистрированные кэшируемыми элементами, иначе потерялись бы после записи ресурса в кэш сайта.

Вызывается из `prepare()` между `process()` и `parseContent()`. `modRequest` снова объединяет эти свойства с экземпляром MODX, когда восстанавливает ресурс из кэша.

## Синтаксис

``` php
void syncScripts ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->prepare();
print_r($resource->_jscripts);
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)
