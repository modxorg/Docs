---
title: "Оформление Articles"
description: "Дублирование sample-шаблонов и chunks Articles для кастомного оформления блога"
translation: "extras/articles/theming-articles"
---

Articles следует философии MODX: код отделён от контента. Разметку Articles можно менять полностью. Продублируйте шаблоны, отредактируйте их и укажите новые копии в настройках.

## Дублируйте sample-шаблоны

Продублируйте два шаблона: «sample.ArticlesContainerTemplate» и «sample.ArticlesTemplate». Переименуйте их как нужно. Мы назовём их «BlogTemplate» и «BlogPostTemplate».

Если править sample-шаблоны напрямую, а не их копии, изменения пропадут при обновлении Articles.

Затем откройте Системные настройки и измените:

- «articles.default\_container\_template»: укажите BlogTemplate
- «articles.default\_article\_template»: укажите BlogPostTemplate

Так задаются шаблоны по умолчанию для новых контейнеров и статей.

## Редактирование шаблонов

### Шаблон контейнера

Шаблон контейнера, «BlogTemplate», получает от Articles такие плейсхолдеры:

- `[[+latest_posts]]`: виджет «Latest Posts» справа в sample-шаблоне.
- `[[+latest_comments]]`: виджет «Latest Comments» справа в sample-шаблоне.
- `[[+comments_enabled]]`: 1 или 0 в зависимости от того, включены ли комментарии для контейнера.
- `[[+tags]]`: список самых частых тегов блога.
- `[[+archives]]`: список последних месяцев (или лет) в формате архива.

Переставляйте плейсхолдеры, чтобы собрать нужную вёрстку.

### Шаблон статьи

Шаблон статьи, «BlogPostTemplate», тоже имеет плейсхолдеры:

- `[[+latest_posts]]`: виджет «Latest Posts» справа в sample-шаблоне.
- `[[+comments]]`: комментарии через [Quip](extras/quip "Quip"), если комментарии включены.
- `[[+comments_count]]`: число комментариев к текущей статье. Использует [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount").
- `[[+comments_form]]`: форма ответа через [Quip](extras/quip "Quip"), если комментарии включены.
- `[[*articlestags]]`: с фильтром notempty решает, показывать ли `[[+article_tags]]` (звёздочка вместо плюса).
- `[[+article_tags]]`: список всех тегов текущей статьи.
- `[[*articles_container]]`: ID контейнера статьи. Звёздочка вместо плюса.

Если вы _вне_ шаблона статьи и нужно показать число комментариев к записи (например, в списке «Latest Posts»), плейсхолдер `[[+comments_count]]` не подойдёт. Используйте [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount"). Откройте **Components -> Quip** и посмотрите имена потоков, которые Articles задаёт постам автоматически. Формат: article-b{page-id-of-blog}-{page-id-of-post}, например **article-b12-37**

![](quip-thread-names.jpg)

Зная это, можно вызвать [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount") внутри getResources для числа комментариев к каждому посту:

``` php
[[!QuipCount? &thread=`article-b9-[[+id]]`]]
```

В примере выше блог имеет page id 9.

## Редактирование chunks

Articles поставляет базовые chunks для разных блоков контейнера (вкладка «Advanced Settings» при редактировании контейнера). Скопируйте их и используйте при вёрстке сайта.

## Заключение

Articles даёт простое MODX-оформление и удобное редактирование без потери возможности обновляться. Оформить блог проще, чем когда-либо.

1. [Articles.Creating a Blog](extras/articles/creating-a-blog)
2. [Articles.Retrieving Articles Outside of Articles](extras/articles/retrieving-articles-outside-of-articles)
3. [Articles.Theming Articles](extras/articles/theming-articles)
