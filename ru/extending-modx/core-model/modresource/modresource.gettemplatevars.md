---
title: "modResource.getTemplateVars"
translation: "extending-modx/core-model/modresource/modresource.gettemplatevars"
description: "Получить Template Variables ресурса вместе с их значениями"
---

## modResource::getTemplateVars

Возвращает Template Variables, привязанные к шаблону ресурса. Каждый объект несёт своё текущее значение: значение, сохранённое для этого ресурса, а если его нет — значение ТВ по умолчанию. Коллекция строится статическим `getTemplateVarCollection()` и упорядочивается по рангу ТВ в шаблоне.

У нового ресурса сохранённых значений нет, поэтому возвращаются только значения по умолчанию. `getMany('TemplateVars', 'all')` ведёт в тот же код.

## Синтаксис

``` php
array getTemplateVars ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
foreach ($resource->getTemplateVars() as $tv) {
    echo $tv->get('name') . ': ' . $tv->get('value');
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getTVValue](extending-modx/core-model/modresource/modresource.gettvvalue)
