---
title: "modResource.isMember"
_old_id: "1718"
translation: "2.x/developing-in-modx/other-development-resources/class-reference/modresource/modresource.ismember"
---

## modResource::isMember

Указывает, является ли ресурс членом группы или групп ресурсов. Вы можете указать либо строковое имя группы ресурсов, либо массив имен групп ресурсов.

Этот метод доступен в MODX v2.3 (скорее всего, не в патче)

## Синтаксис

 API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modresource.class.html#\\\\modResource::isMember()](http://api.modx.com/revolution/2.2/db_core_model_modx_modresource.class.html#\\modResource::isMember())

 ``` php
boolean isMember (mixed $groups)
```

## Пример

Получить объект ресурса:

 ``` php
$resource = $modx->getObject('modResource', array('id' => 2));
```

Посмотрите, является ли ресурс членом группы ресурсов 'Marketing':

 ``` php
$resource->isMember('Marketing');
```

Посмотрите, является ли ресурс членом ЛИБО группы ресурсов 'Marketing' или 'Finances'.

 ``` php
$resource->isMember(array('Marketing', 'Finances'));
```

Посмотрите, является ли ресурс членом BOTH и группы ресурсов 'Marketing' и 'Finances' (по умолчанию достаточно быть в одной группе ресурсов, чтобы вернуть true).

 ``` php
$resource->isMember(array('Marketing', 'Finances'), true);
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource "modResource")
