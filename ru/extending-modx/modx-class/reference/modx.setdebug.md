---
title: "modX.setDebug"
translation: "extending-modx/modx-class/reference/modx.setdebug"
---

## modX::setDebug

Устанавливает функции отладки экземпляра modX.

## Синтаксис

API Doc: [modX::setDebug()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setDebug())

``` php
boolean|int setDebug ([boolean|int $debug = true], [boolean $stopOnNotice = false])
```

## Пример

Включите режим отладки и скажите, чтобы процесс прекратился, если происходят уведомления:

``` php
$modx->setDebug(true);
```

## Смотрите также

[modX.setDebug](extending-modx/modx-class/reference/modx.setdebug)
