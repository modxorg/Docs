---
title: "modResource.getResourceTypeName"
translation: "extending-modx/core-model/modresource/modresource.getresourcetypename"
description: "Получить переводимое имя типа ресурса"
---

## modResource.getResourceTypeName

Возвращает запись лексикона для типа ресурса. Базовая реализация обрабатывает особым образом только `modDocument`, который переводится ключом `document`; все остальные классы ищутся по собственным именам классов.

Производным классам, которым нужна другая подпись, метод переопределяют: `modWebLink`, `modSymLink` и `modStaticResource`. Если класс не переопределяет метод и записи лексикона нет, возвращается сырое имя класса — `modLexicon` не изменяет отсутствующий ключ.

## Синтаксис

``` php
string getResourceTypeName ()
```

## Пример

``` php
$document = $modx->getObject('modDocument', array('id' => 5));
echo $document->getResourceTypeName();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getContextMenuText](extending-modx/core-model/modresource/modresource.getcontextmenutext)
