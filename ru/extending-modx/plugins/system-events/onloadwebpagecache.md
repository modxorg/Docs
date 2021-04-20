---
title: "OnLoadWebPageCache"
translation: "extending-modx/plugins/system-events/onloadwebpagecache"
---

## Событие: OnLoadWebPageCache

Запускается после загрузки ресурса из кэша. Если Ресурс не кэшируется, это событие не сработает. ПРИМЕЧАНИЕ: это событие не особенно полезно до MODX 2.3 (смотри [Issue 9841](http://bugs.modx.com/issues/9841)).

Служба: 4 - Cache Service Events
Группа: Нет

## Параметры события

Нет.

## Заметки

This event is triggered inside the getResource() function in modrequest.class.php.

- **\_content** : содержит ресурс _rendered_ (то есть его шаблон). Любые кешированные плейсхолдеры будут заменены значениями, а все некэшированные плейсхолдеры будут отображаться как есть.

В MODX 2.3 и более поздних версиях вы можете получить доступ к свойствам ресурса. (смотри [Issue 9841](http://bugs.modx.com/issues/9841)):

``` php
// Override Output
$modx->event->params['resource']->_content = 'Overridden...';
```

Вы можете получить доступ к свойствам ресурса следующим образом:

``` php
// Override Pagetitle
$modx->event->params['resource']->pagetitle = 'My New Pagetitle';
```

TV хитрее. Они кэшируются как стандартный массив. Для чтения и переопределения значений, вы сосредоточитесь на элементе 1:

``` php
// Reading value of TV named "my_tv"
$my_tv = $modx->event->params['resource']->my_tv[1];
/*
// Where our array
array (
    0 => 'name_of_tv',
    1 => 'Value of TV Goes here',
    2 => 'default',
    3 => NULL,
    4 => 'text', // <-- TV type
)
*/
```

Такой плагин заменит pagetitle, значение ТВ и контента:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnLoadWebPageCache':
        $modx->event->params['resource']->pagetitle = 'Новый заголовок';
        // меняем значение ТВ
        $tv = $modx->event->params['resource']->price[1] = '128';
        /*
        // массив значений ТВ 
        array (
            0 => 'name', //название ТВ
            1 => 'значение', //значение ТВ
            2 => 'default', //параметры вывода ТВ
            3 => NULL,
            4 => 'text', //тип ТВ
        )
        */
        $modx->event->params['resource']->_content = 'Новый контент'.$tv;
        break;
}
```

Для дальнейшего обучения, посмотрите на кэшированные файлы, созданные внутри папки `core/cache/resource/web/resources/`.

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
