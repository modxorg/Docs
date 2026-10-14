---
title: "OnDocFormSave"
translation: "extending-modx/plugins/system-events/ondocformsave"
description: "Событие запускается после сохранения ресурса в менеджере."
---

## Событие: OnDocFormSave

Событие запускается после сохранения ресурса в менеджере через процессор создания или обновления (`Resource\Create`, `Resource\Update`). Оно также срабатывает при inline-редактировании удалённого ресурса в сетке корзины (`Resource\UpdateFromGrid`).

- Служба: 1 - Parser Service Events
- Group: Resources

**TVs лучше всего изменять здесь.** Если вам нужно изменить значения TV, лучше изменить их здесь, а не во время [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"). В отличие от [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave "OnBeforeDocFormSave"), это событие не поддерживает метод `$modx->event->output()`.

**Сохранение происходит автоматически.** Не нужно вызывать `$resource->save()`.

Всё, что вы вернёте из этого события, записывается в журнал ошибок.

## Параметры события

| Имя        | Описание                                                                              |
| ---------- | ------------------------------------------------------------------------------------- |
| mode       | Либо 'new' или 'upd', в зависимости от обстоятельств.                                 |
| id         | Идентификатор ресурса (даже для новых ресурсов)                                       |
| resource   | Ссылка на объект modResource.                                                         |
| reloadOnly | Только при создании: true, если процессор лишь перезагружает форму после ошибки валидации. |
| object     | Только при обновлении: ссылка на объект modResource, тот же экземпляр, что и resource. |

## Примеры

### Чтение идентификатора ресурса

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

### Значение TV

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormSave':
        //если у ресурса шаблон=5
        if ($resource->get('template') == 5) {  
            // после сохранения значение ТВ price=128
            if(!$resource->setTVValue('price', '128')) {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Возникли проблемы при установке значения ТВ.');
            }
        }
        break;
}
```

И не важно заполнено ли поле price перед сохранением, или нет. Плагин запишет 128.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
