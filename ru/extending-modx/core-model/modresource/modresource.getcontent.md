---
title: "modResource.getContent"
translation: "extending-modx/core-model/modresource/modresource.getcontent"
description: "Получить исходное содержимое ресурса"
---

## modResource::getContent

Возвращает содержимое, хранящееся в ресурсе, с тегами и всем остальным — ничего не парсится. Метод объявлен в самом `modResource`, а не унаследован: класс не расширяет `modElement`.

`modStaticResource` переопределяет метод и читает источник из файла, а не из поля.

## Синтаксис

``` php
string getContent ([array $options = array()])
```

- `$options` _(array)_ если содержит ключ `content`, возвращается именно это значение вместо сохранённого, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$content = $resource->getContent();
$preview = $resource->getContent(array('content' => 'foobar'));
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.setContent](extending-modx/core-model/modresource/modresource.setcontent)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)
