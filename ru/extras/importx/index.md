---
title: "ImportX"
description: "Extra MODX для быстрого создания ресурсов из CSV"
translation: "extras/importx/index"
---

## What is ImportX?

ImportX это extra MODX для быстрого создания ресурсов из CSV. Данные можно вставить в textarea или загрузить файл .txt или .csv.

Разработку финансировала Working Party, цифровое агентство из Сиднея.

## Requirements

- MODX 2.1+

## History

Начальная разработка стартовала в апреле 2011 года, автор Mark Hamstra.

## Usage

![](menu.png)

ImportX прост: передайте CSV и задайте несколько опций под вашу задачу.

После установки через Package Manager обновите страницу и найдите ImportX в меню Components (см. изображение справа). Откройте и посмотрите доступные опции. Большая часть интуитивна.

### CSV Input tab

![](import.png)

На изображении слева экран ImportX 1.0-rc. Есть большая textarea для raw CSV или загрузки csv-файла в поле ниже.

Есть поле "Separator", строка между двумя колонками CSV. Может быть любой, в том числе из нескольких символов. По умолчанию точка с запятой ";".

Кнопка отправки в правом верхнем углу рабочей области, если вы её ещё не заметили.

ImportX не привязан к формату CSV, если:

- Известен разделитель. По умолчанию ";" (semi-colon), его можно сменить на вкладке CSV Input.
- Первая строка содержит "heading", то есть названия колонок. Могут быть поля ресурса (пример: pagetitle;alias;richtext) и Template Variables. TV указывают как "tvN", где N это ID template variable. Пример заголовка: pagetitle;alias;richtext;tv3;content;tv4.
- Есть хотя бы одна строка значений.
- В каждой строке одинаковое число элементов. Элемент или ячейка это значение записи для конкретного поля.
- В заголовке столько же элементов, сколько в строках значений.

### Default Settings

Вкладка Default Settings содержит настройки по умолчанию. ![](import-tab.png)

Это поведение по умолчанию, в том числе когда вы ничего не указали, тогда считается false!

С 1.0.0-rc можно задать:

- Parent: целое число с ID существующего ресурса, context\_key для импорта в корень контекста или 0 для корня web по умолчанию.
- Published: публиковать ресурс по умолчанию.
- Searchable: делать ресурс доступным для поиска по умолчанию
- Hide from menus: скрывать ресурс в меню по умолчанию.

### Doing the magic (and troubleshooting errors)

После "Start Import" скрипт разбирает CSV. При успехе вывод может выглядеть так:

![](console.png)

Можно скачать вывод или закрыть окно. Дерево ресурсов обновится автоматически.

При другом выводе смотрите таблицу ниже.

| Error                                                                                             | Cause                                                                                                                                                                                                                     | How to fix                                                                                                                                                         |
| ------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| Please choose a Parent to import to. Specify 0 to put new resources in the root of the site.      | Поле "parent" на вкладке Default settings пустое. Нужно указать 0, валидный ID ресурса или context\_key.                                                                                | Измените значение в поле "Parent" на вкладке default settings.                                                                                                |
| Parent not numeric or valid context key.                                                          | 1. Поле "parent" не числовое.                                                                                                                                                                                     |
| 2. context\_key из Default settings не существует.                        | 1. Укажите числовое значение parent.                                                                                                                                                                            |
| 2. Проверьте написание context\_key.                                                       |
| Parent needs to be a positive integer.                                                            | В parent указано отрицательное число.                                                                                                                                                                      | Укажите 0 или положительное число в parent.                                                                                                                |
| Please add your CSV values in order for them to be processed.                                     | CSV не указан.                                                                                                                                                                                        | Добавьте ввод вручную или загрузите файл.                                                                                                                            |
| Error reading the uploaded file.                                                                  | Файл загружен, но при чтении ошибка. Возможны проблемы файла или чтения из временной папки на сервере.                                                         | Проверьте файл. При необходимости проверьте open\_basedir.                                                                                    |
| Invalid CSV value posted.                                                                         | Длина CSV меньше 10 символов, считается невалидным.                                                                                                                                | CSV должен быть не короче 10 символов.                                                                                                           |
| Not enough data given. Expecting at least one header row, and one data row.                       | Нужны минимум строка заголовка и строка данных. Строки разделяются переводом строки (\\n).                                                                              | Проверьте, что строки разделены newline.                                                                                           |
| Element count do not match. Please check for correct syntax on line `[[+line]]`.                  | В одной строке другое число элементов. Частая причина: разделитель внутри значения поля.                                                       | Используйте trailing separators одинаково. Разделитель не должен встречаться в значении. Если встречается, смените seperataro.                          |
| An unexpected error occurred saving the resource.                                                 | MODX Processor вернул ошибку. До 1.0.0-pl было "Array", исправлено в 1.0.0-pl. Часто связано с безопасностью.                           | Зависит от конкретной ошибки.                                                                                                                                     |
| Your header has one or more invalid fieldnames. The invalid fieldname(s) is (are): `[[+fields]]`. | В заголовке неизвестные имена полей. При загрузке файла возможны проблемы кодировки. | Исправьте имена (TV как "tvN", где N это id TV), или откройте файл в notepad и вставьте в Raw CSV textarea. |
| `[[+field]]` (`[[+int]]` is expected to be an integer                                             | Элемент заголовка начинается с "tv", но `[[+int]]` не число и TV не найти.                                                                                    | Исправьте элемент заголовка.                                                                                                                                        |
| `[[+field]]` (no TV with an ID of `[[+id]]`)                                                      | Элемент заголовка ссылается на TV, но TV с таким ID нет.                                                                                                                                            | Исправьте элемент заголовка.                                                                                                                                        |

### ExampleCSV and some CSV-related notes

``` php
pagetitle;alias;isfolder
Analysing;analysing;1
Communicating;communicating;0
Rock solid copy;sepiariverstudios;0
Editing your resources remotely;modxmobile;0
```

(Простой пример, welcome a better example!)

Заметки по CSV:

1. Не используйте разделитель в поле content. Можно взять ";;;" при большом объёме контента с ";".
2. При импорте template или user (createdby и т.д.) передавайте ID связанного объекта, не имя.
3. **TV Values** импортируют через заголовки "tv4", где 4 это ID TV.
4. Переносы абзацев в данных содержат "\\n". Их нужно убрать или заменить, ImportX считает их концом записи.
5. В CSV часто есть лишняя пустая строка в конце. Удалите её, например в Notepad++.

### Execution Time Issues

С ImportX 1.1 импорт пытается задать time limit и сообщает результат.

На Windows/IIS при таймауте около 30 секунд [смотрите решения на форуме](http://forums.modx.com/thread/71118/can-importx-import-7-000-records#dis-post-397394).

### Updating Data instead of creating new Resources

С 1.1 можно сменить системную настройку importx.processor с "create" на "update" для обновления ресурсов по ID из запроса. Если ресурс не найден, он создаётся.

## Other formats than CSV

С 1.1 можно добавить другие форматы, addon частично нормализован.

Напишите новый класс (см. core/components/importx/processors/prepare/, prepare.class.php базовый, csv.php текущий) и смените importx.datatype на имя файла без ".php".

Сейчас только CSV, но XML или другие форматы приветствуются. Пишите hello@markhamstra.com, если нужна помощь.

## And now

Используйте!

Если проблема не описана выше, сообщите на Github: <https://github.com/Mark-H/importX>

Github также для багов и feature requests. Issue tracker показывает запланированные функции.
