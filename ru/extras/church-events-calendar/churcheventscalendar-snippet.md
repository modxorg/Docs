---
title: "ChurchEventsCalendar Snippet"
description: "Сниппет календарной сетки Church Events и настройка чанков"
translation: "extras/church-events-calendar/churcheventscalendar-snippet"
---

## Настройка календаря

Church Events Calendar выводит всё через чанки. Чанки в Elements -> Chunks -> ChurchEvents.

Рекомендуется дублировать нужный чанк и переименовать, чтобы правки не потерялись при обновлении. Для порядка создайте отдельную папку под свои чанки.

После правок чанка добавьте в URI параметр clearCache, так как у Church Events свой кеш. Например для Day view и dayEventTpl: ?clearCache=Y или &clearCache=Y.

## Доступные свойства

Version 1.0

### Общие чанки для сетки (day/week/month/year)

| Имя              | Описание                                                                                                                               | Значение по умолчанию                 |
| ----------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------- |
| headTpl           | JS/CSS календаря в `<head>`, можно использовать результат цикла categoryHeadTpl: `[[+categoryHeadTpl]]` | ChurchEvents\_HeadTpl         |
| categoryHeadTpl   | CSS или JS категорий в цикле для `<head>`                                                                    | ChurchEvents\_CategoryHeadTpl |
| calFilterTpl      | Фильтр календаря                                                                                                                           | ChurchEvents\_CalFilterTpl    |
| calAdminFilterTpl | Фильтр календаря (добавлено в 1.1)                                                                                                            | ChurchEvents\_CalFilterTpl    |
| calNavTpl         | Навигация календаря, следующий и предыдущий месяц                                                                                             | ChurchEvents\_CalNavTpl       |
| calendarID        | Календарь по умолчанию (добавлено в 1.1)                                                                                     | 0                             |
| categoryID        | Категория по умолчанию (добавлено в 1.1)                                                                                     | 0                             |

### Чанки day view

Day view показывает все события выбранного дня с учётом фильтров.

| Имя         | Описание                                              | Значение по умолчанию              |
| ------------ | -------------------------------------------------------- | -------------------------- |
| dayEventTpl  | Событие календаря                                           | ChurchEvents\_DayEventTpl  |
| dayHolderTpl | Контейнер дня, по умолчанию общий с month view | ChurchEvents\_DayHolderTpl |

### Чанки week view

Week view: дни с воскресенья по понедельник и события по фильтрам.

| Имя              | Описание                                                 | Значение по умолчанию                  |
| ----------------- | ----------------------------------------------------------- | ------------------------------ |
| weekTableTpl      | Таблица календаря, по умолчанию общая с month view         | ChurchEvents\_CalTableTpl      |
| weekRowTpl        | Строка календаря, по умолчанию общая с month view           | ChurchEvents\_CalRowTpl        |
| weekEventTpl      | Событие, по умолчанию общее с month view         | ChurchEvents\_CalEventTpl      |
| weekDayHolderTpl  | Контейнер дня, по умолчанию общий с month view    | ChurchEvents\_CalDayHolderTpl  |
| weekColumnHeadTpl | Заголовок колонки, по умолчанию общий с month view | ChurchEvents\_CalColumnHeadTpl |
| weekColumnTpl     | Колонка, по умолчанию общая с month view        | ChurchEvents\_CalColumnTpl     |

### Чанки month view

Month view: месяц в виде таблицы и события по фильтрам.

| Имя             | Описание            | Значение по умолчанию                  |
| ---------------- | ---------------------- | ------------------------------ |
| calTableTpl      | Таблица календаря         | ChurchEvents\_CalTableTpl      |
| calRowTpl        | Строка календаря           | ChurchEvents\_CalRowTpl        |
| calEventTpl      | Событие календаря         | ChurchEvents\_CalEventTpl      |
| calDayHolderTpl  | Контейнер дня    | ChurchEvents\_CalDayHolderTpl  |
| calColumnHeadTpl | Заголовок колонки | ChurchEvents\_CalColumnHeadTpl |
| calColumnTpl     | Колонка        | ChurchEvents\_CalColumnTpl     |

### Чанки year view

Year view: 12 месяцев таблицами и сумма событий по дням с учётом фильтров.

| Имя              | Описание                                                 | Значение по умолчанию                  |
| ----------------- | ----------------------------------------------------------- | ------------------------------ |
| yearTableTpl      | Таблица календаря                                              | ChurchEvents\_YearTableTpl     |
| yearRowTpl        | Строка, по умолчанию общая с month view           | ChurchEvents\_CalRowTpl        |
| yearColumnHeadTpl | Заголовок колонки, по умолчанию общий с month view | ChurchEvents\_CalColumnHeadTpl |
| yearColumnTpl     | Колонка                                             | ChurchEvents\_YearColumnTpl    |

### Чанки location view

Представление видно при useLocations = Yes. Показывает данные одной локации.

| Имя                   | Описание                          | Значение по умолчанию                        |
| ---------------------- | ------------------------------------ | ------------------------------------ |
| locationDescriptionTpl | Вся информация об одной локации | ChurchEvents\_LocationDescriptionTpl |

### Чанки event description view

| Имя                             | Описание                                                                                                                                                          | Значение по умолчанию                                  |
| -------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------- |
| eventDescriptionTpl              | Описание одного события (страница события).                                                                                      | ChurchEvents\_EventDescriptionTpl              |
| eventDescriptionBasicLocationTpl | Базовая локация на странице события. Только при Use Locations = No.                                                       | ChurchEvents\_EventDescriptionBasicLocationTpl |
| eventDescriptionLocationTypeTpl  | Цикл по типам локаций (зданиям) и комнатам на странице события. Только при Use Locations = Yes. | ChurchEvents\_EventDescriptionLocationTypeTpl  |
| eventDescriptionLocationTpl      | Цикл по комнатам на странице события. Только при Use Locations = Yes.                         | ChurchEvents\_EventDescriptionLocationTpl      |

### Чанки add/edit event view

| Имя                      | Описание                                                                                                                                                   | Значение по умолчанию                           |
| ------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------- |
| eventFormHeadTpl          | JS/CSS формы add/edit/request в `<head>`.                                                                                                      | ChurchEvents\_EventFormHeadTpl          |
| eventFormTpl              | Форма add/edit, использует FormIt                                                                                                                          | ChurchEvents\_EventFormTpl              |
| eventFormConflictTpl      | Список конфликтующих событий. Только при Use Locations = Yes.                                                | ChurchEvents\_EventFormConflictTpl      |
| eventFormAdminTpl         | Админ-секция формы, только при правах админа                                                                                       | ChurchEvents\_EventFormAdminTpl         |
| eventFormRepeatTpl        | Повторяющиеся события в форме: все экземпляры или один                                                                                          | ChurchEvents\_EventFormRepeatTpl        |
| eventFormBasicLocationTpl | Базовая локация. Только при Use Locations = No.                                                                              | ChurchEvents\_EventFormBasicLocationTpl |
| eventFormLocationTypeTpl  | Цикл типов локаций и комнат на форме. Только при Use Locations = Yes. | ChurchEvents\_EventFormLocationTypeTpl  |
| eventFormLocationTpl      | Цикл комнат на форме. Только при Use Locations = Yes.                         | ChurchEvents\_EventFormLocationTpl      |

### Чанки delete event view

| Имя                | Описание                                                            | Значение по умолчанию                     |
| ------------------- | ---------------------------------------------------------------------- | --------------------------------- |
| deleteFormHeadTpl   | JS/CSS формы удаления                                         | ChurchEvents\_DeleteFormHeadTpl   |
| deleteFormTpl       | Форма удаления, FormIt                                     | ChurchEvents\_DeleteFormTpl       |
| deleteFormRepeatTpl | Повтор: удалить все или один экземпляр | ChurchEvents\_DeleteFormRepeatTpl |

### Skins

| Имя | Описание                                                                                                                                                                                                                                                                                                                                      | Значение по умолчанию |
| ---- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| skin | Скопируйте и переименуйте все tpl с префиксом ChurchEvents на свой, например MyCustomSkin. Вместо перечисления каждого свойства в вызове сниппета укажите skin. Значение отдельного tpl перекрывает skin для этого свойства. | ChurchEvents  |

### Чанки email

Письмо при запросе события

| Имя                  | Описание                                                                                                                                                       | Значение по умолчанию         |
| --------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------- |
| emailRequestNoticeTpl | Письмо при запросе события пользователем.                                                                                                   | emailRequestNoticeTpl |
| emailBasicLocationTpl | Базовая локация. Только при Use Locations = No.                                                                                  | emailBasicLocationTpl |
| emailLocationTypeTpl  | Цикл типов локаций в письме запроса. Только при Use Locations = Yes. | emailLocationTypeTpl  |
| emailLocationTpl      | Цикл комнат в письме запроса. Только при Use Locations = Yes.                         | emailLocationTpl      |

## Примеры

Базовый вывод полной календарной сетки

``` php
[[!ChurchEventsCalendar]]
```

Сетка с пользовательским calEventTpl

``` php
[[!ChurchEventsCalendar?
  &calEventTpl=`MyCustomCalEventTpl`
]]
```
