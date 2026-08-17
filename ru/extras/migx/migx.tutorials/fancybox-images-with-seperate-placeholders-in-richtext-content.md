---
title: "MIGX: Fancybox-изображения с отдельными плейсхолдерами в richtext"
translation: "extras/migx/migx.tutorials/fancybox-images-with-seperate-placeholders-in-richtext-content"
description: "Вставка изображений Fancybox в richtext-контент через MIGX и toSeparatePlaceholders"
---

## Как добавить Fancybox-изображения с отдельными плейсхолдерами в richtext-контент

## Требования

Сначала установите дополнения, которые понадобятся в этой настройке:

- [MIGX](extras/migx): создание и заполнение блоков в бэкенде MODX и вывод на фронтенде.
- [TinyMCE](extras/evo/tinymce): richtext-редактор для текстового контента.
- [phpThumbOf](extras/phpthumbof): изменение размера изображений под колонки.

Также скачайте [fancybox](http://fancybox.net/home) и загрузите подпапку `/fancybox/` пакета в установку MODX в `/assets/fancybox/`.

### Шаблон

Для этого урока создайте новый шаблон с именем `fancybox`.

``` html
<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="[[++base_url]]assets/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="[[++base_url]]assets/js/fancybox/jquery.easing-1.4.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("a.fancyimg").fancybox({
             'transitionIn' : 'elastic',
             'transitionOut' : 'elastic',
             'speedIn' : 600,
                    'speedOut' : 200,
                    'overlayShow' : false
                });

            });
        </script>
        <link rel="stylesheet" href="[[++base_url]]assets/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    </head>
    <body>
        <div>
            [[getImageList? &tpl=`fancybox`&tvname=`fancyboxTv`&toSeparatePlaceholders=`img`]]
            <div id="content">[[*content]]</div>
            <div id="footer">[^q^] queries, querytime [^qt^], phptime [^p^], totaltime [^t^], source [^s^]</div>
        </div>
    </body>
</html>

```

### Input-TV

Нужны input-TV, которые вы используете в формах бэкенда позже.

| name          | input-type | default-value | purpose                                                                                  |
| ------------- | ---------- | ------------- | ---------------------------------------------------------------------------------------- |
| imageTV       | image      |               | выбор изображений через файловый менеджер                                                |
| placeholderTV | hidden     | img           | префикс плейсхолдера для корректного рендера плейсхолдера в сетке                        |

Не давайте этим TV доступ к шаблонам. Они нужны только как типы ввода для форм.

### MIGX TV

Создайте MIGX TV. Создайте новую TV.

#### Общая информация

##### Name

fancyboxTv

#### Параметры ввода

##### Input-type

migx

##### Form Tabs

``` json
[{
  "caption": "Image",
  "fields": [{
      "field": "placeholder",
      "caption": "Placeholder",
      "inputTV": "placeholderTV"
    },
    {
      "field": "title",
      "caption": "Title",
      "description": "Title for the image."
    },
    {
      "field": "image",
      "caption": "Image",
      "inputTV": "imageTV"
    }

  ]
}]
```

##### Grid Columns

``` json
[{
    "header": "Placeholder",
    "width": "10",
    "sortable": "true",
    "dataIndex": "placeholder",
    "renderer": "this.renderPlaceholder"
  },
  {
    "header": "Title",
    "width": "160",
    "sortable": "true",
    "dataIndex": "title"
  },
  {
    "header": "Image",
    "width": "50",
    "sortable": "false",
    "dataIndex": "image",
    "renderer": "this.renderImage"
  }
]
```

##### Template Access

шаблон fancybox

### Чанк

Последний шаг: чанк для fancybox-изображений.

#### Name

fancybox

##### Chunk Code

``` html
<a href="[[+image]]" class="fancyimg">
    <img src="[[+image:phpthumbof=`w=100&h=75&zc=1`]]" alt=""/>
</a>
```

## Добавление Fancybox-изображений с отдельными плейсхолдерами в richtext-контент

Создайте ресурс, загрузите или выберите изображения и добавьте их в richtext-поле контента.

Создайте новый ресурс. Выберите шаблон fancybox. Перейдите на вкладку «Дополнительные поля (TV)».

В fancyboxTV нажмите «Add Item». Заполните поля Image и Title.

Добавьте столько изображений, сколько нужно в контент.

Напишите текст в richtext-поле и вставьте плейсхолдеры вроде `[[+img.0]]`, `[[+img.1]]`, `[[+img.2]]`.

На фронтенде в тексте появятся миниатюры там, где вы вставили плейсхолдеры.

Щёлкните по ним, чтобы открыть fancybox с большими изображениями.

Не забудьте сохранить ресурс, когда закончите добавление или правку изображений в MIGX.
