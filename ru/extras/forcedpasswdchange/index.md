---
title: "ForcedPasswdChange"
description: "Принудительная смена пароля пользователя в Менеджере MODX при первом входе"
translation: "extras/forcedpasswdchange/index"
---

## Что такое ForcedPasswdChange?

С ForcedPasswdChange вы создаёте или обновляете пользователя и включаете принудительную смену пароля в Менеджере. При включённой опции пользователь может войти, но не выполнит других действий, пока не сменит пароль.

### Требования

- MODX Revolution 2.0.0-RC-2 или новее
- PHP5 или новее

### История

ForcedPasswdChange написал Bert Oost ([www.oostdesign.nl](http://en.oostdesign.nl)). Компонент заставляет пользователя сменить пароль перед любыми другими действиями. Первый релиз: 4 декабря 2011 года.

### Загрузка

Скачайте через менеджер MODX Revolution в [Управлении пакетами](developing-in-modx/advanced-development/package-management "Package Management") или из репозитория MODX Extras.

## Разработка и сообщения об ошибках

ForcedPasswdChange хранится и развивается на GitHub: <https://github.com/bertoost/MODX-ForcedPasswdChange>

Ошибки сообщайте здесь: <https://github.com/bertoost/MODX-ForcedPasswdChange/issues>

## Как использовать

Установите extra и отредактируйте пользователя (не себя). Найдите флажок под блоком «New password». Включите его и войдите под созданным или отредактированным пользователем.
Скриншоты скоро появятся.

## События

После смены пароля срабатывает событие [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword).
