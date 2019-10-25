---
title: "Тип вывода TV - Дата"
translation: "building-sites/elements/template-variables/output-types/date"
---

## Тип вывода TV - Дата

Этот тип позволяет выводить любой TV в виде даты, отформатированной так, как вы хотите.

## Свойства вывода

Эти выходные свойства выглядят как:

![](tvot.date.png)

| Имя         | Описание                                                                                                                                    |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
| Формат даты | Строка формата, аналогичная [PHP strftime method](http://php.net/strftime).                                                                 |
| default     | Если для TV не установлено значение, использовать текущее время? По умолчанию используется значение «Нет», которое выдает пустое значение.. |

## Примеры

| Формат строки | Пример вывода         |
| ------------- | --------------------- |
| %A %d, %B %Y  | Friday 01, April 2011 |
| %Y-%m-%d      | 2011-04-01            |
| %b %e, %Y     | Apr 1, 2011           |

## Смотрите также

1. [Тип вывода TV - Дата](building-sites/elements/template-variables/output-types/date)
2. [Разделитель TV тип вывода](building-sites/elements/template-variables/output-types/delimiter)
3. [Тип вывода TV - HTML тег](building-sites/elements/template-variables/output-types/html)
4. [Тип вывода TV - Изображение](building-sites/elements/template-variables/output-types/image)
5. [Тип вывода TV - URL](building-sites/elements/template-variables/output-types/url)
