---
title: "Тип вывода TV - Дата"
translation: "building-sites/elements/template-variables/output-types/date"
---

## Тип вывода TV - Дата

Этот тип вывода печатает значение TV как дату. Строка формата использует символы [strftime](https://www.php.net/strftime).

Тип вывода Date и фильтр вывода `date` оба вызывают `strftime`. С PHP 8.1 это пишет предупреждение в журнал MODX. Функцию уберут в PHP 9. Форматируйте дату сниппетом с `date()`.

## Свойства вывода

| Имя | Описание |
| --- | --- |
| Формат даты | Строка формата [strftime](https://www.php.net/strftime). В поле с самого начала стоит `%A %d, %B %Y`. |
| Использовать текущую дату как откат | Если у TV нет значения, печатать текущее время. В поле с самого начала стоит «нет», и на страницу ничего не попадает. |

## Примеры

| Строка формата | Пример |
| --- | --- |
| `%A %d, %B %Y` | Friday 01, April 2011 |
| `%Y-%m-%d` | 2011-04-01 |
| `%b %e, %Y` | Apr 1, 2011 |

## См. также

1. [Тип вывода Date](building-sites/elements/template-variables/output-types/date)
2. [Тип вывода Delimiter](building-sites/elements/template-variables/output-types/delimiter)
3. [Тип вывода HTML Tag](building-sites/elements/template-variables/output-types/html)
4. [Тип вывода Image](building-sites/elements/template-variables/output-types/image)
5. [Тип вывода URL](building-sites/elements/template-variables/output-types/url)
