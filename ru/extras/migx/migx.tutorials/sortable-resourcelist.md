---
title: "MIGX: сортируемый список ресурсов"
translation: "extras/migx/migx.tutorials/sortable-resourcelist"
description: "Выбор набора ресурсов из родителя и сортировка порядка вывода через MIGX TV"
---

В этом уроке вы научитесь использовать MIGX для выбора набора ресурсов из заданного родителя и сортировки порядка вывода.

## Требования

Сначала установите [MIGX](extras/migx) через Менеджер пакетов и выполните [базовую настройку](extras/migxdb/migxdb.configuration).
Требуется версия 2.5.2 и новее.

## Создание чанка Resourceoptions

1. Создайте новый чанк

- name: `migx_resourceoptions`
- content:
  
``` php
[[migxLoopCollection?
    &classname=`modResource`
    &selectfields=`id,pagetitle`
    &where=`{"parent":"3"}`
    &toJsonPlaceholder=`json`
]]
[[+json]]
```

Замените parent на ID родителя, откуда нужен список ресурсов.

## Создание конфигурации для MIGX TV

- Перейдите: Components → MIGX → вкладка MIGX
- Создайте конфигурацию через «add item»
    - name: `migx_resourcelist`
- Нажмите «Done», чтобы сохранить конфигурацию
- Щёлкните правой кнопкой по конфигурации и выберите «import/export»
- Скопируйте и вставьте этот код в textarea:

``` json
{
  "formtabs": [{
    "MIGX_id": 1,
    "caption": "main",
    "print_before_tabs": "0",
    "fields": [{
        "MIGX_id": 1,
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
        "default": "0"
      },
      {
        "MIGX_id": 2,
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
      },
      {
        "MIGX_id": 3,
        "field": "pagetitle",
        "caption": "",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "hidden",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "",
        "default": ""
      },
      {
        "MIGX_id": 4,
        "field": "id",
        "caption": "",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "hidden",
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
    "win_id": "migx_input_options",
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
      "MIGX_id": 1,
      "header": "Pagetitle",
      "dataIndex": "pagetitle",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
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
    },
    {
      "MIGX_id": 3,
      "header": "Comment",
      "dataIndex": "comment",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    },
    {
      "MIGX_id": 4,
      "header": "",
      "dataIndex": "x",
      "width": "",
      "sortable": "false",
      "show_in_grid": "0",
      "renderer": "this.renderChunk",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    },
    {
      "MIGX_id": 5,
      "header": "ID",
      "dataIndex": "id",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    }
  ]
}
```

## Создание MIGX TV

Создайте новую TV

- Вкладка: General Information
    - name: `migx_resourcelist`
- Вкладка: Input Options
    - Input Type: migx
    - Input Option Values: `@CHUNK migx_resourceoptions`
    - Configurations: `migx_resourcelist`
- Вкладка: Template Access
    - выберите шаблон, куда нужно добавить эту TV

## Выбор и сортировка ресурсов

Теперь вы можете выбирать ресурсы и менять порядок перетаскиванием. Можно добавить дополнительные данные, например комментарий.

## Отсортированный и отфильтрованный список на фронтенде

Добавьте этот тег сниппета в шаблон или контент ресурса:

``` php
[[getImageList?
  &tvname=`migx_input_options`
  &outputSeparator=`,`
  &tpl=`@CODE:[[+id]]`
  &where=`{"active:=":"1"}`
]]
```
