---
title: "OnTemplateVarRemove"
translation: "extending-modx/plugins/system-events/ontemplatevarremove"
description: "Срабатывает после удаления ТВ, в modTemplateVar::remove()."
---

## Событие: OnTemplateVarRemove

Загружается сразу после успешного удаления переменной шаблона.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                                                                      |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                                                                              |
| cacheFlag   | Всегда `true` — ядро передаёт фиксированное значение при вызове события.                              |

## Замечания

| Предыдущее событие | [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove "OnTemplateVarBeforeRemove")                |
| ------------------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | —                                                                                                                                     |
| File               | [core/src/Revolution/modTemplateVar.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modTemplateVar.php)         |
| Class              | MODX\Revolution\modTemplateVar                                                                                                         |
| Method             | public function remove(array $ancestors= array ())                                                                                     |

## Пример

Такой плагин выведет в "Журнал ошибок" данные удаленного ТВ:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarRemove':
        //массив твшки, со всеми параметрами
        print_r($templateVar->toArray());
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
