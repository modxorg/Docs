---
title: "modResource.setContent"
translation: "extending-modx/core-model/modresource/modresource.setcontent"
description: "Задать исходное содержимое ресурса"
---

## modResource::setContent

Записывает `$content` в поле `content` ресурса. Метод объявлен в самом `modResource`, а не унаследован от `modElement`.

`$options` принимается ради совпадения сигнатуры с другими классами элементов, но этой реализацией игнорируется. Возвращаемое значение следует `set()`: `true` только если сохранённое содержимое действительно изменилось. В базу данных ничего не пишется до `save()`.

## Синтаксис

``` php
boolean setContent ($content [, array $options = array()])
```

- `$content` _(mixed)_ значение, сохраняемое в поле `content`
- `$options` _(array)_ этой реализацией не используется, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setContent('foobar [[++site_name]]');
$resource->save();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getContent](extending-modx/core-model/modresource/modresource.getcontent)
