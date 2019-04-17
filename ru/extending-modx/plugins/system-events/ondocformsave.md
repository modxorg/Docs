---
title: "OnDocFormSave"
translation: "extending-modx/plugins/system-events/ondocformsave"
---

## Событие: OnDocFormSave

Запускается после сохранения ресурса в менеджере через форму редактирования.

Служба: 1 - Parser Service Events
Группа: Documents

**TVs Лучше всего модифицировать здесь**
Если вам нужно изменить значения TV, лучше изменить их здесь, а не во время [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave").

В отличие от [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"), это событие не поддерживает метод `$modx->event->output()`.

## Параметры события

| Имя      | Описание                                               |
| -------- | ------------------------------------------------------ |
| mode     | Either 'new' or 'upd', depending on the circumstances. |
| resource | Ссылка на объект modResource.                          |
| id       | The ID of the Resource (even for new resources)        |

## Примеры

Чтобы сделать что-то с идентификатором страницы (например, чтобы обновить связанную пользовательскую таблицу), вы можете прочитать это из объекта **$resource** (даже если вы создаете новый ресурс):

``` php
// Log all available properties of the $resource
$modx->log(MODX_LOG_LEVEL_ERROR, print_r($resource->toArray(),true) );
// Get the page id
$page_id = $resource->get('id');
// or simply
$page_id = $id;

if ($mode == 'new') {
    // resource created
}
else {
   // existing resource was updated
}
```

Все, что вы вернете из этого события, будет записано в журналы, например,

``` php
return "Help I'm a bug!";
```

Результатом будет сообщение журнала, подобное следующему:

``` php
 [2012-06-22 13:00:28] (ERROR @ /connectors/resource/index.php) [OnDocFormSave]Help I'm a bug!
```

### Вычисление значения TV

``` php
switch ($modx->event->name) {

        // Documents
        case 'OnDocFormSave':
            if ($resource->get('template') == 8) {  
                if(!$resource->setTVValue('my_tv', 'Some Value')) {
                    $modx->log(modX::LOG_LEVEL_ERROR, 'There was a problem setting the TV value.');
                }
            }

        break;
}
```

**Автоматическое сохранение**
Нет необходимости запускать `$resource->save()` метод, так как это происходит автоматически.

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
