---
title: "tpl"
description: "Чанк tpl для вывода каждого тега в сниппете tagLister"
translation: "extras/taglister/taglister/tpl"
---

## Чанк tpl в tagLister

Этот чанк выводится при заданном свойстве &tpl у сниппета [tagLister](extras/taglister/taglister "tagLister").

## Значение по умолчанию

```php
<li class="[[+cls]]">
<a href="[[~[[+target]]? &[[+tagVar]]=`[[+tag]]`]]">[[+tag]]</a> ([[+count]])
</li>
```

## Доступные плейсхолдеры

| Name   | Description                            |
| ------ | -------------------------------------- |
| tag    | Текущий тег.                           |
| tagVar | REQUEST-переменная с параметром тега.  |
| target | ID целевого ресурса для ссылки.        |
| count  | Число ресурсов с этим тегом.           |
| cls    | CSS-класс для тега LI.                 |

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
