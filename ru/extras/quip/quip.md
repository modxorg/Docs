---
title: "Quip"
description: "Сниппет Quip выводит все комментарии заданной ветки"
translation: "extras/quip/quip"
---

## Сниппет Quip

Этот сниппет выводит все комментарии заданной ветки.

## Использование

Разместите сниппет там, где нужна ветка комментариев, и укажите её имя.

```php
[[!Quip? &thread=`myThread`]]
```

## Доступные свойства

| Name                     | Description                                                                                                                                                                                                                                     | Default               |
| ------------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------- |
| thread                   | ID ветки. Может быть любым значением и служит точкой привязки для связанных комментариев.                                                                                                                    | n/a                   |
| parent                   | Родитель, с которого начинается вывод ветки.                                                                                                                                                                                              | 0                     |
| threaded                 | Разрешены ли вложенные комментарии. При вложенности пользователи отвечают на комментарии, увеличивая отступ. Без вложенности комментируют только родительскую статью, не ответы. | 1                     |
| maxDepth                 | Максимальная глубина ответов во вложенной ветке.                                                                                                                                                                        | 5                     |
| replyResourceId          | ID ресурса, где размещён сниппет QuipReply для ответов во вложенных ветках.                                                                                                                                                  |                       |
| threadedPostMargin       | Отступ в пикселях вправо для каждого уровня вложенности.                                                                                                                                            | 15                    |
| useMargins               | Вместо ol/li использовать div с margin (старый стиль Quip)                                                                                                                                                                        | 0                     |
| closed                   | При true ветка не принимает новые комментарии.                                                                                                                                                                                        | 0                     |
| closeAfter               | Через сколько дней после создания ветка закроется автоматически. 0 оставляет ветку открытой без ограничения.                                                                                                                      | 14                    |
| dateFormat               | Формат даты публикации комментария. Синтаксис PHP [strftime](http://php.net/strftime).                                                                                                                      | %b %d, %Y at %I:%M %p |
| requireAuth              | При true комментировать могут только авторизованные пользователи.                                                                                                                                                                     | 0                     |
| useCss                   | При true Quip подключает базовый CSS для оформления.                                                                                                                                                                           | 1                     |
| altRowCss                | CSS-класс для чередующихся комментариев.                                                                                                                                                                                                   | quip-comment-alt      |
| nameField                | Поле имени автора каждого комментария. Рекомендуемые значения: "name" или "username".                                                                                                                                              | username              |
| showAnonymousName        | При true для неавторизованных показывается значение anonymousName (по умолчанию "Anonymous").                                                                                                                  | 0                     |
| anonymousName            | Имя для анонимных публикаций. По умолчанию "Anonymous".                                                                                                                                                                            |                       |
| allowRemove              | Авторизованные пользователи могут удалять свои комментарии.                                                                                                                                                                                             | 1                     |
| removeThreshold          | При allowRemove true: сколько минут после публикации пользователь может удалить комментарий.                                                                                                                                        | 3                     |
| allowReportAsSpam        | Авторизованные пользователи могут помечать комментарии как спам.                                                                                                                                                                                               | 1                     |
| useGravatar              | Показывать ли иконки Gravatar в комментариях.                                                                                                                                                                                              | 1                     |
| gravatarIcon             | Тип иконки Gravatar для пользователя без Gravatar.                                                                                                                                                                                 | identicon             |
| gravatarSize             | Размер Gravatar в пикселях.                                                                                                                                                                                                             | 50                    |
| sortBy                   | Поле сортировки комментариев. При включённой вложенности (по умолчанию или через &threaded=`1`) лучше не менять.                                                                                                 | rank                  |
| sortByAlias              | Алиас классов для sortBy.                                                                                                                                                                                                       | quipComment           |
| sortDir                  | Направление сортировки.                                                                                                                                                                                                                       | ASC                   |
| tplComment               | Чанк одного комментария.                                                                                                                                                                                                                 |                       |
| tplCommentOptions        | Чанк опций (например, удаление) для автора комментария.                                                                                                                                                                        |                       |
| tplComments              | Внешняя обёртка комментариев. Имя чанка или значение. Значение переопределяет чанк.                                                                                                                                |                       |
| tplReport                | Ссылка «Пожаловаться на спам». Имя чанка или значение. Значение переопределяет чанк.                                                                                                                       |                       |
| removeAction             | Имя submit-поля для удаления комментария.                                                                                                                                                                                          | quip-remove           |
| reportAction             | Имя submit-поля для жалобы на спам.                                                                                                                                                                                  | quip-report           |
| idPrefix                 | Префикс ID при нескольких экземплярах Quip на одной странице.                                                                                                                                                                    | qcom                  |
| limit                    | Лимит комментариев на страницу. Ненулевое значение включает пагинацию.                                                                                                                                             | 0                     |
| start                    | Начальный индекс комментария. Рекомендуется 0.                                                                                                                                                                               | 0                     |
| tplPagination            | Чанк обёртки OL для пагинации.                                                                                                                                                                                                          |                       |
| tplPaginationItem        | Чанк ссылки на номер страницы (не текущая).                                                                                                                                                                                            |                       |
| tplPaginationCurrentItem | Чанк ссылки на текущий номер страницы.                                                                                                                                                                                                 |                       |
| paginationCls            | CSS-класс обёртки OL пагинации.                                                                                                                                                                                                | quip-pagination       |
| pageCls                  | CSS-класс ссылки на не текущую страницу.                                                                                                                                                                                     | quip-page-number      |
| currentPageCls           | CSS-класс текущей страницы.                                                                                                                                                                                            | quip-page-current     |

## Чанки Quip

Quip обрабатывает четыре чанка. Соответствующие параметры:

- [tplComment](extras/quip/quip/tplcomment "Quip.Quip.tplComment")
- [tplCommentOptions](extras/quip/quip/tplcommentoptions "Quip.Quip.tplCommentOptions")
- [tplComments](extras/quip/quip/tplcomments "Quip.Quip.tplComments")
- [tplReport](extras/quip/quip/tplreport "Quip.Quip.tplReport")

## Примеры

Строка для записи блога на ресурсе без вложенных веток:

```php
[[!Quip? &thread=`blog-post-[[*id]]` &threaded=`0`]]
```

Вложенная ветка с глубиной до 3 уровней и автозакрытием через 21 день:

```php
[[!Quip? &thread=`blog-post-[[*id]]` &maxDepth=`3` &closeAfter=`21`]]
```

Ветка с вложенностью, без Gravatar, только для авторизованных:

```php
[[!Quip? &thread=`blog-post-[[*id]]` &useGravatar=`0` &requireAuth=`1`]]
```

Ветка с пагинацией: 5 корневых комментариев на страницу, класс `pageLink` на каждой ссылке пагинации:

```php
[[!Quip? &thread=`blog-post-[[*id]]` &limit=`5` &pageCls=`pageLink`]]
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
