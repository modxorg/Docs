---
title: "QuipReply"
description: "Сниппет QuipReply выводит форму ответа для заданной ветки комментариев"
translation: "extras/quip/quip.quipreply"
---

## Сниппет QuipReply

Выводит форму ответа для заданной ветки.

## Использование

Разместите сниппет там, где нужна форма ответа в ветке.

```php
[[!QuipReply? &thread=`myThread`]]
```

Если ветку не указать, QuipReply ищет GET-параметр `quip_thread`. Это удобно для вложенных комментариев.

## Доступные свойства

| Name                         | Description                                                                                                                                                                                                                                                                                                              | Default Value         |
| ---------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | --------------------- |
| requireAuth                  | При true комментировать могут только авторизованные пользователи.                                                                                                                                                                                                                                              | 0                     |
| closed                       | При 1 ветка не принимает новые комментарии.                                                                                                                                                                                                                                                                    | 0                     |
| closeAfter                   | Через сколько дней после создания ветка закроется автоматически. 0 оставляет ветку открытой без ограничения.                                                                                                                                                                                               | 14                    |
| moderate                     | При true все новые сообщения в ветке проходят модерацию.                                                                                                                                                                                                                                                           | 0                     |
| moderateAnonymousOnly        | При 0 модерируются только анонимные (неавторизованные) пользователи.                                                                                                                                                                                                                                                     | 0                     |
| moderateFirstPostOnly        | При 0 модерируется только первое сообщение пользователя. Остальные одобряются автоматически. Только для авторизованных.                                                                                                                                                                        | 1                     |
| moderators                   | Список username модераторов ветки через запятую.                                                                                                                                                                                                                                                           |                       |
| moderatorGroup               | Пользователи этой группы получают права модератора.                                                                                                                                                                                                                                                                 | Administrator         |
| dontModerateManagerUsers     | Не модерировать пользователей, авторизованных в менеджере.                                                                                                                                                                                                                                                                            | 1                     |
| dateFormat                   | Формат даты публикации комментария. Синтаксис PHP [strftime](http://php.net/strftime).                                                                                                                                                                                               | %b %d, %Y at %I:%M %p |
| notifyEmails                 | Список email через запятую для уведомления о новом сообщении в ветке.                                                                                                                                                                                                        |
| recaptcha                    | При true включает reCaptcha в форме добавления комментария.                                                                                                                                                                                                                                                                  | 0                     |
| disableRecaptchaWhenLoggedIn | Отключить проверку reCaptcha для авторизованных пользователей.                                                                                                                                                                                                                                                                        | 1                     |
| autoConvertLinks             | При true URL в тексте автоматически превращаются в ссылки.                                                                                                                                                                                                                                                                       | 1                     |
| useGravatar                  | Показывать ли иконки Gravatar в комментариях.                                                                                                                                                                                                                                                                       | 1                     |
| gravatarIcon                 | Тип иконки Gravatar для пользователя без Gravatar.                                                                                                                                                                                                                                                          | identicon             |
| gravatarSize                 | Размер Gravatar в пикселях.                                                                                                                                                                                                                                                                                      | 50                    |
| postAction                   | Имя submit-поля для публикации комментария.                                                                                                                                                                                                                                                                 | quip-post             |
| previewAction                | Имя submit-поля для предпросмотра комментария.                                                                                                                                                                                                                                                                  | quip-preview          |
| tplAddComment                | Форма добавления комментария. Имя чанка или значение. Значение переопределяет чанк. Форма по умолчанию см. в [tplAddComment](extras/quip/quip.quipreply/tpladdcomment "Quip.QuipReply.tplAddComment"). Файл на диске: core/components/quip/elements/chunks/quipaddcomment.chunk.tpl |                       |
| tplLoginToComment            | Блок для неавторизованного пользователя. Имя чанка или значение. Значение переопределяет чанк. Чанк по умолчанию: core/components/quip/elements/chunks/quipaddcomment.chunk.tpl                                                                            |                       |
| tplPreview                   | Шаблон предпросмотра. Имя чанка или значение. Значение переопределяет чанк.                                                                                                                                                                                                                       |                       |
| idPrefix                     | Префикс ID при нескольких экземплярах Quip на одной странице.                                                                                                                                                                                                                                             | qcom                  |
| requirePreview               | При 1 пользователь должен просмотреть комментарий перед публикацией.                                                                                                                                                                                                                                                | 0                     |

## Чанки QuipReply

Обрабатываются три чанка. Соответствующие параметры:

- [tplAddComment](extras/quip/quip.quipreply/tpladdcomment "Quip.QuipReply.tplAddComment"): чанк формы добавления комментария.
- [tplLoginToComment](extras/quip/quip.quipreply/tpllogintocomment "Quip.QuipReply.tplLoginToComment"): показывается при requireAuth=`1`, если пользователь не авторизован.
- [tplPreview](extras/quip/quip.quipreply/tplpreview "Quip.QuipReply.tplPreview"): предпросмотр комментария перед публикацией.

## Примеры

Форма ответа для ветки `myThread`, модераторы в группе пользователей `Moderators`:

```php
[[!QuipReply? &thread=`myThread` &moderatorGroup=`Moderators`]]
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
