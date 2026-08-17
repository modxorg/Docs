---
title: "Создание базового управления галереей с нуля с помощью MIGXdb"
description: "Пошаговый учебник: схема БД, MIGXdb-TV и вывод изображений на фронтенде"
translation: "extras/migxdb/migxdb.tutorials/create-a-basic-gallery-management-from-scratch-with-migxdb"
---

В этом учебнике вы создадите своё управление галереей с помощью MIGXdb.
Сначала опишете схему БД и таблицы.
Затем настроите MIGXdb-TV для управления изображениями (записями БД).
Дальше создадите ресурсы (галереи) и добавите изображения через MIGXdb-TV.
В конце выведете изображения на фронтенде сниппетом.

## Требования

Установите [MIGX](extras/migx "MIGX") через Package Management и выполните [базовую настройку](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").

## Создание пакета и файла схемы

Откройте Components -> MIGX -> вкладку _Package Manager_.

В поле _packageName:_ укажите имя нового пакета. В примере используем `mygallery`.

Нажмите _Create Package_. Должен появиться каталог в core-path с пустым файлом схемы в нужном месте.

При `mygallery` в поле packageName заполните textarea _schema_.

Перейдите на вкладку _xml scheme_ и добавьте код:

### Схема

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="mygallery" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" version="1.1">
    <object class="myGallery" table="migx_gallery" extends="xPDOSimpleObject" >
        <field key="title" dbtype="varchar" precision="255" phptype="string" null="false" default="" index="index" />
        <field key="description" dbtype="text" phptype="string" index="fulltext" />
        <field key="resource_id" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
        <field key="resource_ids" dbtype="text" phptype="string" null="false" default="" />
        <field key="image" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
        <field key="extended" dbtype="text" phptype="json" null="false" default="" />
        <field key="pos" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="published" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="createdby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="createdon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="editedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="editedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="deleted" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="deletedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="deletedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="publishedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="publishedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <aggregate alias="Resource" class="modResource" local="resource_id" foreign="id" cardinality="one" owner="foreign" />
        <aggregate alias="Creator" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign" />
    </object>
</model>
```

Нажмите _Save Schema_, чтобы создать файл схемы. Проверьте через _Load Schema_.

[Подробнее о создании схем](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables "Defining a Schema")

### Parse Schema

Создайте xpdo-классы и maps из схемы: вкладка _Parse Schema_ -> _Parse Schema_.

### Create Table(s)

Создайте таблицы из схемы: вкладка _Create Tables_ -> _Create Tables_. Таблица должна появиться в БД.

На этом этапе в схеме определена одна таблица.

## Создание конфигурации

Создайте конфигурацию для MIGXdb-TV.

Откройте главную вкладку _MIGX_

Должна быть пустая сетка с кнопками.

Нажмите _Add item_

В открывшемся окне укажите:

- _Name_: `mygallery`. Имя конфигурации. Используйте уникальные имена.
- _Add Item Replacement_: `Add Image`. Текст кнопки «Add Item».
- _unique MIGX ID_: `mygallery`. Уникальный MIGX ID для всех конфигураций MIGX.

Нажмите _Done_

В сетке появится новая запись.
Можно править её через контекстное меню _edit_ и настраивать колонки и вкладки. Мы пойдём быстрее и импортируем пример конфигурации.

Щёлкните правой кнопкой по записи и выберите _Export/Import_

Вставьте код в поле _Json_ :

``` json
{
  "formtabs": [{
      "MIGX_id": 6,
      "caption": "Image",
      "print_before_tabs": "0",
      "fields": [{
          "MIGX_id": 14,
          "field": "title",
          "caption": "Title",
          "inputTV": "",
          "inputTVtype": "",
          "configs": "",
          "pos": 1
        },
        {
          "MIGX_id": 15,
          "field": "image",
          "caption": "Image",
          "description": "",
          "description_is_code": "0",
          "inputTV": "",
          "inputTVtype": "image",
          "validation": "",
          "configs": "",
          "restrictive_condition": "",
          "display": "",
          "sourceFrom": "config",
          "sources": "",
          "inputOptionValues": "",
          "default": "",
          "useDefaultIfEmpty": "0",
          "pos": 2
        },
        {
          "MIGX_id": 16,
          "field": "pos",
          "caption": "Position",
          "inputTV": "",
          "inputTVtype": "",
          "configs": "",
          "pos": 3
        }
      ],
      "pos": 1
    },
    {
      "MIGX_id": 7,
      "caption": "Description",
      "fields": [{
        "MIGX_id": 17,
        "field": "description",
        "caption": "Description",
        "inputTV": "",
        "inputTVtype": "textarea",
        "configs": "",
        "pos": 1
      }],
      "pos": 2
    }
  ],
  "contextmenus": "update||publish||unpublish||recall_remove_delete",
  "actionbuttons": "addItem||toggletrash",
  "columnbuttons": "",
  "filters": "",
  "extended": {
    "migx_add": "Add Image",
    "disable_add_item": "",
    "add_items_directly": "",
    "formcaption": "",
    "update_win_title": "",
    "win_id": "",
    "maxRecords": "",
    "addNewItemAt": "bottom",
    "media_source_id": "",
    "multiple_formtabs": "",
    "multiple_formtabs_label": "",
    "multiple_formtabs_field": "",
    "multiple_formtabs_optionstext": "",
    "multiple_formtabs_optionsvalue": "",
    "actionbuttonsperrow": 1,
    "winbuttonslist": "",
    "extrahandlers": "",
    "filtersperrow": 1,
    "packageName": "mygallery",
    "classname": "myGallery",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "sortconfig": "",
    "gridpagesize": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": 1,
    "check_resid": 1,
    "check_resid_TV": "",
    "join_alias": "Resource",
    "has_jointable": "no",
    "getlistwhere": "",
    "joins": "",
    "hooksnippets": "",
    "cmpmaincaption": "",
    "cmptabcaption": "",
    "cmptabdescription": "",
    "cmptabcontroller": "",
    "winbuttons": "",
    "onsubmitsuccess": "",
    "submitparams": ""
  },
  "columns": [{
      "MIGX_id": 1,
      "header": "ID",
      "dataIndex": "id",
      "renderer": "",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 2,
      "header": "Title",
      "dataIndex": "title",
      "renderer": "",
      "sortable": true,
      "show_in_grid": 1
    },
    {
      "MIGX_id": 3,
      "header": "image",
      "dataIndex": "image",
      "renderer": "this.renderImage",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 4,
      "header": "Published",
      "dataIndex": "published",
      "renderer": "this.renderCrossTick",
      "sortable": true,
      "show_in_grid": 1
    },
    {
      "MIGX_id": 5,
      "header": "Position",
      "dataIndex": "pos",
      "renderer": "",
      "sortable": true,
      "show_in_grid": 1
    },
    {
      "MIGX_id": 6,
      "header": "",
      "dataIndex": "deleted",
      "renderer": "",
      "sortable": "false",
      "show_in_grid": "0"
    }
  ],
  "category": ""
}
```

Нажмите _Done_.

Проверьте результат: правый клик по записи -> _edit_, пройдите по вкладкам и вложенным сеткам.

## Создание MIGXdb-TV

Создайте шаблон для страниц галереи.

Создайте MIGXdb-TV.

Создайте новый TV.

_Name_: `mygallery`

Вкладка: _Input Options_

_Input Type_: `migxdb`

В _Configurations_ добавьте: `mygallery`.

MIGX будет искать конфигурации с именем _mygallery_. Это могут быть записи конфигурации, как выше, или php-файлы, как в CMP конфигураций MIGX. CMP конфигураций MIGX сам по себе является MIGXdb-CMP.

Добавьте TV в шаблон галереи.

Нажмите _Save_.

## Добавление extended fields

Добавим URL к каждому изображению. Extended fields хранят дополнительные поля. Достаточно создать новое поле в форме.

Откройте _Components->MIGX_. Правый клик по конфигурации _mygallery_ -> _Edit_.

Вкладка _Formtabs_ -> _Add Item_.

_caption_: `Extended Fields`

В _Fields_ нажмите _Add Item_.

- _fieldname_: `extended.url`
- _Caption_: `URL`
- _inputTVtype_: `url`

Нажмите _Done_ -> _Done_ -> _Done_, чтобы сохранить изменения.

В окне управления галереей появится новая вкладка с полем URL.

## Создание галерей

Создайте контейнер «Galleries» в дереве ресурсов с шаблоном галереи.

Создайте ресурсы в этой папке с тем же шаблоном.

Нажмите _Load grid_. Загрузится сетка БД, где можно добавлять, редактировать и удалять записи с изображениями.

Записи автоматически привязываются к ресурсу через поле `resource_id`. В сетке видны только записи текущего ресурса.

## Добавление поля поиска в сетку

Откройте _Components->MIGX_
Правый клик по конфигурации _mygallery_ -> _Edit_.

Вкладка _db-filters_

Нажмите _Add Item_

- _filter name_: `search`
- _filter type_: `textbox`
- _getlist where_: `{"title:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}`

Нажмите _Done_ -> _Done_.

В сетке появится поле поиска для фильтрации элементов.

## Вывод изображений на фронтенде

Для вывода изображений на фронтенде используйте сниппет _migxLoopCollection_

Примеры:

``` php
[[!migxLoopCollection?
&packageName=`mygallery`
&classname=`myGallery`
&sortConfig=`[{"sortby":"pos","sortdir":"ASC"}]`
&where=`{"resource_id":"[[*id]]","published":"1"}`
]]
```

Выведет массив всех опубликованных изображений активного ресурса.

``` php
[[!migxLoopCollection?
  &packageName=`mygallery`
  &classname=`myGallery`
  &sortConfig=`[{"sortby":"RAND()"}]`
  &where=`{"resource_id":"[[*id]]","published":"1"}`
  &tpl=`@CODE:<img src="[[+image]]" />`
]]
```

Выведет все изображения в случайном порядке.
