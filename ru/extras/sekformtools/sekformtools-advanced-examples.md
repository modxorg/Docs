---
title: "sekFormTools Advanced Examples"
description: "Связанные combo box и автодополнение в sekFormTools"
translation: "extras/sekformtools/sekformtools-advanced-examples"
---

## Примеры связки combo box и автодополнения

Лучший пример возможностей: быстро собрать combo box, фильтруемый другим combo box, или автодополнение, зависящее от другого поля. В примере ниже combo box стран фильтрует combo box штатов. При выборе штата автодополнение города дополнительно фильтруется по значению поля штата.

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`United States`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "country_name", "label": "country_name"}`
]]

<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "country_name", "value": "United States"}`
]]

<label for="ftcity">City</label>
[[!input.autocomplete? &input_id=`ftcity`
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"input_id": "ftstate", "name": "sekftStates", "field": "state_name"}`
]]
```

### Первый шаг

Не обязательно, но лучше задать input_id для всех полей. Здесь input\_id равен «ftcountry». Это понадобится дальше. Главное поле. «object» как JSON-строка с данными таблицы. Здесь value и label совпадают с country\_name, поэтому &value равен «United States». Если object->value был бы «id», &value был бы «244».

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`United States`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "country_name", "label": "country_name"}`
]]
```

### Второй шаг

Снова задайте input_id, для штата это «ftstate». Свойство object задаётся так же. Отличие от страны. свойство filter. Filter выполняет две роли и сейчас работает только между двумя combo box или отдельно. В дочернем поле filter задают в JSON.

``` php
<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "country_name", "value": "United States"}`
]]
```

Здесь фильтрация идёт от другого combo box («ftcountry»). Для фильтра только при загрузке страницы не задавайте filter->input\_id. sekFormTools использует связи xPDO, поэтому фильтрация одной таблицы через другую проста. filter->name указывает объект «sekftCountries». filter->field задаёт поле фильтра. Так как у «ftcountry» значение по умолчанию «United States», в filter->value передаётся «United States».

При смене страны на «Canada» значение «Canada» уходит в helper resource вместе с object и filter. Helper берёт объект «sekftCountries», находит связь с «sekftStates» и возвращает отфильтрованный список. Это удобно, если вместо полного имени нужен формат «isoa\_two»:

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`US`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "isoa_two", "label": "country_name"}`
]]

<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "isoa_two", "value": "US"}`
]]
```

Так value можно использовать как угодно.

### Третий шаг

У автодополнения многие свойства совпадают с combo box и работают похоже. Object обязателен. Здесь автодополнение дополнительно фильтруется по выбору в combo box «ftstate». Снова используются связи xPDO для сужения таблицы при поиске по city\_name:

``` php
<label for="ftcity">City</label>
[[!input.autocomplete? &input_id=`ftcity`
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"input_id": "ftstate", "name": "sekftStates", "field": "state_name"}`
]]
```
