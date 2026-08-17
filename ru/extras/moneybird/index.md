---
title: "MoneyBird"
description: "Список счетов MoneyBird для пользователей MODX на фронтенде"
translation: "extras/moneybird/index"
---

## Что такое MoneyBird?

MoneyBird это онлайн-система счетов, популярная в Нидерландах и за их пределами. Компонент MoneyBird для MODX связывает контакты MoneyBird с локальными пользователями MODX и выводит счета пользователя на странице аккаунта через простые сниппеты и настраиваемые чанки.

Совет: защитите страницы [Resource Groups](administering-your-site/security/resource-groups "Resource Groups") и используйте [Login](extras/login "Login") для входа на фронтенде.

MoneyBird for MODX поддерживает только вывод списка счетов с контактами на фронтенде.
В будущем могут появиться дополнительные функции.

## История

MoneyBird написал Bert Oost как дополнение для вывода счетов MoneyBird. Первый релиз вышел 17 июня 2012 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/moneybird>

### Разработка и сообщения об ошибках

MoneyBird на GitHub: <https://github.com/bertoost/MODX-MoneyBird>

Сообщайте об ошибках здесь: <https://github.com/bertoost/MODX-MoneyBird/issues>

## Использование

Дополнение MoneyBird состоит из 3 сниппетов (1 output filter):

- [Invoices](extras/moneybird/moneybird.invoices "MoneyBird.Invoices"): список счетов всех контактов одного пользователя
- [Contacts](extras/moneybird/moneybird.contacts "MoneyBird.Contacts"): список контактов одного пользователя
- [NrFormat](extras/moneybird/moneybird.nrformat "MoneyBird.NrFormat"): форматирование цен через PHP Number Format

## См. также

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)
