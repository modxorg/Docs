---
title: "QuipCount"
description: "Вспомогательный сниппет Quip для подсчёта комментариев в ветке или у пользователя"
translation: "extras/quip/quip.quipcount"
---

## Что такое QuipCount?

QuipCount это вспомогательный сниппет Quip. Он быстро возвращает число комментариев в ветке или у пользователя.

## Использование

Число комментариев в ветке:

```php
[[QuipCount? &thread=`mythread`]]
```

Число комментариев пользователя с username `jb2009`:

```php
[[QuipCount? &type=`user` &user=`jb2009`]]
```

## Доступные свойства

| Name   | Description                                                       | Default Value |
| ------ | ----------------------------------------------------------------- | ------------- |
| type   | Режим QuipCount: "thread" или "user".                             | thread        |
| thread | В режиме thread: ветка для подсчёта комментариев.                 |               |
| user   | В режиме user: ID пользователя или username.                      |               |

## Примеры

Число комментариев в ветке "thread32":

```php
[[QuipCount? &thread=`thread32`]]
```

Число комментариев пользователя `mikegeorge`:

```php
[[QuipCount? &type=`user` &user=`mikegeorge`]]
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
