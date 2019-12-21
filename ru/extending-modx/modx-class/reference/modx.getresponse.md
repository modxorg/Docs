---
title: "modX.getResponse"
translation: "extending-modx/modx-class/reference/modx.getresponse"
---

## modX::getResponse

Попробуйте загрузить класс обработчика ответа, если он еще не загружен. По умолчанию `modResponse`.

## Синтаксис

API Doc: [modX::getResponse()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getResponse())

``` php
boolean getResponse ([$string $class = 'modResponse'], [$path $path = ''])
```

## Пример

Загрузите пользовательский класс обработчика ответов с именем 'myResponse' из '/path/to/myresponse.class.php':

``` php
$modx->getResponse('myResponse','/path/to/');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
