---
title: "CookieList"
description: "Wishlist и избранное через cookie для MODX Revolution"
translation: "extras/cookielist/index"
---

[CookieList](https://modx.com/extras/package/cookielist). универсальный addon для wishlist, избранного и похожего контента. Вы задаёте сохраняемое значение, поэтому он не ограничен ресурсами и подходит для custom components. Как следует из названия, данные хранятся в cookie.

## Авторы, ссылки и прочее

CookieList разработал Romain Tripault из Melting Media для Mark Hamstra, которому это понадобилось для custom component BD Creative. bdListings. Вместо включения в тот пакет его вынесли в отдельный пакет для других с похожими задачами.

Исходники на Github: <https://github.com/Mark-H/CookieList>
Баги и feature requests: <https://github.com/Mark-H/CookieList/issues>
Обсуждение на форуме: <http://forums.modx.com/thread/71914/cookielist---wishlist-favorites-addon-for-revolution-using-lovely-cookies>

Можно форкнуть и расширить функциональность. Pull request приветствуется, если это полезно пакету в целом.

CookieList устанавливается через Package Manager или [на сайте MODX](https://modx.com/extras/package/cookielist), разработан для MODX Revolution. На версиях ниже не тестировался extensively, но должен работать с 2.0.

| Version  | Released On         | Notes                 |
| -------- | ------------------- | --------------------- |
| 1.0.0-pl | November 18th, 2011 | First public release. |

## Использование

В CookieList два сниппета.

Первый, **addToCookieList**, генерирует ссылку (или что угодно при переопределении шаблона), чтобы пользователь добавил или удалил элемент из CookieList.

Второй, **getCookieList**, читает cookie и возвращает список значений через запятую. Им формируете обзор wishlist/избранного и т.д.

### addToCookieList

Минимальный вызов создаёт ссылку «Add to your CookieList» или «Remove from your CookieList». Метки можно изменить (см. addText и removeText ниже).

``` php
[[!addToCookieList]]
```

Сниппеты addToCookieList и getCookieList **всегда** вызывайте без кэша: каждый запрос может быть от другого пользователя, список меняется до сброса кэша ресурса. С getPage передавайте &cache=0, чтобы getPage тоже не кэшировал.

#### Свойства сниппета

| Property   | Description                                                                                                                                                                             | Default value                 |
| ---------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------- |
| value      | Что сохранять в cookie. Обычно уникальный ID объекта для обзора через getCookieList. | Current Resource ID           |
| addText    | Переопределить метку «add».                                                                                                                                     | "Add to your CookieList"      |
| removeText | Переопределить метку «remove».                                                                                                                                  | "Remove from your CookieList" |
| tpl        | Переопределить чанк-шаблон. В чанке доступны link, value и label. Стандартный (filebased) чанк:                                  |

``` php
<a href="[[+link]]" title="[[+label]]">[[+label]]</a>
```

#### Примеры

Минимальный вызов сохраняет ID текущего ресурса в cookie для обзора через getResources.

### getCookieList

Сниппет возвращает пустую строку или список значений через запятую. Вызывается так:

``` php
[[!getCookieList]]
```

Свойств для изменения поведения нет.

## System Settings

Две системные настройки CookieList:

- cookielist.cookie.duration: срок жизни cookie, по умолчанию месяц.
- cookielist.cookie.name: имя cookie, по умолчанию cookieList.
