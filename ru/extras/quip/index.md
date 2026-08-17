---
title: "Quip"
description: "Сниппет комментариев для MODX Revolution с вложенными ветками, модерацией и управлением из менеджера"
translation: "extras/quip/index"
---

## Что такое Quip?

Quip это простой [сниппет](developing-in-modx/basic-development/snippets "Snippets") комментариев для MODX Revolution. Вы быстро добавляете комментарии на сайт: вложенные ветки, модерация, автопреобразование URL в ссылки, автозакрытие веток и другое. Полное управление комментариями доступно в бэкенде менеджера Revolution.

### Требования

- MODX Revolution 2.0.0-RC-2 или новее
- PHP5 или новее

### История

Quip написал [Shaun McCormick](https://github.com/splittingred) как простой компонент комментариев. Первый релиз вышел 7 мая 2009 года.

### Загрузка

Установите через менеджер MODX Revolution в [Управлении пакетами](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/quip>

API-документация Quip: <http://api.modx.com/quip/>

## Использование

У Quip два режима: вложенные и плоские комментарии.

### Плоские комментарии

На странице, где нужны комментарии, вызовите сниппет Quip так:

```php
[[!Quip? &thread=`threadNameHere` &threading=`0`]]
<br />
[[!QuipReply? &thread=`threadNameHere`]]
```

### Вложенные комментарии

Если включены вложенные ветки, сделайте два шага. Сначала создайте страницу «Ответ в ветке» с такими вызовами:

```php
<h2>Reply to Thread</h2>
[[!Quip]]
<br />
[[!QuipReply]]
```

Свойства на этой странице задавать не нужно: данные подтянутся из исходного вызова QuipReply на основной странице ветки.

Затем добавьте свойство `replyResourceId` в исходный вызов Quip на странице с комментариями (например, запись блога). Для ресурса с ID 123 это выглядит так:

```php
[[!Quip? &thread=`threadNameHere` &replyResourceId=`123`]]
<br />
[[!QuipReply? &thread=`threadNameHere`]]
```

Quip также даёт вспомогательный сниппет [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount") для подсчёта комментариев в ветке или у пользователя.

## Сниппеты Quip

В пакете четыре сниппета:

- [Quip](extras/quip/quip "Quip.Quip"): вывод комментариев ветки.
- [QuipReply](extras/quip/quip.quipreply "Quip.QuipReply"): форма ответа в ветке.
- [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount"): число комментариев в ветке.
- [QuipLatestComments](extras/quip/quip.quiplatestcomments "Quip.QuipLatestComments"): последние комментарии по всем веткам, пользователю или конкретной ветке.

### Системные настройки

Quip поставляется с рядом настроек на уровне сайта.

| Name               | Description                                                                                                                        |
| ------------------ | ---------------------------------------------------------------------------------------------------------------------------------- |
| quip.emailsFrom    | Адрес отправителя системных писем и писем модерации.                                                                                |
| quip.emailsTo      | Адрес получателя системных писем и писем модерации.                                                                                |
| quip.emailsReplyTo | Адрес Reply-To. По умолчанию совпадает с emailFrom.                                                                                |
| quip.allowedTags   | HTML-теги, разрешённые в комментариях. Список допустимых значений см. на [php.net/strip_tags](http://php.net/strip_tags).         |

Для reCaptcha есть три настройки в пространстве имён recaptcha:

| Name                  | Description                                       |
| --------------------- | ------------------------------------------------- |
| recaptcha.public_key  | Публичный ключ reCaptcha.                         |
| recaptcha.private_key | Приватный ключ reCaptcha.                         |
| recaptcha.use_ssl     | При true подключение к reCaptcha идёт по SSL.     |

## Примеры

Строка для записи блога на ресурсе без вложенных веток:

```php
[[Quip? &thread=`blogpost[[*id]]` &threading=`0`]]
```

Комментарии для ветки `post45`, только для авторизованных пользователей, ресурс «Ответ в ветке» с ID 123:

```php
[[!Quip? &thread=`post45` &replyResourceId=`123`]]
<br />
[[!QuipReply? &thread=`post45` &requireAuth=`1`]]
```

Комментарии для ветки `spamproof123` без вложенности, с reCaptcha:

```php
[[!Quip? &thread=`spamproof123` &threaded=`0`]]
<br />
[[!QuipReply? &thread=`spamproof123` &recaptcha=`1`]]
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
