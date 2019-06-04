---
title: "OnDocFormRender"
translation: "extending-modx/plugins/system-events/ondocformrender"
---

## Событие: OnDocFormRender

Запускается после загрузки формы редактирования ресурса в диспетчере. Полезно для вставки HTML в формы, а с 2.4 для установки нескольких значений по умолчанию для новых ресурсов

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

Рекомендуется делать это только на новых ресурсах, так как любые значения, которые вы установите, будут перезаписывать существующие значения ресурсов.

Вот как вы можете использовать это:

``` php
switch ($modx->event->name) {
  case 'OnDocFormRender':
    if ($mode === 'new') {
      $resource->set('pagetitle', 'This is a default pagetitle');
    }
    break;
}

```

## Смотрите также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
