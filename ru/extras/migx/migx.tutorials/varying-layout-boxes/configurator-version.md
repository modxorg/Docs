---
title: "Версия через конфигуратор"
translation: "extras/migx/migx.tutorials/varying-layout-boxes/configurator-version"
description: "Переключаемые formtabs для блоков с разной вёрсткой через MIGX Configurator CMP"
---

## Блоки с разной вёрсткой через MIGX: версия конфигуратора

MIGX Configurator CMP позволяет создавать переключаемые formtabs. Этот урок показывает, как это сделать.
Описаны только отличия от использованной ранее версии.

### MIGX TV

Создайте новую TV.

#### Общая информация

##### Name

MultiColumn

#### Параметры ввода

##### Input-type

migx

##### Configurations

layout\_1

### Конфигурации MIGX

#### Создайте три конфигурации MIGX в MIGX Configurator CMP

##### layout\_1

Name: layout\_1
unique MIGX ID: layout\_1

##### layout\_2

Name: layout\_2
unique MIGX ID: layout\_2

##### layout\_3

Name: layout\_3
unique MIGX ID: layout\_3

#### Добавьте Formtabs и Columns

Откройте каждую конфигурацию через «edit raw».

##### layout_1

###### Formtabs

``` json
[{
  "caption": "Row Format",
  "fields": [{
    "field": "fake",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_2_image",
    "caption": "Image",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_2_headline",
    "caption": "Headline",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_2_content",
    "caption": "Content",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_image",
    "caption": "Image",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_headline",
    "caption": "Headline",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_content",
    "caption": "Content",
    "inputTVtype": "hidden"
  }]
}, {
  "caption": "First",
  "fields": [{
    "field": "cell_1_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_1_headline",
    "caption": "Headline"
  }, {
    "field": "cell_1_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}]
```

В Multiple Formtabs выберите:

layout\_1,layout\_2,layout\_3

###### Columns

``` json
[{
  "header": "Row Format",
  "width": "30",
  "sortable": "true",
  "dataIndex": "MIGX_formname"
}, {
  "header": "First",
  "width": "160",
  "sortable": "false",
  "dataIndex": "cell_1_image",
  "renderer": "this.renderImage"
}, {
  "header": "Second",
  "width": "160",
  "sortable": "false",
  "dataIndex": "cell_2_image",
  "renderer": "this.renderImage"
}, {
  "header": "Third",
  "width": "160",
  "sortable": "false",
  "dataIndex": "cell_3_image",
  "renderer": "this.renderImage"
}]
```

##### layout_2

###### Formtabs

``` json
[{
  "caption": "Row Format",
  "fields": [{
    "field": "fake",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_image",
    "caption": "Image",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_headline",
    "caption": "Headline",
    "inputTVtype": "hidden"
  }, {
    "field": "cell_3_content",
    "caption": "Content",
    "inputTVtype": "hidden"
  }]
}, {
  "caption": "First",
  "fields": [{
    "field": "cell_1_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_1_headline",
    "caption": "Headline"
  }, {
    "field": "cell_1_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}, {
  "caption": "Second",
  "fields": [{
    "field": "cell_2_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_2_headline",
    "caption": "Headline"
  }, {
    "field": "cell_2_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}]
```

##### layout_3

###### Formtabs

``` json
[{
  "caption": "Row Format",
  "fields": [{
    "field": "fake",
    "inputTVtype": "hidden"
  }]
}, {
  "caption": "First",
  "fields": [{
    "field": "cell_1_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_1_headline",
    "caption": "Headline"
  }, {
    "field": "cell_1_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}, {
  "caption": "Second",
  "fields": [{
    "field": "cell_2_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_2_headline",
    "caption": "Headline"
  }, {
    "field": "cell_2_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}, {
  "caption": "Third",
  "fields": [{
    "field": "cell_3_image",
    "caption": "Image",
    "inputTVtype": "image"
  }, {
    "field": "cell_3_headline",
    "caption": "Headline"
  }, {
    "field": "cell_3_content",
    "caption": "Content",
    "inputTVtype": "richtext"
  }]
}]
```

Во всех наборах formtabs должны быть одни и те же имена полей. Неиспользуемые поля прячьте в hidden. Иначе при переключении formtabs значения пропадут.
