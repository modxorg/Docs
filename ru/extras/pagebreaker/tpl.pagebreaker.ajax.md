---
title: "tpl.PageBreaker.ajax"
description: "Ajax-чанк для переключения страниц PageBreaker"
translation: "extras/pagebreaker/tpl.pagebreaker.ajax"
---

## Описание

Этот чанк используется только если включён параметр **pb\_ajax** плагина [PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker "PageBreaker.PageBreaker").

Он обрабатывает клики по ссылкам с классом **load\_page** и отправляет ajax-запрос на текущую страницу. После ответа плагина старый блок текста заменяется новым.

Укажите id элемента на странице, куда выводится контент.

``` php
<script type='text/javascript'>
  var elem = '#content'; // HTML element on webpage in which will be loaded new block of text

  $(document).ready(function () {
    $('.load_page').live('click', function () {
      var href = $(this).attr('href');
      $.post(href, {
        'action': 'PageBreakLoad'
      }, function (data) {
        $(elem).html(data);
      })
      return false;
    })
  })
</script>
```

## Плейсхолдеры

В этом чанке нет необычных плейсхолдеров.

## См. также

1. [PageBreaker.PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation)
