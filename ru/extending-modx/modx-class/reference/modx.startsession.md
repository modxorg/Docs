---
title: "modX.startSession"
translation: "extending-modx/modx-class/reference/modx.startsession"
description: "Запустить PHP-сеанс, если его ещё нет"
---

## modX::startSession

Запускает PHP-сеанс, пока внутреннее состояние ещё `SESSION_STATE_UNINITIALIZED`, затем записывает новое состояние: `SESSION_STATE_INITIALIZED`, `SESSION_STATE_EXTERNAL` или `SESSION_STATE_UNAVAILABLE`. Возвращаемое значение — `isset($_SESSION)`.

`initialize()` вызывает его из `_initSession()`, после настройки имени сеанса, параметров cookie и обработчика сохранения, поэтому более ранний вызов эту настройку пропускает. Также его вызывает `modUser::addSessionContext()`.

## Синтаксис

``` php
boolean startSession ()
```

Параметров нет.

## Пример

``` php
if ($modx->startSession()) {
    $_SESSION['staff'] = 'foobar';
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.getSessionState](extending-modx/modx-class/reference/modx.getsessionstate)
- [modX.checkSession](extending-modx/modx-class/reference/modx.checksession)
