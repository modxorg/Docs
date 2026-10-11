---
title: "modResource.isMember"
translation: "extending-modx/core-model/modresource/modresource.ismember"
description: "Проверить, входит ли ресурс в одну или несколько групп ресурсов"
---

## modResource::isMember

Указывает, является ли ресурс членом группы или групп ресурсов. Вы можете указать либо строковое имя группы ресурсов, либо массив имен групп ресурсов.

## Синтаксис

``` php
boolean isMember (string|array $groups [, boolean $matchAll = false])
```

`$groups` — имя группы ресурсов или массив имён групп ресурсов. Задайте `$matchAll` со значением `true`, чтобы требовать членства во всех группах массива; по умолчанию достаточно входа хотя бы в одну. Если `$groups` — одиночная строка, `$matchAll` не действует.

## Пример

Получить объект ресурса:

``` php
$resource = $modx->getObject('modResource', array('id' => 2));
```

Посмотрите, является ли ресурс членом группы ресурсов 'Marketing':

``` php
$resource->isMember('Marketing');
```

Проверьте, входит ли ресурс в группу 'Marketing' или 'Finances':

``` php
$resource->isMember(array('Marketing', 'Finances'));
```

Проверьте, входит ли ресурс одновременно в обе группы 'Marketing' и 'Finances':

``` php
$resource->isMember(array('Marketing', 'Finances'), true);
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource "modResource")
