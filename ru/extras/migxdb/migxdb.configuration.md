---
title: "Конфигурация"
description: "Как работает тип ввода MIGXdb TV и базовая настройка компонента"
translation: "extras/migxdb/migxdb.configuration"
---

## Как работает тип ввода MIGXdb TV

С MIGXdb вы управляете записями пользовательских таблиц.

Записи в сетке по умолчанию привязываются к редактируемому ресурсу через поле `resource_id` в пользовательской таблице.

Для каждого поля записи в окне редактора можно задать тип ввода TV. Это настраивается в конфигураторе MIGX и/или через конфигурационные файлы для более сложных сценариев.

Для полей формы доступны типы ввода TV, например:

- image-TV
- checkbox-TV
- dropdown-TV
- richtext-TV
- radio-TV

и большинство других типов ввода TV, включая пользовательские.

В MIGXdb есть небольшой инструмент управления пакетами. С его помощью можно создавать CMP для пользовательских таблиц.

Есть настраиваемая сетка по умолчанию и стандартные процессоры.
Контекстные меню, кнопки действий и связанные функции можно добавить галочками.
Вы также можете создать собственные контекстные меню, кнопки и функции для повторного использования в разных сетках.
При необходимости подключите полностью свою extjs-сетку и свои процессоры.

## Установка: Package Manager / MIGX-Configurator CMP

### Создайте новое действие

System -> Actions

щёлкните правой кнопкой по «migx» -> create Action here

controller: index

### Создайте новый пункт меню

System -> Actions

щёлкните правой кнопкой по «Components» -> Place Action here

- lexicon key: **migx**
- action: **migx - index**
- parameters: `&configs=packagemanager||migxconfigs||setup`

### Настройка для Revo 2.3+

System -> Top Menu, выберите «Components», нажмите «Create Menu»

- lexicon key: **migx**
- action: **index**
- parameters: `&configs=packagemanager||migxconfigs||setup`
- namespace: **migx**

Чтобы таблица конфигурации была создана и актуальна,
откройте components -> migx -> вкладку setup -> нажмите «setup»

## Обновление с версий MIGX до 2.0

Сначала сделайте резервную копию таблиц БД, особенно modx\_site\_tmplvar\_contentvalues. Откройте components -> migx -> вкладку setup, перейдите на вкладку upgrade и нажмите «upgrade».
Это добавит новое автоинкрементное поле `MIGX_id` ко всем элементам MIGX-TV.
Сниппет getImageList использует это поле для корректной работы.

## Настройка первого MIGXdb

Лучший способ разобраться с MIGXdb: пройти пошаговый учебник от схемы БД и таблицы до управления через MIGXdb-TV.

См. [Учебники MIGXdb](extras/migxdb/migxdb.tutorials "MIGXdb.Tutorials")
