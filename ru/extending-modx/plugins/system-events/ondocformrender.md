---
title: "OnDocFormRender"
translation: "extending-modx/plugins/system-events/ondocformrender"
---

## Событие: OnDocFormRender

Запускается в форме редактирования диспетчера. Удобно для вставки HTML в формах и 2.4+ для установки значений по умолчанию на новые ресурсы

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                                                                                                       |
| -------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| mode     | Либо 'new' либо 'upd', в зависимости от обстоятельств.                                                                                         |
| resource | Ссылка на объект modResource. Начиная с 2.4, он будет содержать пустой объект ресурса при создании нового ресурса. До 2.4 это было бы нулевым. |
| id       | Идентификатор ресурса. Будет 0 для новых ресурсов.                                                                                             |

## Установка значений ресурса по умолчанию

Начиная с Revolution 2.4.0, вы можете использовать плагин OnDocFormRender для установки значения для одного из следующих полей:

- pagetitle
- longtitle
- description
- introtext
- content
- link\_attributes
- alias
- menutitle

Рекомендуется для установки на новые ресурсы, для существующих значения будут перезаписаны.

Вот как вы можете использовать это:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormRender':
        if ($mode == modSystemEvent::MODE_NEW) {
            //устанавливаем значения по умолчанию
            $resource->set('pagetitle', 'Заголовок');
            $resource->set('description', 'Описание');
            $resource->set('content', 'Контент');
        }
        break;
}
```

## Смотрите также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
