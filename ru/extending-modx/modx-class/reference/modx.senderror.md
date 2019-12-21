---
title: "modX.sendError"
translation: "extending-modx/modx-class/reference/modx.senderror"
---

## modX::sendError

Отправьте пользователя на типовую страницу ошибки ядра и остановите выполнение PHP.

Параметр 'type' может быть любым полем, которое загрузит файл шаблона в `core/error`. MODX поставляется с двумя страницами ошибок по умолчанию: они «недоступны» (по умолчанию) и "фатальны".

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendError()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendError())

``` php
void sendError ([string $type = ''], [array $options = array()])
```

## Примеры

Отправить на недоступную страницу ошибки 503.

``` php
$modx->sendError('unavailable');
```

Отправить на фатальную 500 страницу.

``` php
$modx->sendError('fatal');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
