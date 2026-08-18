---
title: "MODX сервисы"
translation: "extending-modx/services"
---

## Что такое сервис?

Сервис это объект в [контейнере внедрения зависимостей](extending-modx/di-container) (`$modx->services`). В 2.x и по-прежнему в 3.x многие extras грузят сервисы через [$modx->getService](extending-modx/modx-class/reference/modx.getservice). Этот хелпер в 3.x устарел. Берите `has` / `add` / `get` у `$modx->services`.

Когда сервис уже в контейнере, его можно повесить на `$modx` вручную (`$modx->error = $modx->services->get('error')`). `getService` делал это сам.

``` php
$modx->services->add('twitter', function($c) use ($modx) {
    return new MyPackage\Twitter($modx, ['api_key' => 3212423]);
});
$modx->services->get('twitter')->tweet('Success!');
```

## Какие сервисы включены по умолчанию?

Список основных сервисов MODX выглядит следующим образом:

1. [modFileHandler](extending-modx/services/modfilehandler)
2. [modMail](extending-modx/services/modmail)
3. [modRegistry](developing-in-modx/advanced-development/modx-services/modregistry)

## Смотрите также

- [modX.getService](extending-modx/modx-class/reference/modx.getservice)
- [Контейнер внедрения зависимостей](extending-modx/di-container)
