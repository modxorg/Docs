---
title: "modX.getRequest"
translation: "extending-modx/modx-class/reference/modx.getrequest"
---

## modX::getRequest

Попробуйте загрузить класс обработчика запросов, если он еще не загружен. По умолчанию используется запрос mod.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRequest()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRequest())

``` php
boolean getRequest ([$string $class = 'modRequest'], [$path $path = ''])
```

## Пример

Загрузить пользовательский запрос класса обработчика под названием 'myrequest' из '/path/to/myrequest.class.php':

``` php
$modx->getRequest('myRequest','/path/to/');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
