---
title: Настройка менеджера
transition: building-sites/client-proofing/form-customization
---

## Что такое настройка формы?

Настройка формы - это новая функция, которая позволяет пользователям создавать правила, которые определяют, как страницы менеджера отображают свои формы в MODX Revolution Manager. Это похоже на ManagerManager в MODX Evolution.

## Как это работает?

В настоящее время форма настройки имеет 3 слоя:

> Профиль -> Наборы -> Правила

Профиль - это набор Наборов, а Наборы - это набор Правил. Профили могут быть ограничены определенными группами пользователей.

Набор представляет собой набор правил и привязан к определенному представлению. Обычно у вас есть Набор для страницы Ресурс / Создать и Набор для страницы Ресурс / Обновление. Наборы также могут быть привязаны к определенным [шаблонам](building-sites/elements/templates "Шаблоны") (то есть они загружаются, только когда ресурс использует этот шаблон). У них также может быть набор «Ограничение», который ограничивает выполнение набора ограничением, установленным в Ограничении.

Правило - это все варианты, применяемые в наборе. Правила скрыты от просмотра в MODX Revolution, но вместо этого отображаются в виде полей на странице «Редактирование набора».

Более подробную информацию о каждой части настройки формы можно найти на соответствующей странице каждой части:

1. [Настройка менеджера с помощью плагинов](_legacy/administering-your-site/customizing-the-manager-via-plugins)
2. [Профили настройки формы](building-sites/client-proofing/form-customization/profiles)
3. [Наборы настроек формы](building-sites/client-proofing/form-customization/sets)
    1. [Настройка вкладок с помощью настройки формы](building-sites/client-proofing/form-customization/tabs)
4. [Шаблоны и темы менеджера](building-sites/client-proofing/custom-manager-themes)

### Какие формы я могу настроить?

Страницы создания и обновления ресурса могут быть настроены в это время в настройке формы.

## Смотрите также

1. [Настройка менеджера с помощью плагинов](_legacy/administering-your-site/customizing-the-manager-via-plugins)
2. [Профили настройки формы](building-sites/client-proofing/form-customization/profiles)
3. [Наборы настроек формы](building-sites/client-proofing/form-customization/sets)
    1. [Настройка вкладок с помощью настройки формы](building-sites/client-proofing/form-customization/tabs)
4. [Шаблоны и темы менеджера](building-sites/client-proofing/custom-manager-themes)
