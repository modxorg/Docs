---
title: "sekFormTools.input.datepicker"
description: "Сниппет date picker sekFormTools"
translation: "extras/sekformtools/sekformtools.input.datepicker"
---

## Что такое input.datepicker?

Этот сниппет быстро добавляет date picker в форму.

## Использование

Пример input.datepicker:

``` php
[[input.datepicker? &value=`5/3/2012`]]
```

## Свойства

| Имя          | Описание                                                   | По умолчанию | Обязательно | Версия |
| ------------- | ------------------------------------------------------------- | ------- | -------- | ------- |
| `input_id`    | ID поля ввода.                            |         |          | >0.0.1  |
| `name`        | Имя поля ввода.                          |         |          | >0.0.1  |
| `value`       | Значение поля ввода.                         |         |          | >0.0.1  |
| `menu`        | «1» добавляет выпадающие год и месяц в date picker. |         |          | >0.0.1  |
| `date_format` | Формат даты.              |         |          | >0.0.1  |
| `min_date`    | Минимальная дата.                                  |         |          | >0.0.1  |
| `max_date`    | Максимальная дата.                        |         |          | >0.0.1  |
| `animation`   | Способ показа календаря.                         | show    |          | >0.0.1  |

### date\_format

Дату можно форматировать по-разному, примеры:

- mm/dd/yy
- yy-mm-dd
- d M, y
- d MM, y
- DD, d MM, yy

### animation

Доступно несколько анимаций:

- show (по умолчанию)
- slideDown
- fadeIn
- blind
- bounce
- clip
- drop
- fold
- slide
