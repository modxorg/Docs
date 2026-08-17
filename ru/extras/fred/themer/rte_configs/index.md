---
title: "Конфигурации Rich Text Editor (RTE)"
description: "JSON-конфигурации TinyMCE для Fred и минимальные примеры"
translation: "extras/fred/themer/rte_configs/index"
---

_todo_ @theboxer

Конфигурация RTE по умолчанию для TinyMCE Editor в Fred:

```json
{
    "theme": "inlite",
    "inline": true,
    "plugins": "modxlink image imagetools media lists",
    "insert_toolbar": "image media quicktable modxlink",
    "selection_toolbar": "bold italic underline | alignleft aligncenter alignright | bullist numlist | modxlink h2 h3 h4 blockquote",
    "image_advtab": true,
    "imagetools_toolbar": "alignleft aligncenter alignright | rotateleft rotateright | flipv fliph | editimage imageoptions",
    "auto_focus": false,
    "branding": false,
    "relative_urls": false,
    "image_dimensions": false
}
```

Минимальная RTE только с курсивом и жирным для заголовков:

```json
{
    "theme": "inlite",
    "inline": true,
    "selection_toolbar": "bold italic"
}
```

О плагинах и опциях TinyMCE см. [TinyMCE Examples & Demos](https://www.tiny.cloud/docs/demo/).
