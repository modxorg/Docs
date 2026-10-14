---
title: "OnLoadWebPageCache"
translation: "extending-modx/plugins/system-events/onloadwebpagecache"
description: "Событие запускается после загрузки ресурса из кэша страниц."
---

## Событие: OnLoadWebPageCache

Событие запускается после загрузки ресурса из кэша. Если ресурс не кэшируется, это событие не вызывается.

- Служба: 4 - Cache Service Events
- Group: System

## Параметры события

| Имя      | Описание                                                                              |
| -------- | ------------------------------------------------------------------------------------- |
| resource | Ссылка на экземпляр `modResource`, восстановленный из кэша. **Передаётся по ссылке.** |

## Заметки

Это событие вызывается внутри метода `getResource()` в [core/src/Revolution/modRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modRequest.php).

Свойство `_content` содержит отрендеренный ресурс (его шаблон): закэшированные плейсхолдеры заменены значениями, некэшированные остались разметкой.

Другие свойства ресурса переопределяются так же:

``` php
// Override Pagetitle
$modx->event->params['resource']->pagetitle = 'My New Pagetitle';
```

С ТВ всё сложнее. Они кэшируются как обычный массив. Для чтения и переопределения значений работайте с элементом 1:

``` php
// Reading value of TV named "my_tv"
$my_tv = $modx->event->params['resource']->my_tv[1];
/*
// The cached TV array
array (
    0 => 'name_of_tv',      // TV name
    1 => 'Value of TV Goes here', // TV value
    2 => 'default',         // TV display option
    3 => array (),          // TV display_params
    4 => 'text',            // TV type
)
*/

```

Чтобы увидеть сохранённую структуру, откройте сгенерированные файлы кэша в `core/cache/resource/web/resources/`.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
