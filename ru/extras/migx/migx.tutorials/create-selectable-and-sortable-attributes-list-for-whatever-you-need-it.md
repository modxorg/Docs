---
title: "MIGX: выбираемый и сортируемый список атрибутов"
translation: "extras/migx/migx.tutorials/create-selectable-and-sortable-attributes-list-for-whatever-you-need-it"
description: "Конструктор списка атрибутов в MIGX и выбор атрибутов на ресурсах продуктов"
---

## Выбираемый и сортируемый список атрибутов для любых задач

Допустим, у вас есть ресурсы-продукты. У каждого продукта разные атрибуты. У каждого атрибута должны быть заголовок и иконка.
Нужно место, где можно добавить сколько угодно атрибутов в общий список, и выбор из этого списка на ресурсах продуктов.
Также нужно добавлять индивидуальные дополнительные сведения для каждого выбранного атрибута и сортировать список перетаскиванием.

В этом уроке вы настроите MIGX как конструктор списка атрибутов с выбором на каждом ресурсе.

## Требования

Сначала установите [MIGX](extras/migx) через Менеджер пакетов и выполните [базовую настройку](extras/migxdb/migxdb.configuration).
Требуется версия 2.5.2 и новее.

## Создание конструктора атрибутов

1. Создайте новую TV

- name: `migx_attributes_builder`
    - Input Type: migx
    - formtabs:
  
``` json
[{
  "caption": "Attribute",
  "fields": [{
      "field": "attribute",
      "caption": "Attribute"
    },
    {
      "field": "title",
      "caption": "Title"
    },
    {
      "field": "icon",
      "caption": "Icon",
      "inputTVtype": "image"
    }
  ]
}]
```

- grid columns:

``` json
[{
    "header": "Attribute",
    "width": "50",
    "sortable": "true",
    "dataIndex": "attribute"
  },
  {
    "header": "Title",
    "width": "50",
    "sortable": "true",
    "dataIndex": "title"
  },
  {
    "header": "Image",
    "width": "50",
    "sortable": "false",
    "dataIndex": "icon",
    "renderer": "this.renderImage"
  }
]
```

- Создайте новый шаблон с назначенной этой TV
- Создайте новый ресурс с этим шаблоном
    - Этот ресурс нужен, чтобы создать все атрибуты для TV

## Создание TV выбора атрибутов

- Создайте новый чанк
    - name: getAttributeOptions
    - content:

``` php
[getImageList?
    &tvname=`migx_attributes_builder`
    &docid=`90`
    &toJsonPlaceholder=`json`
]]
[[+json]]
```

- Замените Docid на ID ресурса, созданного выше.
  
- Создайте новую TV
    - name: migx\_attributes
    - Input Type: migx
    - input option values: @CHUNK getAttributeOptions
    - configs: migx\_attributes
- Добавьте эту TV в шаблоны, где нужен выбор из списка атрибутов.
- Создайте конфигурацию MIGX (Components → MIGX → вкладка MIGX → «add item»)
    - name: migx\_attributes
- Нажмите «Done», чтобы сохранить конфигурацию
- Щёлкните правой кнопкой по конфигурации и выберите «import/export»
- Скопируйте и вставьте этот код в textarea:

``` json
{
  "formtabs": [{
    "MIGX_id": 1,
    "caption": "Attribute",
    "print_before_tabs": "0",
    "fields": [{
        "MIGX_id": 4,
        "field": "active",
        "caption": "Active",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "listbox",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "yes==1||no==0",
        "default": ""
      },
      {
        "field": "attribute",
        "caption": "Attribute",
        "inputTVtype": "hidden",
        "MIGX_id": 1
      },
      {
        "field": "title",
        "caption": "Title",
        "inputTVtype": "hidden",
        "MIGX_id": 2
      },
      {
        "field": "icon",
        "caption": "Icon",
        "inputTVtype": "hidden",
        "MIGX_id": 3
      },
      {
        "MIGX_id": 5,
        "field": "comment",
        "caption": "Comment",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "textarea",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "",
        "default": ""
      }
    ]
  }],
  "contextmenus": "",
  "actionbuttons": "",
  "columnbuttons": "",
  "filters": "[]",
  "extended": {
    "migx_add": "",
    "formcaption": "",
    "update_win_title": "",
    "win_id": "",
    "maxRecords": "",
    "multiple_formtabs": "",
    "extrahandlers": "this.handleColumnSwitch",
    "packageName": "",
    "classname": "",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": 1,
    "check_resid": 1,
    "check_resid_TV": "",
    "join_alias": "",
    "has_jointable": "yes",
    "getlistwhere": "",
    "joins": "",
    "cmpmaincaption": "",
    "cmptabcaption": "",
    "cmptabdescription": "",
    "cmptabcontroller": "",
    "winbuttons": "",
    "onsubmitsuccess": "",
    "submitparams": ""
  },
  "columns": [{
      "header": "Attribute",
      "dataIndex": "attribute",
      "MIGX_id": 1
    },
    {
      "header": "Title",
      "dataIndex": "title",
      "MIGX_id": 2
    },
    {
      "header": "Icon",
      "dataIndex": "icon",
      "renderer": "this.renderImage",
      "MIGX_id": 3
    },
    {
      "MIGX_id": 2,
      "header": "Active",
      "dataIndex": "active",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "this.renderSwitchStatusOptions",
      "clickaction": "switchOption",
      "selectorconfig": "",
      "renderoptions": [{
          "MIGX_id": 1,
          "name": "published",
          "value": 1,
          "clickaction": "",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/tick.png"
        },
        {
          "MIGX_id": 2,
          "name": "unpublished",
          "value": "0",
          "clickaction": "",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cross.png"
        }
      ]
    }
  ]
}
```

## Создание атрибутов

Откройте ресурс конструктора атрибутов и добавьте несколько атрибутов.

## Выбор атрибутов на ресурсах

Теперь вы можете выбирать атрибуты и менять порядок перетаскиванием. Можно добавить дополнительные сведения, например индивидуальный комментарий.

## Выбранный список атрибутов на фронтенде

Добавьте этот тег сниппета в шаблон или контент ресурса:

``` php
<ul>
[[getImageList?
    &tvname=`migx_attributes`
    &where=`{"active":"1"}`
    &tpl=`@CODE:
      <li>
      <img src="[[+icon]]" alt="[[+title]]" title="[[+title]]" />
      <span>[[+title]]</span>
      [[+comment:nl2br]]
      </li> `
]]
</ul>
```
