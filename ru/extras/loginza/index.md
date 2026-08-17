---
title: "Loginza"
description: "OpenID-авторизация через Loginza: вход через Twitter, Google, Facebook и др."
translation: "extras/loginza/index"
---

## Описание

Компонент для провайдера OpenID 2.0 [Loginza](http://loginza.ru/?lang=en). Единый способ входа в популярные веб-сервисы: Twitter, Google, Facebook и другие.

Сниппет Loginza регистрирует пользователя при первом входе и обновляет профиль при следующих. Обновление можно отключить и дать пользователю самому заполнить нужные поля профиля.

### Требования

- MODX Revolution 2.1 или новее
- PHP5 или новее

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/loginza>

### Разработка и сообщения об ошибках

Loginza хранится и развивается на GitHub: <https://github.com/bezumkin/modx-loginza>

Сообщайте об ошибках здесь: <https://github.com/bezumkin/modx-loginza/issues>

## Использование

Loginza поставляется с одним сниппетом:

- [Loginza](extras/loginza/loginza "Loginza.Loginza")

И двумя чанками:

- [tpl.Loginza.login](extras/loginza/tpl.loginza.login "tpl.Loginza.login")
- [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout "tpl.Loginza.logout")

## См. также

1. [Loginza.Loginza](extras/loginza/loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)
