---
title: "OnTemplateVarBeforeSave"
translation: "extending-modx/plugins/system-events/ontemplatevarbeforesave"
description: "Срабатывает прямо перед сохранением ТВ, в modTemplateVar::save()."
---

## Событие: OnTemplateVarBeforeSave

Загружается перед сохранением переменной шаблона в базе.

- Служба: 1 - Parser Service Events
- Group: Template Variables

## Параметры события

| Имя         | Описание                                                                                                                                     |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------------------- |
| mode        | 'new' или 'upd', в зависимости от обстоятельств.                                                                                             |
| templateVar | Экземпляр класса modTemplateVar.                                                                                                             |
| cacheFlag   | Указывает, следует ли сохранять в кэше сохранённый TV и, необязательно, указав целочисленное значение, за сколько секунд до истечения срока. |

## Замечания

| Предыдущее событие | —                                                                                                                               |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------- |
| Следующее событие  | [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave "OnTemplateVarSave")                                 |
| File               | [core/src/Revolution/modTemplateVar.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modTemplateVar.php) |
| Class              | MODX\Revolution\modTemplateVar                                                                                                  |
| Method             | public function save($cacheFlag = null)                                                                                         |

## Пример

Такой плагин выведет в "Журнал ошибок" данные сохраняемого ТВ:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarBeforeSave':
        //массив твшки, со всеми параметрами
        print_r($templateVar->toArray());
        //проверка на обновление или создание самого тв
        if ($mode == modSystemEvent::MODE_NEW){
            echo 'Был создан новый ТВ';
        } elseif ($mode == modSystemEvent::MODE_UPD){
            echo 'Был обновлен старый ТВ';
        }
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
