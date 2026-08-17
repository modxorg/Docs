---
title: "QuipRss"
description: "Вспомогательный сниппет Quip для вывода последних комментариев в формате RSS"
translation: "extras/quip/quip.quiprss"
---

## Сниппет QuipRss

QuipRss это вспомогательный сниппет Quip. Он быстро показывает последние комментарии по ветке, пользователю или по всему сайту в формате RSS.

## Использование

Последние 5 комментариев:

```php
[[!QuipRss]]
```

Комментарии в ветке:

```php
[[!QuipRss? &type=`thread` &thread=`mythread`]]
```

Комментарии пользователя с username `jb2009`:

```php
[[!QuipRss? &type=`user` &user=`jb2009`]]
```

## Доступные свойства

| Name         | Description                                                                                   | Default Value           |
| ------------ | --------------------------------------------------------------------------------------------- | ----------------------- |
| type         | Режим QuipCount: "all", "thread", "family" или "user".                                         | all                     |
| thread       | В режиме thread: ветка для выборки комментариев.                                              |                         |
| user         | В режиме user: ID пользователя или username.                                                  |                         |
| family       | В режиме family: подстрока в имени ветки.                                                     |                         |
| tpl          | Чанк для каждого комментария.                                                                 | quipRssComment          |
| containerTpl | Чанк-обёртка для списка комментариев.                                                         | quipRssContainer        |
| limit        | Сколько комментариев выбрать.                                                                 |
| start        | Начальный индекс последних комментариев.                                                    | 0                       |
| stripTags    | Удалять ли HTML-теги из текста комментария.                                                   | true                    |
| bodyLimit    | Длина текста ссылки на комментарий до обрезки с многоточием.                                  | 30                      |
| rowCss       | CSS-класс каждой строки.                                                                      | quip-latest-comment     |
| altRowCss    | CSS-класс чередующихся строк.                                                                 | quip-latest-comment-alt |

## Примеры

Последние комментарии в ветке "thread32", лимит текста 100 символов:

```php
[[!QuipRss? &type=`thread` &thread=`thread32` &bodyLimit=`100`]]
```

Последние 10 комментариев пользователя `mikegeorge`:

```php
[[!QuipRss? &type=`user` &user=`mikegeorge` &limit=`10`]]
```

Последние 20 комментариев во всех ветках, имя которых начинается с `blog-post`:

```php
[[!QuipRss? &type=`family` &family=`blog-post` &limit=`10`]]
```

## См. также

1. [Quip.Quip](extras/quip/quip)
    1. [Quip.Quip.tplComment](extras/quip/quip/tplcomment)
    2. [Quip.Quip.tplCommentOptions](extras/quip/quip/tplcommentoptions)
    3. [Quip.Quip.tplComments](extras/quip/quip/tplcomments)
    4. [Quip.Quip.tplReport](extras/quip/quip/tplreport)
2. [Quip.QuipCount](extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](extras/quip/quip.quipreply)
    1. [Quip.QuipReply.tplAddComment](extras/quip/quip.quipreply/tpladdcomment)
    2. [Quip.QuipReply.tplLoginToComment](extras/quip/quip.quipreply/tpllogintocomment)
    3. [Quip.QuipReply.tplPreview](extras/quip/quip.quipreply/tplpreview)
5. [Quip.QuipRss](extras/quip/quip.quiprss)
6. [Quip.Upgrading](extras/quip/quip.upgrading)
    1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/upgrading-to-1.0.1)
