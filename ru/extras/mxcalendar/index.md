---
title: "mxCalendar"
description: "Календарь событий для Evolution и Revolution с повторениями, картами и категориями"
translation: "extras/mxcalendar/index"
---

![](logo-mxcalendar.png)

##### Документация дополняется. Пока см. <http://charlesmx.com/software/mxcalendar-revo.html> или помогите обновить раздел, если у вас есть доступ

## О mxCalendar

mxCalendar: extra для Evolution и Revolution с полным редактированием календаря в нативном менеджере ModX. Поддерживаются виды calendar, list и detail по стандартам шаблонов ModX для кастомизации тем. Есть повторяющиеся события, Google Maps, категории, контексты и отдельные календари.

## Установка

### ModX Revolution

Скачайте через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из MODX Extras Repository: <https://modx.com/extras/package/mxcalendar2>. При загрузке через Package Management нажмите «Install» после завершения. При скачивании с extras-сайта перенесите transport zip в «/core/packages/». Затем в менеджере (ver 2.2.x) откройте Package Management, стрелка у «Download Extras», «Search Locally for Packages», найдите «mxcalendars» и выберите «install».

### ModX Evolution

Скачайте из ModX Extras Repository: <https://modx.com/extras/package/mxcalendar>. Затем:

1. Unzip folder to your favorite place
2. Upload mxCalendar folder to your sites root /assets/modules/ folder
3. Copy contents of "snippets/mxCalendar.module.txt" file from the unzipped folder
4. Log into your Manager interface and goto the Modules > Manage Modules section
5. Select the New Module button
6. In the Module name field place mxcalendar
7. Past the content of "snippets/mxCalendar.module.txt" into the Module code (php) section
8. Select Save
9. Click the gear icon next to the new entry "mxcalendar" and select Run Module
10. You should see a screen saying the installation was successful, so click the Start button
11. Now you are in the new manager

## Creating Calendars

**\*Note**: Calendars are only supported in the Revo version of mxCalendar

В меню менеджера выберите **Components** -> **mxCalendar**. Вкладка **Calendars**, **Create New Calendar**. Назовите календарь, отметьте active (если снято) и сохраните.

![](mxcalendarcreatecalendar.jpg)

## Creating Categories

В меню **Components** -> **mxCalendar**, вкладка **Categories**, **Create New Category**. Укажите имя и опции, сохраните.

![](mxcalendarcreatecategory.jpg)

## Creating New Events

**Components** -> **mxCalendar**, вкладка **Events**, **Create New Calendar Item**.

Выберите context. Пусто: все контексты. Имя события, календарь, категория, дата и время начала и окончания.

Описание в rich text editor заполняет `[[*content]]` для детального просмотра.
![](mxcalendaraddevent.jpg)

На вкладке Location укажите название и адрес. «Display Map» выводит Google Map для адреса.
Пример: карта по умолчанию в styled modal (tplDetail или tplDetailModal).

![](mxcalendareventlocation.jpg)

![](mxcalendargooglemapmodalview.jpg)

На вкладке event укажите URL ссылки.

![](mxcalendaraddeventlink.jpg)

Документация вкладки Form скоро...

## Using mxCalendar

## Basic Use

После установки вызовите вид по умолчанию (calendar) в ресурсе:

``` php
[[!mxcalendar?]]
```

Получите календарь с полной перезагрузкой страницы при навигации. Для AJAX-навигации и modal деталей добавьте «ajaxResourceId» (новый ресурс с blank-шаблоном для ajax-ответа) и «modalView» = true.

``` php
[[!mxcalendar?
&ajaxResourceId=`43`
&modalView=`1`
]]
```

После перезагрузки основной страницы со сниппетом (не ajax-ресурса) вид тот же, но стрелки месяцев грузят контент через ajax. Клик по названию события открывает детали в modal.

## Parameters / Properties / Settings

| **Parameters**                         | **Type**                                     | **Default**                                                        | **Scope**                    | **Description**                                                                                                                                                                                                                                                                                |
| -------------------------------------- | -------------------------------------------- | ------------------------------------------------------------------ | ---------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| theme                                  | string                                       | default                                                            | calendar, mini, list, detail | Тема в «/assets/components/mxcalendars/theme/». Скопируйте default или traditional, измените и укажите имя папки.                                                        |
| resourceId                             | int                                          | (current resource)                                                 | calendar, mini, list, detail | ID ресурса для ссылок без ajax                                                                                                                                                                                                           |
| isLocked                               | boolean                                      | 0 (FALSE)                                                          | calendar, mini, list, detail | true: displayType не меняется от параметров или query string. Для нескольких вызовов на одной странице                                                                                             |
| displayType                            | string                                       | calendar                                                           | default                      | Режим по умолчанию, если не передан в вызове или query string                                                                                                                                                                                                                   |
| elStartDate                            | date                                         | now                                                                | list                         | PHP strtotime, минимальная дата списка                                                                                                                                                                                                                                    |
| elEndDate                              | date                                         | +4 weeks                                                           | list                         | Последняя дата фильтра будущих событий, PHP strtotime                                                                                                                                                                                        |
| tplListItem                            | String (chunk)                               | el.itemclean                                                       | list                         | Чанк для каждого события в списке                                                                                                                                                                                                                  |
| tplListHeading                         | String (chunk)                               | el.listheading                                                     | list                         | Чанк заголовка месяца в list view. Пустое значение скрывает заголовок                                                                                                                                                                                |
| tplListWrap                            | String (chunk)                               | el.wrap                                                            | list                         | Внешняя обёртка list view, часто с заголовком «Upcoming Events»                                                                                                                                                                                |
| eventListlimit                         | int                                          | 5                                                                  | list                         | Максимум элементов в списке, включая повторения одного события                                                                                                                                                                           |
| sort                                   | string (column name)                         | startdate                                                          | calendar, mini, list, detail | Колонка сортировки                                                                                                                                                                                   |
| dir                                    | string (ASC, DESC)                           | ASC                                                                | calendar, mini, list, detail | Направление сортировки                                                                                                                                                                                                                                                                  |
| limit                                  | int                                          | 99                                                                 | calendar, mini, list, detail | Максимум записей из запроса к БД                                                                                                                                                                                                                                |
| contextFilter                          | string (comma seperated)                     | empty; ?all + current context                                      | calendar, mini, list, detail | Фильтр контекстов. По умолчанию глобальные события без context плюс текущий context. Чтобы скрыть глобальные, задайте только текущий context. |
| calendarFilter                         | string (comma seperated list of category id) | null                                                               | calendar, mini               | Фильтр по calendar id события. По умолчанию все календари. Укажите id или список через запятую.                                     |
| elDirectional                          | date                                         | future                                                             | calendar, mini, list, detail | Направление списка от elStartDate. По умолчанию будущие события. Для прошлых задайте `past` и elStartDate=`now`.                                              |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Text and Date Formatting**           |                                              |
| dateformat                             | strftime                                     | %Y%m-%d                                                            | calendar, mini, list, detail | PHP strftime для даты. %O: ordinal suffix (_st_, _nd_, _rd_, _th_).                                                 |
| timeformat                             | strftime                                     | %H:%M %p                                                           | calendar, mini, list, detail | PHP strftime для времени. %O: ordinal suffix.                                                 |
| dateseperator                          | string                                       | /                                                                  | calendar, mini, list, detail | Разделитель в датах                                                                                                                                                                                                                                            |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Calendar view**                      |                                              |
| activeMonthOnlyEvents                  | boolean                                      | 0 (FALSE)                                                          | calendar                     | Только события дней текущего месяца                                                                                                                                                                                                                                           |
| highlightToday                         | boolean                                      | 1 (TRUE)                                                           | calendar                     | Добавляет @todayClass к текущей дате                                                                                                                                                                                                                                              |
| todayClass                             | String                                       | today                                                              | calendar, mini               | CSS class для текущей даты                                                                                                                                                                                                                                             |
| noEventsClass                          | String                                       | mxcDayNoEvents                                                     | calendar,mini                | CSS class для дней без событий                                                                                                                                                                                                                   |
| hasEventsClass                         | String                                       | mxcEvents                                                          | calendar, mini               | CSS class для дней с событиями                                                                                                                                                                                                                      |
| tplEvent                               | String (chunk)                               | tplEvent                                                           | calendar, mini               | Чанк для каждого события                                                                                                                                                                                                                                              |
| tplDay                                 | String (chunk)                               | tplDay                                                             | calendar, mini               | Чанк для дня месяца, обёртка tplEvent                                                                                                                                                                                                   |
| tplWeek                                | String (chunk)                               | tplWeek                                                            | calendar, mini               | Чанк для недели, обёртка tplDay                                                                                                                                                                                                    |
| tplMonth                               | String (chunk)                               | tplMonth                                                           | calendar, mini               | Чанк для месяца, обёртка tplWeek                                                                                                                                                                                                                |
| tplHeading                             | String (chunk)                               | tplHeading                                                         | calendar, mini               | Заголовок календаря с навигацией                                                                                                                                                                              |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Detail view**                        |                                              |
| tplDetail                              | String (chunk)                               | tplDetail                                                          | all                          | Чанк деталей события                                                                                                                                                                                                                                            |
| tplDetailModal                         | String (chunk)                               | tplDetailModal                                                     | all                          | Чанк деталей только для modal                                                                                                                                                                                                                       |
| mapHeight                              | String/Int                                   | 500px                                                              | all                          | Высота Google Map в деталях                                                                                                                                                                                                                                                 |
| mapWidth                               | String/Int                                   | 500px                                                              | all                          | Ширина Google Map в деталях                                                                                                                                                                                                                                                  |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Categories list**                    |                                              |
| showCategories                         | boolean                                      | 1 (TRUE)                                                           | calendar, mini               | Список категорий для фильтра событий                                                                                                                                                                             |
| tplCategoryWrap                        | String (chunk)                               | tplCategoryWrap                                                    | calendar, mini               | Обёртка вывода категорий                                                                                                                                                                                                                                       |
| tplCategoryItem                        | String (chunk)                               | tplCategoryItem                                                    | calendar, mini               | Элемент списка категорий                                                                                                                                                                                                                                   |
| labelCategoryHeading                   | String                                       | lexicon: mxcalendars.label\_category\_heading                      | calendar, mini               | Заголовок списка категорий                                                                                                                                                                                                                                                    |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Aux Parameters/Properties (global)** |                                              |
| addJQ                                  | boolean                                      | 1 (TRUE)                                                           | all                          | Подключить jQuery из @jqLibSrc                                                                                                                                                                                                                     |
| jqLibSrc                               | String                                       | <https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js> | all                          | URL библиотеки jQuery                                                                                                                                                                                                                            |
| usemxcLib                              | boolean                                      | 1 (TRUE)                                                           | all                          | Использовать modal JS из пакета mxCalendar                                                                                                                                                                                                                         |
| ajaxResourceId                         | int                                          | null                                                               | all                          | ID ресурса со сниппетом mxcalendars и **_blank template_** для modal                                                                                                                                                    |
| modalView                              | boolean                                      | 0 (FALSE)                                                          | all                          | Включить modal для событий                                                                                                                                                                                                                                                     |
| modalSetWidth                          | String/Int                                   | 80.00%                                                             | all                          | Ширина modal, % или px                                                                                                                                                                                               |
| modalSetHeight                         | String/Int                                   | 70.00%                                                             | all                          | Высота modal, % или px                                                                                                                                                                                              |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Google Map**                         |                                              |
| gmapLib                                | String                                       | <http://maps.google.com/maps/api/js?sensor=false>                  | detail                       | URL Google Map API                                                                                                                                                                                                                                                |
| gmapId                                 | String                                       | map                                                                | detail                       | id узла для Google Map                                                                                                                                                                                                                                |
| gmapDefaultZoom                        | Int                                          | 13                                                                 | detail                       | Zoom по умолчанию                                                                                                                                                                                                                                                  |
| gmapAPIKey                             | String                                       | null                                                               | detail                       | API key для повышенных лимитов                                                                                                                                                                                |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Holiday (coming soon)**              |                                              |
| holidays                               | Struct                                       | null                                                               | all                          | coming soon                                                                                                                                                                                                                                                                                    |
| holidayDisplayEvents                   | Boolean                                      | 1 (TRUE)                                                           | all                          | coming soon                                                                                                                                                                                                                                                                                    |
|                                        |                                              |                                                                    |                              |                                                                                                                                                                                                                                                                                                |
| **Debugging**                          |                                              |
|                                        |                                              |                                                                    |                              | use with caution, so not listed and not recommended to use                                                                                                                                                                                                                                     |
| debugTimezone                          | boolean                                      | 0 (FALSE)                                                          | all                          | Показать обработку дат для настроек сервера                                                                                                                                                                                                                 |
| debug                                  | boolean                                      | 0 (FALSE)                                                          | all                          | Подробный вывод обработки календаря для отладки                                                                                                                                                                   |
