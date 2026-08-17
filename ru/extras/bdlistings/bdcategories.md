---
title: "bdCategories"
description: "Сниппет динамического вывода категорий bdListings"
translation: "extras/bdlistings/bdcategories"
---

Сниппет bdCategories выводит динамический список категорий из компонента bdListings.

## Свойства сниппета

| Имя свойства     | Описание                                                                                       | Значение по умолчанию                                                         |
| ----------------- | ------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------- |
| limit             | Число категорий для вывода, по умолчанию 0 (все категории).                                  | 0                                                                     |
| offset            | Смещение категорий, по умолчанию 0 (с первой).                             | 0                                                                     |
| sortby            | \[ name                                                                                           | description                                                           | parent | sortorder \] Поле сортировки. | sortorder |
| sortdir           | \[ asc                                                                                            | desc \] Направление сортировки                                                | asc    |
| parent            | ID категории для вывода подкатегорий. По умолчанию 0 (верхний уровень).                          | 0                                                                     |
| includeSub        | \[ 1                                                                                              | 0 \] При 1 также включаются подкатегории (только если parent = 0) | 1      |
| subSeparator      | Разделитель между отдельными подкатегориями.                                               | - (пробел дефис пробел)                                                  |
| categorySeparator | Разделитель между отдельными категориями.                                                   | перевод строки (\\n)                                                      |
| tplCategory       | Чанк (имя) для вывода категорий. У подкатегорий свой шаблон. |

Плейсхолдеры:

- id (ID категории)
- name
- description
- parent (ID или 0)
- subcategories (все подкатегории текущего объекта категории)
  Файл по умолчанию: core / components / bdlistings / elements / chunks / bdCategories.category.tpl:

``` php
<h3>[[+name]]</h3>
<p>[[+description]]</p>
[[+subcategories]]
```

`tplInner`. имя чанка для обёртки всех подкатегорий. Результат попадает в плейсхолдер subcategories в чанке tplCategory. Подходит для `<optgroup>` или дополнительной разметки подкатегорий.
Плейсхолдеры:

- subcategories (все подкатегории, разделённые значением subSeparator)
  Файл по умолчанию: core / components / bdlistings / elements / chunks / `bdCategories.inner.tpl`:

``` php
<p>Subcategories: [[+subcategories]]</p>
```

`tplOuter`. чанк для обёртки всех категорий. Его значение возвращает сниппет.
Плейсхолдеры:

- wrapper (все категории, разделённые значением categorySeparator)
  Файл по умолчанию: core / components / bdlistings / elements / chunks / bdCategories.outer.tpl:

``` php
<h2>Categories</h2>
[[+wrapper]]
```

`tplSub`. чанк для вывода подкатегорий.
Плейсхолдеры:

- id (ID категории)
- name
- description
- parent (ID родителя)
  Файл по умолчанию: core / components / bdlistings / elements / chunks / bdCategories.outer.tpl:

``` php
<a title="[[+description:htmlentities]]">[[+name]]</a>
```

## Примеры

### Минимальный вызов

`[[!bdCategories]]`

Структура категорий

- Different
- Something
    - Something - Sub Category

Итоговый HTML с шаблонами по умолчанию:

``` php
<h2>Categories</h2>
<h3>Different</h3>
<p></p>

<h3>Something</h3>
<p>sdfasdf?</p>
<p>Subcategories: <a title="">Something - Sub Category</a></p>
```

### Выпадающий список категорий

Вызов сниппета:

`[[!bdCategories? &tplCategory=`bdl.cat.cat` &tplSub=`bdl.cat.sub` &tplInner=`bdl.cat.inner` &tplOuter=`bdl.cat.outer` &subSeparator=`` &includeSub=`1` ]]`

Чанк bdl.cat.cat:

``` php
<option value="[[+id]]">[[+name]]</option>
[[+subcategories]]
```

Чанк bdl.cat.sub:

``` php
<option value="[[+id]]">- [[+name]]</option>
```

Чанк bdl.cat.inner:

``` php
[[+subcategories]]
```

Чанк bdl.cat.outer:

``` php
<select name="category">
  [[+wrapper]]
</select>
```

Возможный HTML (зависит от вашей структуры категорий):

``` php
<select name="category">
  <option value="1">Clowns</option>
    <option value="2">- Friendly Clowns</option>
    <option value="3">- Halloween Clowns</option>
  <option value="4">Animals</option>
    <option value="5">- Horse Riding</option>
    <option value="6">- Alpacas</option>
  <option value="8">Kino</option>
</select>
```
