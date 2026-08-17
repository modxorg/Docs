---
title: "Управление ресурсами-событиями в CMP с помощью MIGXdb"
description: "CMP для событий как дочерних ресурсов: конфигурация, TV, фильтры и пункт меню"
translation: "extras/migxdb/migxdb.tutorials/manage-events-resources-in-a-cmp-with-help-of-migxdb"
---

Когда в дереве ресурсов слишком много записей, управлять ими неудобно. Хочется постраничную сетку.

В этом учебнике вы создадите CMP (custom manager page), где можно управлять событиями как дочерними ресурсами папки.

## Требования

1. Установите [MIGX](extras/migx) через Package Management, если ещё не установлен, и выполните [базовую настройку MIGXdb](extras/migxdb/migxdb.configuration). Минимальная версия MIGX: 2.3.2 (10.09.2012).

2. Скачайте пакет [migxchildresources](https://github.com/Bruno17/migxchildresources/tree/master/packages) с GitHub и установите его.

3. Переименуйте папку `core/components/migxchildresources/` в `core/components/migxresourceevents/`.

## Создание конфигурации

Создайте конфигурацию для MIGXdb-TV.

Откройте главную вкладку **MIGX**

Должна быть сетка с кнопками.

Нажмите **Add item**

В открывшемся окне укажите:

Name: events. Это имя конфигурации. Используйте уникальные имена.
"Add Item" Replacement: Add Event. Это текст кнопки «Add Item».
unique MIGX ID: events. Уникальный MIGX ID для всех конфигураций MIGX.

Нажмите **Done**

В сетке появится новая запись.
Можно править её через «edit», но быстрее импортировать пример конфигурации.

Правый клик по записи -> **Export/Import**

Вставьте код в поле «Json» :

``` json
{
  "formtabs": "[{\"MIGX_id\":\"1\",\"caption\":\"Event\",\"fields\":\"[{\\\"MIGX_id\\\":\\\"1\\\",\\\"field\\\":\\\"pagetitle\\\",\\\"caption\\\":\\\"Pagetitle\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"7\\\",\\\"field\\\":\\\"location\\\",\\\"caption\\\":\\\"Location\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"3\\\",\\\"field\\\":\\\"eventstart\\\",\\\"caption\\\":\\\"Start\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"date\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"4\\\",\\\"field\\\":\\\"eventend\\\",\\\"caption\\\":\\\"End\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"date\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"5\\\",\\\"field\\\":\\\"template\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"6\\\"},{\\\"MIGX_id\\\":\\\"2\\\",\\\"field\\\":\\\"parent\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"25\\\"},{\\\"MIGX_id\\\":\\\"6\\\",\\\"field\\\":\\\"context_key\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"web\\\"}]\"},{\"MIGX_id\":\"2\",\"caption\":\"Content\",\"fields\":\"[{\\\"MIGX_id\\\":\\\"1\\\",\\\"field\\\":\\\"content\\\",\\\"caption\\\":\\\"Content\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"richtext\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"}]\"}]",
  "contextmenus": "",
  "actionbuttons": "addItem||toggletrash",
  "columnbuttons": "update||publish||unpublish||recall_remove_delete",
  "filters": "[{\"MIGX_id\":\"1\",\"name\":\"eventsfilter\",\"label\":\"eventsfilter\",\"emptytext\":\"-- Filter Events --\",\"type\":\"combobox\",\"getlistwhere\":\"[[migxFilterevents]]\",\"getcomboprocessor\":\"getTVcombo\",\"combotextfield\":\"eventsfiltercombo\",\"comboidfield\":\"\",\"comboparent\":\"\"}]",
  "extended": {
    "migx_add": "Create Event",
    "formcaption": "Event",
    "win_id": "events",
    "multiple_formtabs": "",
    "packageName": "migxresourceevents",
    "classname": "modResource",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": "1",
    "check_resid": "1",
    "check_resid_TV": "",
    "join_alias": "",
    "getlistwhere": "{\"parent\":\"25\"}",
    "joins": "",
    "cmpmaincaption": "Events",
    "cmptabcaption": "Events",
    "cmptabdescription": "Manage your events here",
    "cmptabcontroller": ""
  },
  "columns": "[{\"MIGX_id\":\"1\",\"header\":\"ID\",\"dataIndex\":\"id\",\"width\":\"10\",\"renderer\":\"\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"2\",\"header\":\"Pagetitle\",\"dataIndex\":\"pagetitle\",\"width\":\"30\",\"renderer\":\"this.renderRowActions\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"7\",\"header\":\"Location\",\"dataIndex\":\"location\",\"width\":\"20\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"5\",\"header\":\"Start\",\"dataIndex\":\"eventstart\",\"width\":\"20\",\"renderer\":\"this.renderDate\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"6\",\"header\":\"End\",\"dataIndex\":\"eventend\",\"width\":\"20\",\"renderer\":\"this.renderDate\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"4\",\"header\":\"Published\",\"dataIndex\":\"published\",\"width\":\"10\",\"renderer\":\"this.renderCrossTick\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"3\",\"header\":\"\",\"dataIndex\":\"deleted\",\"width\":\"\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"0\"}]"
}
```

Нажмите **done**. Проверьте: правый клик -> «edit», пройдите по вкладкам и вложенным сеткам.

## Создание родительского ресурса для событий

Создайте ресурс, который станет родителем всех событий.

Не забудьте указать id ресурса в getlist-where в менеджере MIGX
вкладка: **MIGXdb-settings**
поле where:

``` json
{"parent":"XX"}
```

## Создание TV для событий

Создайте два date-TV с именами: **eventstart** и **eventend**
Создайте text-TV с именем: **location**

## Шаблон для событий

Создайте шаблон с базовым содержимым и разместите плейсхолдеры:

``` php
[[*eventstart]],[[*eventend]],[[*location]],[[*pagetitle]],[[*content]]
```

Привяжите все TV к этому шаблону.

## Шаблон для событий в конфигурации

Все события должны использовать шаблон выше. Значение шаблона задаётся скрытым полем в форме.
Шаги:

1. Правый клик по записи events в сетке конфигуратора MIGX -> **Edit**
2. Вкладка **formtabs**
3. Правый клик по **Event** -> **Edit**
4. Правый клик по **template** -> **Edit**
5. Вкладка **Input Options**, в Default-Value укажите ID шаблона событий.
6. Нажмите done

То же для parent (ID родительского ресурса как default-value) и `context_key`, если нужен контекст не **web**

Закройте окна через *Done*

## Регистрация TV для процессоров (getlist, fields)

Зарегистрируйте TV для процессоров getlist и fields.
Создайте конфиг-файл в `/core/components/migx/configs/`

с именем конфигурации MIGX: events.config.inc.php (обычно уже есть в пакете MIGX) с содержимым:

>core/components/migxresourceevents/migxconfigs/events.config.inc.php

``` php
<?php
$this->customconfigs['includeTVs'] = 1;
$this->customconfigs['includeTVList'] = 'eventstart,eventend,location';
```

Все TV, которые вы редактируете или показываете в сетке, должны быть в includeTVList.

## dropdown-TV для фильтра событий

Создайте TV:

- Name: **eventsfiltercombo**
- Type: **listbox**
- Input-option-values: `current||upcoming||expired`

## Сниппет для фильтра событий

Создайте сниппет:

Name: **migxFilterevents**
content:

``` php
$now = strftime('%Y-%m-%d %H:%M:%S');
switch ($_REQUEST['eventsfilter']){
    case 'current':
        return 'tvFilter::eventstart<='.$now.',eventend>='.$now;
    break;
    case 'upcoming':
        return 'tvFilter::eventstart>>'.$now;
    break;
    case 'expired':
        return 'tvFilter::eventend<<'.$now;
    break;
}
return '';
```

## Фильтры

Откройте конфигурацию events в управлении MIGX
Вкладка **DB-Filters**

### Dropdown для current, upcoming, expired

Этот фильтр уже создан конфигурацией выше

- filter Name: **eventsfilter**
- label: **eventsfilter**
- empty text: **- filter events -**
- filter type: **combobox**
- getlist-where:

``` php
[[migxFilterevents]]
```

- getcombo processor: **getTVcombo**
- getcombo textfield: eventsfiltercombo (процессор getTVcombo берёт input-options TV **eventsfiltercombo** для dropdown)

### Textbox для поиска по полям

Можно добавить дополнительные фильтры, например:

- filter Name: **search**
- label: **search**
- empty text: **search...**
- getlist-where:

``` php
{"pagetitle:LIKE":"%[[+search]]%","OR:longtitle:LIKE":"%[[+search]]%","OR:content:LIKE":"%[[+search]]%"}
```

Сохраните через «Done» во всех окнах

Теперь можно фильтровать дочерние ресурсы поиском и/или выбором current, upcoming, expired в dropdown

## Скрытие дочерних ресурсов в дереве

Скрыть дочерние ресурсы в дереве просто.

В конфигураторе MIGX добавьте поле на одну из formtabs:

- Fieldname: `show_in_tree`
- Caption: **Show in Tree**
- inputTVtype: **listbox**
- inputOptionValues: `no==0||yes==1`

Статус поля можно показать в сетке новой колонкой:

- Header: **Show in Tree**
- Field: `show_in_tree`
- width: **20**
- Renderer: `this.RenderCrossTick`

## Создание пункта меню для CMP

Меню **System -> Actions**

menu-tree: Components -> MIGX -> правый клик -> Place Action here

- Lexicon-key: **Events Manager**
- Action: `migx-index`
- parameters `&configs=events`

Нажмите *save*

Базовое управление событиями готово и покрывает начальные задачи.
Его легко расширить под ваши нужды.
