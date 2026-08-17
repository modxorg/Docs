---
title: "all"
description: "Чанк all для ссылки «Все теги» в сниппете tagLister"
translation: "extras/taglister/taglister/all"
---

## Чанк all в tagLister

Этот чанк выводится при включённом свойстве &all у сниппета [tagLister](extras/taglister/taglister "tagLister").

## Значение по умолчанию

```php
<li class="[[+cls]]">
<a href="[[~[[+target]]? &[[+tagVar]]=``]]">[[+tag]]</a> ([[+count]])
</li>
```

## Доступные плейсхолдеры

| Name   | Description                               |
| ------ | ----------------------------------------- |
| tag    | Текст ссылки «Все теги».                  |
| tagVar | REQUEST-переменная с параметром тега.     |
| target | ID целевого ресурса для ссылки.           |
| count  | Число ресурсов с тегами.                  |
| cls    | CSS-класс для тега LI.                    |

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
