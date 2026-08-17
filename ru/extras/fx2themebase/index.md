---
title: "FX2themebase"
description: "MODX-реализация responsive CSS-фреймворка Zurb Foundation для тем и шаблонов"
translation: "extras/fx2themebase/index"
---

## Что такое FX2?

Подсказка: это не сиквел боевика 80-х :P

Как предшественник [FoundationX](extras/foundationx), FX2: MODX-реализация responsive CSS-фреймворка Zurb Foundation.

FX2 даёт конечным пользователям тем и шаблонов сайта MODX настраивать сайт с минимальными знаниями HTML и CSS. Разработчики MODX и авторы тем получают набор кастомных инструментов.

Live Demo: <http://fx2.foundationx.net/>

## Требования

FX2 устанавливается через Package Management в MODX Revolution 2.2.8 или новее. Также доступен Snapshot в MODX Cloud Marketplace. Если у вас ещё нет аккаунта MODX Cloud, зарегистрируйтесь [здесь](https://modxcloud.com/signup/?ref=foundationx).

## История

FoundationX создан в 2012 году YJ Tso (@sepiariver) как настраиваемая «супер-тема» для MODX Cloud. FX2, существенно переработанная версия, вышла в октябре 2013 года.

### Текущая версия

Сейчас FX2 на версии 1.2.1-beta2. Это beta, работа продолжается. Обратная связь приветствуется. Документация дополняется.

## Установка

**WARNING: Текущая версия FX2 заменяет весь сайт при установке.**

### Установка через Package Management

FX2 ставится через Package Management как любой другой Extra. В версии 1.2.1-beta2 кастомная панель dashboard не устанавливается. Чтобы исправить:

1. Создайте виджет dashboard типа «Inline PHP»
2. Введите одну строку и сохраните виджет:

``` php
return $modx->getChunk('fx2.dashboard');
```

1. Добавьте виджет на нужную панель dashboard
2. Убедитесь, что группам пользователей назначена эта панель по умолчанию

### Установка в MODX Cloud

В главном меню MODX Cloud Dashboard откройте «Marketplace» и найдите публичный snapshot «FX2 themebase». Нажмите «Inject Into Cloud». Если Cloud ещё не создан, следуйте [документации](https://modxcloud.com/userguide/using-modx-cloud/clouds/create-cloud.html). В окне «Inject into Cloud» выберите Cloud для перезаписи и нажмите «Inject Into Cloud».

**Snapshot FoundationX перезапишет ваш Cloud**
 Убедитесь, что выбранный Cloud не содержит нужные данные. При сомнении сначала сделайте backup. Как создать backup Cloud, см. [здесь](https://modxcloud.com/userguide/using-modx-cloud/backups/create-a-new-backup.html). В MODX Cloud это делается в один клик.

После успешной инъекции snapshot вы получите уведомление. Откройте страницу редактирования Cloud и нажмите «View Manager». Войдите с учётными данными по умолчанию: FX2onMODX для пользователя и пароля. Сразу смените имя пользователя.

### Обязательно смените имя пользователя

Если пропустить этот шаг, любой сможет войти на сайт с учётными данными по умолчанию.

Сразу после первого входа откройте «Security» » «Manage Users». Щёлкните правой кнопкой по пользователю FX2onMODX и выберите «Update User».

Измените username, fullname и email. Внизу справа включите опции «New Password». Задайте пароль и сохраните профиль. Теперь вход выполняется с вашим логином и паролем. «Forgot Login» отправит сброс пароля на ваш email.
