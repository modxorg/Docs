---
title: "cookieJar"
description: "Набор сниппетов MODX Revolution для установки, чтения и удаления cookies браузера"
translation: "extras/cookiejar/index"
---

## Что такое cookieJar?

Extra включает набор сниппетов MODX Revolution для установки, чтения и удаления cookies браузера.

## История

cookieJar написал David Pede, последний релиз. 13 декабря 2018 года.

## Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](building-sites/extras), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/cookiejar>

Исходный код и build script: <https://github.com/tasianmedia/cookiejar>

## Баги и запросы функций

Баги, issues и feature requests: <https://github.com/tasianmedia/cookiejar/issues>

## Доступные сниппеты

### setCookie

Сниппет setCookie вызывается тегом:

``` php
[[seCookie]]
```

setCookie можно вызывать с кэшем или без.

### getCookie

Сниппет getCookie вызывается тегом:

``` php
[[!getCookie]]
```

## Доступные свойства

### setCookie

| Name        | Description                                                                                                                                                                 | Default Value | Added in Version |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| name        | Имя cookie. \[REQUIRED\]                                                                                                                                        |               | 1.0.0-pl         |
| value       | Значение cookie. Хранится на компьютере клиента, не сохраняйте чувствительные данные.                                                                  |               | 1.0.0-pl         |
| expires     | Время истечения cookie. Unix timestamp в секундах. Используйте `0` для session cookie. Любая дата в прошлом удаляет cookie.             | 0             | 1.0.0-pl         |
| expiresType | Единица периода для expires. Допустимо: 'years', 'months', 'days', 'weeks', 'hours', 'minutes', 'seconds'.                                             | seconds       | 1.1.0-pl         |
| path        | Путь на сервере, где cookie доступен. Используйте `/` для всего домена.                                                        | /             | 1.0.0-pl         |
| domain      | Домен, для которого доступен cookie.                                                                                                                                 |               | 1.0.0-pl         |
| secure      | Cookie передаётся только по HTTPS.                                                                        | 0             | 1.0.0-pl         |
| httponly    | Cookie доступен только через HTTP, не через JavaScript и другие скриптовые языки. | 0             | 1.0.0-pl         |

### getCookie

| Name          | Description                                                                           | Default Value | Added in Version |
| ------------- | ------------------------------------------------------------------------------------- | ------------- | ---------------- |
| name          | Имя cookie для возврата. \[REQUIRED\]                                   |               | 1.0.0-pl         |
| tpl           | Имя чанка-шаблона.                                                |               | 1.0.0-pl         |
| toPlaceholder | Если задано, вывод записывается в этот placeholder вместо прямого вывода. | value         | 1.0.0-pl         |

## Примеры

### setCookie

Session Cookie:

``` php
[[!setCookie?
    &name=`foo`
    &value=`foobar`
    &expires=`0`
]]
```

Безопасный cookie на один час:

``` php
[[!setCookie?
    &name=`foo`
    &value=`foobar`
    &expires=`1`
    &expiresType=`hours`
    &secure=`1`
]]
//or using seconds
[[!setCookie?
    &name=`foo`
    &value=`foobar`
    &expires=`3600`
    &secure=`1`
]]
```

Безопасный cookie на один день:

``` php
[[!setCookie?
    &name=`foo`
    &value=`foobar`
    &expires=`1`
    &expiresType=`days`
    &secure=`1`
]]
```

Удалить cookie 'foo':

``` php
[[!setCookie?
    &name=`foo`
    &expires=`-3600`
]]
```

### getCookie

Вывести значение cookie 'foo':

``` php
[[!getCookie?
    &name=`foo`
]]
```

Вывести значение cookie 'foo' через чанк 'cookieTpl' и записать в placeholder:

``` php
[[!getCookie?
    &name=`foo`
    &tpl=`cookieTpl`
    &toPlaceholder=`cookieValue`
]]
```
