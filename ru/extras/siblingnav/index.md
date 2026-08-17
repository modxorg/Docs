---
title: "siblingNav"
description: "Сниппет для навигации между sibling-ресурсами"
translation: "extras/siblingnav/index"
---

## Что такое siblingNav?

siblingNav это сниппет для MODX Revolution, который строит навигацию между sibling-ресурсами.

siblingNav впервые вышел 10 ноября 2011 года. Автор Bruno Perner для [BD Creative](http://www.bdcreative.de/).

## Требования

siblingNav создан как сниппет Revolution и должен работать на всех версиях с 2.0.0.

## Загрузка и установка

Установите siblingNav через Package Management.

## Использование siblingNav

## Свойства siblingNav

| PROPERTY          | DEFAULT                          | DESCRIPTION                                            |
| ----------------- | -------------------------------- | ------------------------------------------------------ |
| rowTpl            | snrow                            | chunk for siblings                                     |
| selfTpl           | snself                           | chunk for active row                                   |
| prevTpl           | snprev                           | chunk for previous-link                                |
| nextTpl           | snnext                           | chunk for next-link                                    |
| firstTpl          | snfirst                          | chunk for link to first resource                       |
| lastTpl           | snlast                           | chunk for link to last resource                        |
| placeholderPrefix | sn.                              | example: `[[+sn.next]]`                                |
| id                | modx-recource-id                 | the resourceid from where to get the siblings          |
| parents           | false                            | commaseperated, get siblings from more than one parent |
| showDeleted       | 0                                |                                                        |
| showUnpublished   | 0                                |                                                        |
| showHidden        | 0                                |                                                        |
| sortBy            | `{"menuindex":"ASC","id":"ASC"}` | JSON-string with resource-fields for sorting           |
| limit             | false                            |                                                        |

Файлы чанков по умолчанию: <https://github.com/Bruno17/siblingnav/tree/master/core/components/siblingnav/elements/chunks>

## Примеры

Минимальный вызов для навигации по всем siblings:

``` php
[[!siblingNav]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]
```

Расширенные вызовы с parents и навигацией между дочерними ресурсами нескольких parents:

``` php
[[!siblingNav? &limit=`7` &id=`[[*parent]]` &placeholderPrefix=`snparent.`]]
[[+snparent.prev]][[+snparent.prevlinks]][[+snparent.self]][[+snparent.nextlinks]][[+snparent.next]]

[[!siblingNav? &limit=`9` &parents=`29,261`]]
[[+sn.first]][[+sn.prev]][[+sn.prevlinks]][[+sn.self]][[+sn.nextlinks]][[+sn.next]][[+sn.last]]
```

В parent-ресурсах используйте firstChildRedirect.

## Внешние источники

Github repository: <https://github.com/Bruno17/siblingnav>
