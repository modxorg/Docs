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

Несколько сервисов регистрируются в контейнере при инициализации MODX:

- `registry` — [modRegistry](extending-modx/services/modregistry), создается сразу при завершении `modX::initialize()`;
- семь PSR HTTP-сервисов, перечисленных на странице [HTTP-сервисы](extending-modx/services/http) (`ClientInterface`, `ServerRequestFactoryInterface`, `RequestFactoryInterface`, `StreamFactoryInterface`, `ResponseFactoryInterface`, `UploadedFileFactoryInterface`, `UriFactoryInterface`);
- `modManagerDateFormatter` (зарегистрированный под именем своего класса), используемый менеджером;
- `lexicon`, `error` и `parser` также попадают в контейнер по ходу инициализации.

Остальные сервисы поставляются с ядром, но загружаются по требованию через `$modx->getService`, а не предрегистрируются:

- [modFileHandler](extending-modx/services/modfilehandler)
- [modMail](extending-modx/services/modmail)

## Смотрите также

- [modX.getService](extending-modx/modx-class/reference/modx.getservice)
- [Контейнер внедрения зависимостей](extending-modx/di-container)
