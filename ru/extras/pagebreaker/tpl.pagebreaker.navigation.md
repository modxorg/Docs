---
title: "tpl.PageBreaker.navigation"
description: "Чанк пагинации для PageBreaker"
translation: "extras/pagebreaker/tpl.pagebreaker.navigation"
---

## Описание

Чанк для пагинации.

``` php
<div style="margin-top: 10px; text-align: center;"><div style="margin-top: 10px; text-align: center;">
  [[+pb.link_prev:isnotempty=`<a href="[[+pb.link_prev]]" class="load_page">&larr;&nbsp;Previous page</a>`]]
  &nbsp;&nbsp;
  <b>[[+pb.current]]</b> from <b>[[+pb.total]]</b>
  &nbsp;&nbsp;
  [[+pb.link_next:ne=``:then=`<a href="[[+pb.link_next]]" class="load_page">Next page&nbsp;&rarr;</a>`:else=`<a href="[[~[[*id]]]]" class="load_page">To beginning</a>`]]
</div>
```

## Плейсхолдеры

Четыре простых плейсхолдера.

| Placeholder   | Description            |
| ------------- | ---------------------- |
| pb.link\_prev | Ссылка на предыдущую страницу  |
| pb.link\_next | Ссылка на следующую страницу      |
| pb.current    | Номер текущей страницы |
| pb.total      | Всего страниц            |

## См. также

1. [PageBreaker.PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation)
