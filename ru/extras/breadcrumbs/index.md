---
title: "Breadcrumbs"
description: "Сниппет Breadcrumbs для простой навигационной цепочки в MODX Revolution"
translation: "extras/breadcrumbs/index"
---

## Что такое Breadcrumbs?

Breadcrumbs это простой [сниппет](developing-in-modx/basic-development/snippets "Snippets") навигационной цепочки для MODX Revolution. С его помощью вы легко добавите хлебные крошки в любое место страницы.

## Требования

- MODX Revolution 2.0.0-beta5 или новее
- PHP5 или новее

## История

Breadcrumbs существует с самого начала MODX 0.9.1, то есть MODX Evolution. Первый релиз вышел 30 июня 2006 года. С тех пор у extra было много авторов.

### Публичные релизы

| Version    | Date                | Author       | Product    |
| ---------- | ------------------- | ------------ | ---------- |
| 1.1-beta3  | November 23rd, 2009 | splittingred | Revolution |
| 1.1-beta2  | November 5th, 2009  | splittingred | Revolution |
| 1.1-beta1  | May 21st, 2009      | splittingred | Revolution |
| 1.0-alpha4 | April 21st, 2009    | splittingred | Revolution |
| 1.0-alpha3 | March 24th, 2009    | splittingred | Revolution |
| 1.0.1      | April 25th, 2008    | jaredc       | Evolution  |
| 1.0.0      | April 22nd, 2008    | jaredc       | Evolution  |
| 0.9g       | March 26th, 2008    | webe         | Evolution  |
| 0.9f       | January 17th, 2008  | jaredc       | Evolution  |
| 0.9e       | January 11th, 2008  | jaredc       | Evolution  |
| 0.9d       | July 12th, 2006     | jaredc       | Evolution  |
| 0.91       | July 10th, 2006     | tillda       | Evolution  |
| 0.9c       | June 30th, 2006     | jaredc       | Evolution  |

### Загрузка

Пакет можно установить через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачать из репозитория MODX Extras: <https://modx.com/extras/package/breadcrumbs>

## Использование

Сниппет Breadcrumbs вызывают так:

``` php
[[Breadcrumbs]]
```

### Свойства Breadcrumbs

| Name                 | Description                                                                                                                                                                                                                                                                                                                                                                                                 | Default     |
| -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------- |
| crumbSeparator       | Разделитель между крошками.                                                                                                                                                                                                                                                                                                                                                                                 | »           |
| currentAsLink        | Делать ли текущую страницу ссылкой (на саму себя): `1` для да, `0` для нет (без кавычек)                                                                                                                                                                                                                                                                                                                        | 1           |
| descField            | Поле страницы для описания крошки. По умолчанию description. Если description пуст, используется pagetitle.                                                                                                                                                                                                                                                                                                 | description |
| homeCrumbDescription | Пользовательское описание ссылки на главную. По умолчанию совпадает с заголовком главной.                                                                                                                                                                                                                                                                                                                   | Home        |
| homeCrumbTitle       | Текст ссылки на главную, если нужно другое название.                                                                                                                                                                                                                                                                                                                                                        | Home        |
| maxCrumbs            | Максимум элементов в пути. 100 это условно большое число. При меньшем значении, например 2, при глубине 5 цепочка будет: Home > ... > Level 4 > Level 5. «Home» и текущая страница в лимит не входят. Каждый из них настраивается отдельно.                                                                                                      | 100         |
| maxDelimiter         | Строка при превышении максимального числа крошек.                                                                                                                                                                                                                                                                                                                                                           | ...         |
| pathThruUnPub        | Если путь проходит через неопубликованную папку, при true показываются все ресурсы пути, кроме неопубликованной. Пример (неопубликованный в CAPS): home > news > CURRENT > SPORTS > skiiing > article. При $pathThruUnPub = true: home > news > skiiing > article. При $pathThruUnPub = false: home > skiiing > article (если включена крошка главной) | 1           |
| respectHidemenu      | При true скрывает в крошках элементы, помеченные как скрытые в меню.                                                                                                                                                                                                                                                                                                                                         | 1           |
| showCrumbsAtHome     | Показывать ли крошки на главной странице.                                                                                                                                                                                                                                                                                                                                                                    | 0           |
| showCurrentCrumb     | Показывать текущую страницу в цепочке.                                                                                                                                                                                                                                                                                                                                                                      | 1           |
| showHomeCrumb        | Начинать ли цепочку со ссылки на главную. Некоторые сайты не используют это, потому что ссылка на главную уже есть в логотипе или меню.                                                                                                                                                                                                                                                                    | 1           |
| titleField           | Поле страницы для заголовка крошки. По умолчанию pagetitle.                                                                                                                                                                                                                                                                                                                                                 | pagetitle   |

### Классы Breadcrumbs

Вывод это ненумерованный список с microdata (подробнее: <http://diveintohtml5.info/extensibility.html>). Стилизация через такие классы:

| Classname       | Description                                                                       |
| --------------- | --------------------------------------------------------------------------------- |
| B\_crumbBox     | Span вокруг всего вывода крошек                                                   |
| B\_hideCrumb    | Span вокруг «...», если крошек больше, чем показывается                           |
| B\_currentCrumb | Span или тег A вокруг текущей крошки                                              |
| B\_firstCrumb   | Span вокруг первой крошки, главной или нет                                       |
| B\_lastCrumb    | Span вокруг последней крошки, текущей или нет                                     |
| B\_crumb        | Класс каждого тега A промежуточных крошек (не главная и не скрытая)               |
| B\_homeCrumb    | Класс крошки главной                                                              |

## Примеры

Показать крошки с разделителем |.

``` php
[[Breadcrumbs? &crumbSeparator=`|`]]
```

В MODX Revolution 2.2 значение свойства &respectHidemenu нужно задавать как `0` или `1`, а не `true` или `false`. В других версиях это не проверялось, но на сайте с 2.2 свойство не срабатывало с `true` или `false`.
