---
title: "mChimpX"
description: "FormIt hook для подписки email на список Mailchimp"
translation: "extras/mchimpx/index"
---

## Что такое mChimpX?

FormIt hook для подписки email на ваш список Mailchimp. Полностью настраивается.

_Stable extra работает с Mailchimp API 2.0 (поддержка только 1.x прекращена), версия 3.0 будет реализована позже._

mChimpX создан [Bert Oost](http://oostdesign.nl).

## Требования

mChimpX требует MODX® Revolution 2.4 или новее.

## История

| Version     | Release date | Author                                                                      | Changes                       |
| ----------- | ------------ | --------------------------------------------------------------------------- | ----------------------------- |
| 1.0.0-rc1   | Dec 28, 2011 | [Bert Oost](mailto:bert@oostdesign.nl) ([OostDesign](http://OostDesign.nl)) | Initial release.              |
| 2.0.0-alpha | Apr 10, 2019 | [Oleg Pryadko](mailto:oleg@websitezen.com)                                  | Mailchimp API 2.0 support     |
| 2.1.0       | May 05, 2019 | [Anton Tarasov](https://antontarasov.com)                                   | Further maintenance & support |

## Загрузка и установка

Установите пакет через package manager MODX®.

## Пример вызова сниппета

```php
[[!FormIt?
  &hooks=`mChimpXSubscribe`
  &mcApiKey=`xxxxxx5229a6a84acd58xxxxxx210ax-us11`
  &mcListId=`yyyyyyyyyyy`
  &mcEmailField=`EMAIL`
  &mcMergeTags=`FNAME:FNAME,LNAME:LNAME,BIRTHDATE:BIRTHDATE,CODE:CODE,SOURCE:SOURCE`
  &mcDoubleOptin=`1`
  &mcDebug=`true`
  &mcUpdateExisting=`0`
  &mcFailOnAlreadySubscribed=`1`
  &mcFailOnNotSubscribed=`1`
  &mcFailOnMissingRequired=`1`
]]
```

## Параметры для тега FormIt

| Parameter    | Description                                                                                                                       |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------- |
| mcApiKey     | [optional] Mailchimp API Key (можно задать через system setting `mcApiKey`)                                            |
| mcListId     | [optional] ID списка Mailchimp (можно задать через system setting `mcListId`)                            |
| mcEmailField | Имя поля email в форме. Default: `email`.                                                                        |
| mcMergeTags  | Merge tags Mailchimp и поля формы. Default: `FNAME:firstname,LNAME:lastname,FULLNAME:firstname:lastname`. |

## Параметры подписки

| Parameter          | Description                                                                                                                                                                                                                                       |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| mcEmailType        | Тип email (html, text, mobile).Default: `html`.                                                                                                                                                                      |
| mcDoubleOptin      | Двойное подтверждение подписки. Default: `1`                                                                                                                                                                     |
| mcUpdateExisting   | Обновлять существующих подписчиков вместо ошибки. Default: `0`.                                                                                                                                          |
| mcReplaceInterests | Заменять interest groups переданными или добавлять к существующим. Default: `1`.                                                                                        |
| mcSendWelcome      | При double*optin=false и true отправляется Welcome Email при успешной подписке. Не срабатывает при обновлении существующего подписчика. При double_optin=true не влияет. Default: `0`. |

## Параметры ошибок

| Parameter                 | Description                                                            |
| ------------------------- | ---------------------------------------------------------------------- |
| mcDebug                   | Debug в лог MODX.Default: `0`.            |
| mcFailOnApiKey            | Показывать ошибки API key на форме. Default: `0`              |
| mcFailOnListNotExists     | Показывать ошибку «list not exists». Default: `0`.    |
| mcFailOnAlreadySubscribed | Показывать ошибку «already subscribed». Default: `0`. |
| mcFailOnNotSubscribed     | Показывать ошибку «not subscribed». Default: `0`.     |
| mcFailOnMissingRequired   | Показывать ошибку «missing required». Default: `0`.  |

## Официальная документация

<https://docs.modx.com/current/en/extras/mchimpx>
