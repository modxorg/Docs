---
title: "HybridAuth"
description: "Социальная авторизация в MODX через библиотеку HybridAuth"
translation: "extras/hybridauth/index"
---

Интеграция open source PHP-библиотеки социальной авторизации [HybridAuth](http://hybridauth.sourceforge.net/) в MODX Revolution.

_Главная цель HybridAuth: абстрактный API между вашим приложением и социальными API и провайдерами идентификации Facebook, Twitter, MySpace, LinkedIn, Google, Yahoo и др._

_HybridAuth помогает разработчикам строить социальные приложения: sign-in, sharing, профили, списки друзей, ленты активности, статусы и другое._

В MODX можно войти на сайт и привязать аккаунты внешних сервисов к одному профилю пользователя.

## Установка

Сначала посмотрите видео

1. Зарегистрируйте приложения и получите API-ключи. Например, создайте приложение Twitter: <https://dev.twitter.com/apps/new>
2. Откройте системные настройки в менеджере, переключитесь на hybridauth и создайте или обновите ha.keys.Servicename. Для Twitter это ha.keys.Twitter
3. Укажите ключи как JSON-строку с массивом

``` json
{"key":"your key from twitter","secret":"secret from twitter"}
```

![](ha3.png)

Это нужно для корректной инициализации библиотеки (<http://hybridauth.sourceforge.net/userguide/Configuration.html>).

4. Запустите сниппет `[[!HybridAuth?providers=`Twitter`]]` на любой странице

При ошибках инициализации библиотеки запись попадёт в системный лог.

## Параметры

| Параметр         | Описание                                                                                                                                                                                                   | По умолчанию                        |
| ---------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------- |
| providers        | Список провайдеров через запятую. Все провайдеры: /core/components/hybridauth/model/hybridauth/lib/Providers/. Например, &providers=`Google,Twitter,Facebook`.                                           | нет                                 |
| rememberme       | При true пользователь запоминается надолго                                                                                                                                                                 | true                                |
| groups           | Список групп через запятую для добавления при первом входе. Например, &groups=`Users:1` добавит пользователя в группу «Users» с ролью «member»                                                            | нет                                 |
| action           | Режим работы. По умолчанию загружает чанки по статусу пользователя                                                                                                                                       | loadTpl                             |
|                  |                                                                                                                                                                                                            |                                     |
| loginTpl         | Чанк для анонимного пользователя                                                                                                                                                                           | tpl.HybridAuth.login                |
| logoutTpl        | Чанк для авторизованного пользователя                                                                                                                                                                      | tpl.HybridAuth.logout               |
| profileTpl       | Чанк для просмотра и редактирования профиля                                                                                                                                                                | tpl.HybridAuth.profile              |
|                  |                                                                                                                                                                                                            |                                     |
| loginContext     | Основной контекст авторизации. По умолчанию текущий контекст                                                                                                                                               | current                             |
| addContexts      | Дополнительные контексты через запятую. Например, &addContexts=`web,ru,en`                                                                                                                                 | нет                                 |
|                  |                                                                                                                                                                                                            |                                     |
| profileFields    | Поля профиля для отображения и редактирования                                                                                                                                                              | username:25,email:50,fullname:50... |
| requiredFields   | Обязательные поля при обновлении профиля. Например, &requiredFields=`username,fullname,email`                                                                                                              | username,email,fullname             |
|                  |                                                                                                                                                                                                            |                                     |
| loginResourceId  | ID ресурса для редиректа после входа. 0 означает редирект на текущую страницу                                                                                                                              | 0                                   |
| logoutResourceId | ID ресурса для редиректа после выхода. 0 означает редирект на текущую страницу                                                                                                                             | 0                                   |

### Примеры

Регистрация в группу Users

``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &groups=`Users`]]
```

Обновление профиля

``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile`]]
```

Обновление профиля с обязательным фото

``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile` &requiredFields=`username,email,photo` &profileFields=`username,fullname,email,photo`]]
```

## Известные проблемы

1. Ошибка «**You cannot access this page directly**» возникает, когда сессия пользователя кешируется opcode-cacher, например **php-apc**. На [MODXCloud](http://modxcloud.com) это происходит часто

Добавьте в /index.php в корне сайта строку для отключения кеширования apc:

``` php
ini_set('apc.cache_by_default', 0);
```

Иначе сессия будет кешироваться и сниппет работает некорректно.

## Интеграция сервисов

1. [HybridAuth.Integrating Facebook](extras/hybridauth/hybridauth.integrating-facebook)
2. [HybridAuth.Integrating Google](extras/hybridauth/hybridauth.integrating-google)
3. [HybridAuth.Integrating Twitter](extras/hybridauth/hybridauth.integrating-twitter)
4. [HybridAuth.Integrating VK.com](extras/hybridauth/hybridauth.integrating-vk.com)
