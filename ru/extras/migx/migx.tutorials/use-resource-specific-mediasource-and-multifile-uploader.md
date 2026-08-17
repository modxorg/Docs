---
title: "MIGX: media source ресурса и мультизагрузка файлов"
translation: "extras/migx/migx.tutorials/use-resource-specific-mediasource-and-multifile-uploader"
description: "Динамический media source с папкой на ресурс и мультизагрузка файлов в сетку MIGX"
---

## Media source на ресурс и мультизагрузка

В этом уроке вы настроите динамический media source с отдельной автоматически создаваемой папкой для каждого ресурса.
Для загрузки нескольких файлов сразу используется диалог multiupload MODX.
Все загруженные файлы автоматически добавляются как элементы в сетку MIGX.
Удаление элемента удаляет файл изображения.

## Требования

Сначала установите [MIGX](extras/migx) через Менеджер пакетов.

## Создание динамического media source на ресурс

- Перейдите: Tools → Media Sources
- Создайте media source
    - name: ResourceMediaPath
    - source type: Filesystem
- Обновите media source
    - basepath и baseurl:
  
``` php
[[migxResourceMediaPath?
    &pathTpl=`assets/resourceimages/{id}/`
    &createFolder=`1`
]]
```

Возможно, понадобится каталог с правами записи для PHP: `assets/resourceimages/`

## Создание MIGX TV

Создайте новую TV

- Вкладка: General Information
    - name: resourcealbum
- Вкладка: Input Options
    - Input Type: migx
    - Configurations: resourcealbum
- Вкладка: Template Access
    - выберите шаблон для ресурсов-альбомов
- Вкладка: Media Sources
    - выберите media source ResourceMediaPath для контекста (по умолчанию web)

## Создание конфигурации для MIGX TV

- Перейдите: Components → MIGX → вкладка MIGX
- Создайте конфигурацию через «add item»
    - name: resourcealbum
- Нажмите «Done», чтобы сохранить конфигурацию
- Щёлкните правой кнопкой по конфигурации и выберите «import/export»
- Скопируйте и вставьте этот код в textarea:

``` json
{
  "formtabs": [{
    "MIGX_id": 71,
    "caption": "Image",
    "print_before_tabs": "0",
    "fields": [{
        "field": "title",
        "caption": "Title",
        "MIGX_id": 327,
        "pos": 1
      },
      {
        "MIGX_id": 329,
        "field": "description",
        "caption": "Description",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "",
        "validation": "",
        "configs": "",
        "restrictive_condition": "",
        "display": "",
        "sourceFrom": "config",
        "sources": "",
        "inputOptionValues": "",
        "default": "test",
        "useDefaultIfEmpty": "0",
        "pos": 2
      },
      {
        "MIGX_id": 425,
        "field": "image",
        "caption": "Image",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "image",
        "validation": "",
        "configs": "",
        "restrictive_condition": "",
        "display": "none",
        "sourceFrom": "migx",
        "sources": "",
        "inputOptionValues": "",
        "default": "",
        "useDefaultIfEmpty": "0",
        "pos": 4
      }
    ],
    "pos": 1
  }],
  "contextmenus": "edit_migx||duplicate_migx||remove_migx_and_image||movetotop_migx||movetotop_bottom",
  "actionbuttons": "loadfromsource||uploadfiles",
  "columnbuttons": "",
  "filters": "",
  "extended": {
    "migx_add": "Add Image",
    "disable_add_item": 1,
    "add_items_directly": "",
    "formcaption": "Image",
    "update_win_title": "",
    "win_id": "resourcegallery",
    "maxRecords": "",
    "addNewItemAt": "bottom",
    "multiple_formtabs": "",
    "multiple_formtabs_label": "",
    "multiple_formtabs_field": "",
    "multiple_formtabs_optionstext": "",
    "multiple_formtabs_optionsvalue": "",
    "actionbuttonsperrow": 4,
    "winbuttonslist": "",
    "extrahandlers": "this.handleColumnSwitch",
    "filtersperrow": 4,
    "packageName": "",
    "classname": "",
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
    "join_alias": "",
    "has_jointable": "yes",
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
      "dataIndex": "MIGX_id",
      "width": 10,
      "renderer": "",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 2,
      "header": "Title",
      "dataIndex": "title",
      "width": 20,
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderchunktpl": "",
      "renderoptions": "",
      "editor": "this.textEditor"
    },
    {
      "MIGX_id": 3,
      "header": "Image",
      "dataIndex": "image",
      "width": 20,
      "renderer": "this.renderImage",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 4,
      "header": "Published",
      "dataIndex": "published",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "this.renderSwitchStatusOptions",
      "clickaction": "switchOption",
      "selectorconfig": "",
      "renderchunktpl": "",
      "renderoptions": [{
          "MIGX_id": 1,
          "name": "published",
          "use_as_fallback": 1,
          "value": 1,
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_ticked.png"
        },
        {
          "MIGX_id": 2,
          "name": "published",
          "use_as_fallback": "",
          "value": 1,
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_ticked.png"
        },
        {
          "MIGX_id": 3,
          "name": "unpublished",
          "use_as_fallback": "",
          "value": "0",
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_empty.png"
        }
      ],
      "editor": ""
    }
  ]
}
```

## Готово

Теперь вы можете создавать ресурсы-альбомы, загружать изображения мультизагрузчиком и синхронизировать элементы MIGX с файлами.
Для вывода на фронтенде используйте сниппет getImageList так:

``` php
[[getImageList?
  &tvname=`resourcealbum`
  &tpl=`@CODE:<h3>[[+title]]</h3><img src="[[+image]]" />`
  &where=`{"published":"1"}`
]]<br></br>
```

или при более сложном tpl или phpthumbof для изображения через чанк:

``` php
[[getImageList?
  &tvname=`resourcealbum`
  &tpl=`imageTpl`
  &where=`{"published":"1"}`
]]<br></br>
```
