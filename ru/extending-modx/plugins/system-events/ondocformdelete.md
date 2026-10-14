---
title: "OnDocFormDelete"
translation: "extending-modx/plugins/system-events/ondocformdelete"
description: "Событие запускается после удаления ресурса в менеджере."
---

## Событие: OnDocFormDelete

Событие запускается после удаления ресурса в менеджере, из процессора `Resource\Delete`.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя      | Описание                                                                       |
| -------- | ------------------------------------------------------------------------------ |
| id       | Идентификатор ресурса.                                                         |
| children | Массив идентификаторов дочерних элементов этого ресурса, которые были удалены. |
| resource | Ссылка на объект modResource.                                                  |

## Пример

Такой плагин запишет в журнал ошибок удалённый ресурс вместе с его дочерними ресурсами:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormDelete':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was deleted');
        foreach ($children as $childId) {
            $child = $modx->getObject('modResource', $childId);
            if ($child) {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Child deleted: '.$child->get('pagetitle'));
            }
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
