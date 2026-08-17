---
title: "bdTargets"
description: "Сниппет вывода целевых групп bdListings"
translation: "extras/bdlistings/bdtargets"
---

bdTargets это простой сниппет для вывода целевых групп.

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
<h2>Target Groups</h2>
<ul>
    [[+wrapper]]
</ul>
```

Плейсхолдеры:

- wrapper
`tplRow`. имя чанка для отдельной целевой группы.
Default:

``` php
<li>[[+name]]</li>
```

Плейсхолдеры:

- id
- name
- sortorder

## Примеры

Минимальный вызов:

``` php
[[!bdTargets]]
```

Результат (зависит от ваших данных):

``` php
<h2>Target Groups</h2>
<ul>
  <li>Under 5</li>
  <li>From 15 to 18</li>
  <li>From 10 to 15</li>
  <li>From 5 to 10</li>
</ul>
```

### Вывод в виде select

Вызов сниппета:

``` php
<label for="target">Target Group</label>
[[!bdTargets? &tplRow=`bdl.target.row` &tplOuter=`bdl.target.outer`]]
```

bdl.target.row:

``` php
<option value="[[+id]]">[[+name]]</option>
```

bdl.target.outer:

``` php
<select name="target">
  <option value="0">Choose a Target Group</option>
  [[+wrapper]]
</select>
```
