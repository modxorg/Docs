---
title: "modResource.save"
translation: "extending-modx/core-model/modresource/modresource.save"
description: "Сохранить ресурс и обновить зависящие от него URI"
---

## modResource.save

Записывает ресурс в базу данных. Новая запись получает `createdon` и `createdby` от текущего времени и вошедшего пользователя, если они ещё пусты.

При включённых `friendly_urls` `uri` пересчитывается, когда он пуст или когда изменилось влияющее на него поле: `alias`, `alias_visible`, `parent`, `context_key`, `content_type`, `isfolder`, `uri_override`. После успешного сохранения обновляются URI потомков рекурсивно; изменённый `context_key` распространяется на всех потомков. Задайте `refreshURIs` в `true` перед вызовом метода, чтобы принудительно запустить это обновление.

Сам метод событий не вызывает. Проверка политики доступа `save` происходит в `modAccessibleObject::save()`; процессоры менеджера вызывают `OnBeforeDocFormSave` и `OnDocFormSave` вокруг своих вызовов.

## Синтаксис

``` php
boolean save ([boolean $cacheFlag = null])
```

- `$cacheFlag` _(boolean)_ передаётся родительской реализации для управления кэшированием сохранённого объекта, по умолчанию `null`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->set('pagetitle', 'foobar');
$resource->save();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
- [modResource.clearCache](extending-modx/core-model/modresource/modresource.clearcache)
