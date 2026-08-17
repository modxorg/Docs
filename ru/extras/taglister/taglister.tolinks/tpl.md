---
title: "tpl"
description: "Чанк tpl для каждой ссылки в сниппете tolinks"
translation: "extras/taglister/taglister.tolinks/tpl"
---

## Чанк tpl в tolinks

Этот чанк выводится при заданном свойстве &tpl у сниппета [tagLister](extras/taglister/taglister.tolinks "tagLister.tolinks").

## Значение по умолчанию

```php
<a href="[[+url]]" class="[[+cls]]">[[+item]]</a>
```

## Полные URL

Если нужен полный URL страницы со сниппетом [getResourcesTag](extras/taglister/taglister.getresourcestag "tagLister.getResourcesTag"), используйте такой вариант:

```php
<a href="[[++site_url]][[+url]]" class="[[+cls]]">[[+item]]</a>
```

## Доступные плейсхолдеры

| Name | Description                      |
| ---- | -------------------------------- |
| item | Текст каждого элемента.          |
| url  | Сформированный URL для ссылки.   |
| cls  | CSS-класс для каждого элемента.  |

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
