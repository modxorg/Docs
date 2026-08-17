---
title: "sekFormTools.input.combobox"
description: "Сниппет combo box sekFormTools"
translation: "extras/sekformtools/sekformtools.input.combobox"
---

## Что такое input.combobox?

Этот сниппет быстро добавляет combo box в форму.

## Использование

Пример input.combobox со списком value_list:

``` php
[[input.combobox? &value_list=`[{ "value": "r", "label": "Red" }, { "value": "b", "label": "Blue" }]`]]
```

Пример input.combobox с object:

``` php
[[input.combobox? &object=`[{"name": "sekftStates", "sortby": "state_name", "value": "state_abbr", "label": "state_name"}]`]]
```

## Свойства

| Имя             | Описание                                                                                       | По умолчанию | Обязательно | Версия |
| ---------------- | ------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| `input_id`       | ID поля ввода. Лучше задавать для всех полей. |         |          | >0.0.1  |
| `name`           | Имя поля ввода.                                                              |         |          | >0.0.1  |
| `value`          | Значение поля ввода.                                                             |         |          | >0.0.1  |
| `object`         | JSON-массив опций для списка combobox.                                                  |         |          | >0.0.1  |
| `snippet`        | Вызов сниппета для пользовательского JSON-списка.                                                      |         |          | >0.0.1  |
| `value_list`     | Пользовательский список для combobox.                                                            |         |          | >0.0.1  |
| `filter`         | JSON-массив для фильтрации списка combo.                                                              |         |          | >0.0.1  |
| `helper_snippet` | Имя сниппета для ajax-запроса смены списка опций.                                |         |          | >0.0.1  |

### object

Свойство object задаёт опции combo box из таблицы MODX.

| Имя    | Описание                                                                                        | По умолчанию | Обязательно | Версия |
| ------- | -------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| name    | Имя таблицы MODX по имени объекта.                                              |         | Yes      | >0.0.1  |
| sortby  | Поле таблицы для сортировки.                                                                        |         |          | >0.0.1  |
| groupby | Группировка значений (часто когда value и label совпадают). |         |          | >0.0.4  |
| value   | Поле таблицы как value опции.                                     |         | Yes      | >0.0.1  |
| label   | Поле таблицы как label опции.                                     |         | Yes      | >0.0.1  |

### filter

Свойство filter фильтрует данные, возвращаемые object.

| Имя      | Описание                                                             | По умолчанию | Обязательно | Версия |
| --------- | ----------------------------------------------------------------------- | ------- | -------- | ------- |
| input\_id | ID поля, которое динамически меняет список опций. |         |          | >0.0.1  |
| name      | Имя объекта для фильтра.                                      |         |          | >0.0.1  |
| field     | Поле для фильтрации результатов.                      |         | Yes      | >0.0.1  |
| value     | Значение фильтра.                                                 |         |          | >0.0.1  |

## Примеры

### Value List

Самый простой способ быстро собрать combo box.

``` php
[[!input.combobox? &value_list=`[
{ "value": "101", "label": "Regular" },
{ "value": "102", "label": "Chocolate" },
{ "value": "103", "label": "Blueberry" },
{ "value": "104", "label": "Devil's Food"}
]`
]]
```

### Object

Данные из объекта таблицы задаются JSON: имя объекта, необязательная сортировка, поля label и value.

``` php
[[!input.combobox?
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
]]
```

Данные можно отфильтровать через filter. Здесь нужны все города со state_id 62, то есть Kansas.

``` php
[[!input.combobox?
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"field": "state_id", "value": "62"}`
]]
```

Combo box можно фильтровать связями xPDO. filter->name указывает таблицу штатов. Поле фильтра. аббревиатура, значение «KS». xPDO находит связь между таблицами (id штатов и state\_id в таблице городов) и возвращает список по штату.

``` php
[[!input.combobox?
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"name": "sekftStates", "field": "state_abbr", "value": "KS"}`
]]
```

Combo box также фильтруют на лету через jquery. Подробнее в [Advanced Examples](extras/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples").

### Snippet

Для сложных фильтров можно вызвать пользовательский сниппет.

``` php
[[!input.combobox? &snippet=`xpdo`]]
```

Сниппет должен вернуть JSON-массив.

``` php
$items = $modx->getCollection('sekftStates');
$itemListArray = array();
foreach ($items as $item) {
    $itemArray = $item->toArray();
    $itemList = array();
    $itemList['value'] = $itemArray['id'];
    $itemList['label'] = $itemArray['state_name'];
    $itemListArray[] = $itemList;
}
return $modx->toJSON($itemListArray);
```

Большой список значений можно держать в массиве внутри сниппета.

``` php
[[!input.combobox? &snippet=`array`]]
```

Сниппет должен вернуть JSON-массив.

``` php
$itemListArray = array(
    array(
        'value' => '1',
        'label' => 'One'
    ),
    array(
        'value' => '2',
        'label' => 'Two'
    ),
    array(
        'value' => '3',
        'label' => 'Three'
    ),
    array(
        'value' => '4',
        'label' => 'Four'
    )
);
return $modx->toJSON($itemListArray);
```
