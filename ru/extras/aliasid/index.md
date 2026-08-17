---
title: "aliasid"
description: "Extra для получения ID ресурса по его alias в текущем контексте"
translation: "extras/aliasid/index"
---

## Что такое aliasid?

aliasid это extra для MODX Revolution, который получает и возвращает ID ресурса по его alias. Особенно полезен в установках с несколькими контекстами, где общая структура и одни и те же сниппеты.

## Требования

- MODX Revolution 2.2.x+
- PHP 5.3

## История

aliasid написал Michael Graham.

### Загрузка

aliasid можно скачать через менеджер MODX Revolution в Package Management или из репозитория MODX Extras.

### GitHub

aliasid хранится и развивается на GitHub.

## Использование

Представьте установку MODX с несколькими сайтами одинаковой функциональности, но с разным контентом: адреса, языки, изображения и т.д. На каждом сайте есть список «Events» с заголовком, датой, местом и ссылкой на главной через getResources.

Обычно вызов getResources задаёт ID ресурса параметром _parents_:

``` php
[[!getResources? &parents=`5` &tpl=`eventListTPL`]]
```

При дублировании контекста ID ресурса Events будет другим. aliasid динамически получает ID, запрашивая alias ресурса в текущем контексте. Например:

```php
[[aliasid? &alias=`events/`]]
```

Возвращает ID ресурса в текущем контексте с alias events/.

В вызове getResources вместо числового ID используйте aliasid:

``` php
[[!getResources? &parents=`[[aliasid?&alias=`events/`]]` &tpl=`eventListTPL`]]
```

Такой вызов работает во всех контекстах, пока у нужного ресурса alias events.

**Примечание**: при дублировании контекста некоторые alias могут меняться автоматически.
