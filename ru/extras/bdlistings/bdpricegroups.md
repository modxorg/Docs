---
title: "bdPriceGroups"
description: "Сниппет вывода ценовых групп bdListings"
translation: "extras/bdlistings/bdpricegroups"
---

bdPriceGroups это простой сниппет для вывода ценовых групп.

## Свойства сниппета

| Имя свойства | Описание | Значение по умолчанию |
| ------------- | ----------------------------------------------- | ------------- |
| limit         | Ограничение числа результатов.                    | 0             |
| offset        | Смещение начала выборки.                             | 0             |
| sortby        | Поле сортировки: sortorder, id или name. | sortorder     |
| sortdir       | Направление сортировки: asc или desc.       | asc           |
| rowSeparator  | Разделитель между элементами rowTpl.             | \\n           |
| tplOuter      | Имя чанка для обёртки всего результата.   |
Default:

``` php
<h2>Price Groups</h2>
<ul>
    [[+wrapper]]
</ul>
```

Плейсхолдеры:

- wrapper |  |
| tplRow | Имя чанка для отдельной ценовой группы.
Default:

``` php
<li>[[+display]]</li>
```

Плейсхолдеры:

- id
- display
- sortorder |  |

## Примеры

Минимальный вызов:

``` php
[[!bdPriceGroups]]
```

Результат (зависит от ваших данных):

``` php
<h2>Price Groups</h2>
<ul>
  <li>Cheap</li>
  <li>Good Value</li>
  <li>Exact Budget</li>
  <li>Too frick'n expensive</li>
</ul>
```

### Вывод в виде select

Вызов сниппета:

``` php
<label for="pricegroup">Price Group</label>
[[!bdTargets? &tplRow=`bdl.pricegroup.row` &tplOuter=`bdl.pricegroup.outer`]]
```

bdl.pricegroup.row:

``` php
<option value="[[+id]]">[[+display]]</option>
```

bdl.pricegroup.outer:

``` php
<select name="pricegroup">
  <option value="0">Choose a Price Group</option>
  [[+wrapper]]
</select>
```
