---
title: "renderResources"
description: "Универсальный сниппет MODX для вывода коллекции ресурсов"
translation: "extras/renderresources/index"
---

## What is renderResources

Универсальный сниппет для вывода коллекции ресурсов.

## Requirements

- MODX Revolution 2.1.0 или новее
- PHP 5.1.2 или новее

## History

renderResources написал Jason Coward (opengeek), релиз 19 марта 2012 года. [Разработка и баги на Github](https://github.com/opengeek/renderResources).

### Download

Скачайте через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из MODX Extras Repository: <https://modx.com/extras/package/renderresources>

Это не замена Ditto, а альтернативный компонент для части задач специализированных компонентов: Ditto, Wayfinder, Breadcrumbs. По сути всё, что выводит свойства списка ресурсов (ранее Documents в MODX Evolution).

## Usage

Сниппет renderResources вызывают так:

``` php
[[renderResources]]
```

Без свойства &tpl выводится результат каждого ресурса напрямую.

renderResources нельзя использовать с бинарными Content Types или с ресурсами modSymLink и modWebLink. Они автоматически исключаются из выборки.

### Available Properties

#### Templating Properties

| Name                   | Description                                                                                                                                | Default Value |
| ---------------------- | ------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| tpl                    | Имя чанка-обёртки для вывода ресурса. Без него вывод ресурса возвращается напрямую.   |               |
| tplOdd                 | Имя чанка для ресурсов с нечётным idx (см. idx)                                       |               |
| tplFirst               | Имя чанка для первого ресурса                                                                       |               |
| tplLast                | Имя чанка для последнего ресурса                                                                        |               |
| tpl\_N                 | Имя чанка для N-го ресурса, например &tpl\_4=`tpl4th`                                           |               |
| tpl\_nN                | Имя чанка для каждого N-го ресурса, например &tpl\_n4=`tpl4th` для каждого кратного 4 |               |
| outputSeparator        | Необязательная строка-разделитель между экземплярами tpl                                                                                           | "\\n"         |
| toPlaceholder          | Если задано, результат помещается в этот плейсхолдер вместо прямого вывода.                                                      |               |
| toSeparatePlaceholders | Если задано, каждый результат в отдельный плейсхолдер с этим именем и порядковым номером (с 0).         |               |

#### Selection Properties

| Name          | Description                                                                                                                                                         |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| parents       | Список id родителей через запятую. -1 игнорирует parents при указании _resources_. Default Value: current Resource id                 |
| resources     | Список id для включения. Префикс "-" исключает ресурс.                                            |
| depth         | Глубина поиска ресурсов от каждого родителя. Default Value: 10                                                                          |
| publishedon   |                                                                                                                                                                     |
| sortbyAlias   | Query alias для поля sortby                                                                                                                                        |
| sortbyEscaped | Экранирует имя поля в sortby                                                                                                                          |
| sortdir       | Направление сортировки. Default Value: DESC                                                                                                                         |
| sortbyTV      | Template Variable для сортировки                                                                                                                                        |
| sortdirTV     | Направление сортировки при sortbyTV. Default Value: DESC                                                                                                     |
| sortbyTVType  | Тип данных sortby TV: string, integer, decimal, datetime. Default Value: string                                               |
| limit         | Лимит числа ресурсов. Default Value: 5                                                                                                           |
| offset        | Смещение ресурсов в результате. Default Value: 0                                                                                           |
| where         | JSON-выражение дополнительных where-условий. Пример ниже. См. [xpdoquery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where) |
| context       | Контекст для поиска. По умолчанию текущий Context.                                                                                               |

#### tvFilters

Фильтрация ресурсов по значениям TV. Формат \[(_tvname_)(_operator_)\](_value_). Два разделителя для комбинации условий.

"OR" через два символа pipe. OR выбирает ресурсы с одним из указанных значений TV.

``` php
mytv==somevalue||mytv==othervalue
```

"AND" через запятую. Все условия должны выполняться.

``` php
mytv==somevalue,othertv==othervalue
```

Для сложной фильтрации можно группировать. Сначала разделение по OR (||), затем по AND (,). Пример:

``` php
mytv==foo||mytv==bar,bartv==3||bartv==1
```

Фильтр ресурсов по одному из условий:

- mytv LIKE foo, или:
- mytv LIKE bar AND bartv LIKE 3, или:
- bartv LIKE 1
  Примеры выше ищут точные значения. Можно использовать % как wildcard. Например:

``` php
mytv==%a%
```

Ресурсы с "a" в значении mytv.

``` php
mytv==a%
```

Значение mytv начинается с a.

``` php
mytv==%a
```

Значение mytv заканчивается на a.

Комбинируйте с OR (||) и AND (,).

Функция **смотрит на сырое значение TV** конкретного ресурса. Значение **явно задано для ресурса** и **не обработано output type TV**. Для "autotag" tv сырое значение это список через запятую, не теги как в менеджере.

**Available filter operators**:

Операторы сравнения для условий фильтра. При многих операторах числовые значения автоматически приводят TV к numeric перед сравнением. Список операторов:

| Filter Operator |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | SQL Operator |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| !==             | !=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| <>              | <>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| ==              | LIKE                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | No           |
| !=              | NOT LIKE                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    | No           |
| <<              | <                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           | Yes          |
| <=              | <=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| =<              | =<                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| >>              | >                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           | Yes          |
| >=              | >=                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| =>              | =>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | Yes          |
| sortby          | [Any Resource Field](making-sites-with-modx/structuring-your-site/resources#Resources-ResourcesResourceFields) (кроме Template Variables) для сортировки. Частые поля: publishedon, menuindex, pagetitle и др., см. документацию Resources. Указывайте только имя поля, не tag syntax. При sortby template, publishedby и т.п. сортировка по raw значениям, ID шаблона или пользователя, не по именам. |              |

Случайная сортировка через RAND():

``` php
&sortby=`RAND()`
```

Или [JSON](http://json-schema.org/) массив для нескольких полей:

``` php
&sortby=`{"publishedon":"ASC","createdon":"DESC"}`
```

Сортировка в заданном порядке по списку id:

``` php
&sortby=`FIELD(modResource.id, 4,7,2,5,1 )`
```

То же с ID в template variable:

``` php
&sortby=`FIELD(modResource.id,[[*templateVariable]])`
```

#### Other Properties

| Name            | Description                                                                                                                                                   | Default Value |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| showUnpublished | Если true, показывает неопубликованные ресурсы.                                                                                                    | 0             |
| showDeleted     | Если true, показывает удалённые ресурсы.                                                                                             | 0             |
| showHidden      | Если true, показывает ресурсы, скрытые в меню.                                                                                    | 0             |
| hideContainers  | Если задано, не показывает ресурсы-контейнеры (is\_folder).                                                                                       | 0             |
| idx             | Начальный idx ресурсов, увеличивается при каждом рендере                                       | 1             |
| first           | idx первого ресурса                                                                                                            | 1             |
| last            | idx последнего ресурса. По умолчанию число ресурсов + first - 1                                                     |               |
| totalVar        | Ключ плейсхолдера с общим числом ресурсов **без** учёта _limit_. | total         |
| debug           | Если true, SQL-запрос пишется в MODX log.                                                                                                             | false         |

## Examples

Список дочерних ресурсов текущего ресурса через чанк 'myRowTpl':

``` php
[[!renderResources?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
]]
```

Все ресурсы под ID '5', кроме 10, через 'myRowTpl':

``` php
[[!renderResources?
    &parents=`5`
    &resources=`-10`
    &tpl=`myRowTpl`
]]
```

Только указанные ресурсы через 'myRowTpl':

``` php
[[!renderResources?
    &parents=`-1`
    &resources=`10,11,12`
    &tpl=`myRowTpl`
]]
```

Топ 5 последних опубликованных ресурсов под ID '5', tpl 'blogPost':

``` php
[[!renderResources?
    &parents=`5`
    &limit=`5`
    &tpl=`blogPost`
    &includeContent=`1`
]]
```

Дочерние ресурсы текущего по шаблону ресурса:

``` php
[[!renderResources?
    &parents=`[[*id]]`
    &where=`{"template:=":8}`
    &tpl=`myRowTpl`
]]
```

Дочерние ресурсы, template ID 1 или 2:

``` php
[[!renderResources?
    &parents=`[[*id]]`
    &where=`{"template:=":1, "OR:template:=":2}`
    &tpl=`myRowTpl`
]]
```

Дочерние ресурсы, template ID 1, 2 или 3 (один ключ нельзя повторять):

``` php
[[!renderResources?
    &parents=`[[*id]]`
    &where=`{"template:IN":[1,2,3]}`
    &tpl=`myRowTpl`
]]
```

Сообщение при пустом результате (аналог "empty" в Ditto):

``` php
[[!renderResources:default=`No results found`?
    &parents=`[[*id]]`
    &tpl=`myRowTpl`
]]
```

## Using getPage for Pagination

С [getPage](extras/getpage "getPage") renderResources даёт гибкую пагинацию.

### Examples

Первые 10 ресурсов по publishedon под ID 17, глубина 2, tpl 'blogListPost', с TV и content:

``` php
[[!getPage?
   &elementClass=`modSnippet`
   &element=`renderResources`

   &parents=`17`
   &depth=`2`
   &limit=`10`
   &pageVarKey=`page`

   &tpl=`blogListPost`
]]
<div class="paging">
<ul class="pageList">
  [[!+page.nav]]
</ul>
</div>
```

и чанк blogListPost:

``` php
<div class="blogPost">
  [[+output]]
  <div class="clear"></div>
</div>
<hr/>
```

## Troubleshooting

**Ничего не выводится!** Установлен ли **renderResources**?

## See Also

Для свойств ресурсов, а не полного вывода, используйте [getResources](extras/getresources "getResources").
Для одного поля чужого ресурса попробуйте [getResourceField](extras/getresourcefield "getResourceField").
