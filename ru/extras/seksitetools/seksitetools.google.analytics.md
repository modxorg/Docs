---
title: "sekSiteTools.google.analytics"
description: "Сниппет для быстрого подключения Google Analytics"
translation: "extras/seksitetools/seksitetools.google.analytics"
---

## Что такое google.analytics?

Этот сниппет быстро добавляет код Google Analytics на сайт. Зарегистрируйте домен в Google и укажите номер аккаунта в свойстве &accountNumber.

## Использование

Пример для google.analytics:

``` php
[[google.analytics? &accountNumber=`U123456`]]
```

Можно указать домен, если analytics используется с поддоменами:

``` php
[[google.analytics? &accountNumber=`U123456` &domainName=`domain.com`]]
```

Подробнее см. свойства сниппета.

## Свойства

| Name          | Description                                                                                                | Default | Required | Version |
| ------------- | ---------------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| accountNumber | Номер аккаунта из Google Analytics. Без него код не сработает. |         | Yes      | >0.0.1  |
| domainName    | Имя домена нужно только при работе с поддоменами.                                                      |         |          | >0.0.1  |
