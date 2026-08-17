---
title: "Rampart"
description: "Антиспам для MODX: регистрации, формы FormIt, комментарии Quip и DNS blacklist"
translation: "extras/rampart/index"
---

## Что такое Rampart?

Rampart это надёжный антиспам для MODX Revolution. Помогает блокировать спам-регистрации и сообщения на сайте, поддерживает DNS blacklisting. Интегрируется со сниппетом [Register](extras/login/login.register "Login.Register"), комментариями [Quip](extras/quip "Quip") и любой формой на [FormIt](extras/formit "FormIt").

## Требования

- MODX Revolution 2.0.7 или новее
- PHP5 или новее
- PHP-расширение mcrypt
- Дополнение [Login](extras/login "Login"), версия 1.5.2 или новее

## История

Rampart написал [Shaun McCormick](https://github.com/splittingred). Первый релиз вышел 26 января 2011 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/rampart>

### Разработка и сообщения об ошибках

Rampart на GitHub: <https://github.com/modxcms/Rampart>

Сообщайте об ошибках здесь: <https://github.com/modxcms/Rampart/issues>

## Использование

Rampart поставляется с 3 сниппетами:

- [preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister "Rampart.preHook.RampartRegister"): антиспам при использовании сниппета [Register](extras/login/login.register "Login.Register")
- [hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit "Rampart.hook.RampartFormIt"): хук для любой формы на FormIt
- [hook.RampartQuip](extras/rampart/rampart.hook.rampartquip "Rampart.hook.RampartQuip"): хук для комментариев Quip

Также есть кастомная страница в менеджере: banlist, модерация помеченных пользователей и просмотр срабатываний блокировок.

### Включение DNS blacklisting Project Honey Pot

Rampart интегрирован с [Project Honey Pot](http://www.projecthoneypot.org), сервисом, который блокирует спам-сборщики и комментаторов. Через плагин RampartWall IP из Honey Pot полностью теряют доступ к сайту и автоматически попадают в banlist Rampart.

Включите интеграцию HoneyPot через системные настройки:

- rampart.honeypot.access_key: Access Key из аккаунта HoneyPot. Обязателен для работы
- rampart.honeypot.enabled: после настройки ключа установите «Yes» для включения. «No» отключает проверки HoneyPot

## См. также

1. [Rampart.hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister)
