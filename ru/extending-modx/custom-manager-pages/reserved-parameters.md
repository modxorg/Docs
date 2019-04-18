---
title: Зарезервированные параметры
_old_id: '259'
_old_uri: 2.x/developing-in-modx/other-development-resources/reserved-parameters
---

## Зарезервированные параметры GET внутри менеджера MODX

Ниже приведен список (пока неполный) параметров GET, используемых менеджером MODX. Вам следует избегать использования любого из этих параметров на [страницах CMP](extending-modx/custom-manager-pages "Custom Manager Pages"):

- **a** используется для определения действия или контроллера
- **namespace** указывает, к какому пространству имен принадлежит действие
- **context_key** указывает один из ваших контекстов (например, "web" или "mgr")
- **class_key** указывает имя класса, например, при создании веб-ссылки или статического ресурса
- **id** указывает идентификатор страницы

## Зарезервированные переменные $ _SESSION (с версии 2.1.1-pl и позже)

- cultureKey
- и все остальное с префиксом modx. *

## Зарезервированные переменные $ _SESSION (до версии 2.1.1-pl)

Переменные $ _SESSION, выделенные курсивом, были удалены в версии 2.1.1-pl

- *webValidated*
- *mgrValidated*
- *webInternalKey*
- *mgrInternalKey*
- *webShortname*
- *mgrShortname*
- cultureKey
- and anything prefixed with modx.*
