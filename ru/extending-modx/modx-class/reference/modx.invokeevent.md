---
title: "modX.invokeEvent"
description: "Вызывает указанное событие с необязательным массивом параметров."
translation: "extending-modx/modx-class/reference/modx.invokeevent"
---

## modX::invokeEvent

Вызывает указанное событие с необязательным массивом параметров.

## Синтаксис

``` php
boolean|array invokeEvent (string $eventName, [array $params = array ()])
```

Возвращает `false`, если имя события пустое или событие не существует. В остальных случаях возвращает массив результатов плагинов, зарегистрированных для события.

## Пример

Вызвать событие `OnWebPagePrerender`:

``` php
$results = $modx->invokeEvent('OnWebPagePrerender', array(
   'uri' => $_SERVER['REQUEST_URI'],
));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
