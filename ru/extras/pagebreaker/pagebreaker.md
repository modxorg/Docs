---
title: "PageBreaker"
description: "Режимы OnLoadWebDocument и OnPageNotFound плагина PageBreaker"
translation: "extras/pagebreaker/pagebreaker.md"
---

## Описание

У плагина два режима работы.

- **OnLoadWebDocument**: ищет строки **<!-- splitter -->** в контенте, делит текст на страницы и строит пагинацию через чанк [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation "tpl.PageBreaker.navigation")
- **OnPageNotFound**: находит ресурс по сгенерированному URL страницы и загружает его.

## Свойства

- `pb_ajax`: переключать страницы через ajax? По умолчанию: нет. См. чанк [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax "tpl.PageBreaker.ajax")
- `pb_load_jquery`: подключать библиотеку jquery? По умолчанию: нет.

Ajax-режим не рекомендую: меньше просмотров страниц и хуже индексация краулерами. Пользователям также сложнее добавить страницу в закладки.

## См. также

1. [PageBreaker.PageBreaker](extras/pagebreaker/pagebreaker.pagebreaker)
2. [tpl.PageBreaker.ajax](extras/pagebreaker/tpl.pagebreaker.ajax)
3. [tpl.PageBreaker.navigation](extras/pagebreaker/tpl.pagebreaker.navigation)
