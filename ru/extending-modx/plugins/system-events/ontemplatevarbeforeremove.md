---
title: "OnTemplateVarBeforeRemove"
translation: "extending-modx/plugins/system-events/ontemplatevarbeforeremove"
description: "Срабатывает прямо перед удалением ТВ, в modTemplateVar::remove()."
---

## Событие: OnTemplateVarBeforeRemove

Загружается прямо перед удалением переменной шаблона.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя         | Описание                                                                 |
| ----------- | ------------------------------------------------------------------------ |
| templateVar | Экземпляр класса modTemplateVar.                                         |
| cacheFlag   | Всегда `true` — ядро передаёт фиксированное значение при вызове события. |

## Замечания

| Предыдущее событие | —                                                                                                                               |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove "OnTemplateVarRemove")                           |
| File               | [core/src/Revolution/modTemplateVar.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modTemplateVar.php) |
| Class              | MODX\Revolution\modTemplateVar                                                                                                  |
| Method             | public function remove(array $ancestors= array ())                                                                              |

## Пример

Такой плагин выведет в "Журнал ошибок" данные удаленного ТВ:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarBeforeRemove':
        //массив твшки, со всеми параметрами
        print_r($templateVar->toArray());
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
