---
title: "Тип вывода TV - HTML-тег"
translation: "building-sites/elements/template-variables/output-types/html"
---

## Тип вывода TV - HTML-тег

Этот тип вывода оборачивает каждую часть значения TV в HTML-тег. Сохранённое значение он режет по `||`.

**Check Box** и **Listbox (Multi-Select)** хранят `||` между вариантами, поэтому этот тип их разделяет. **Tag** и **Auto-Tag** хранят список через запятую, поэтому этот тип их не разделяет.

## Свойства вывода

| Имя | Описание |
| --- | --- |
| Название тега | Имя элемента, например `div` или `span`. Если поле пустое, тег будет `div`. |
| ID | Задумано как `id` тега. До тега не доходит. |
| Класс | CSS-класс тега. |
| Стиль | CSS в атрибуте `style`. |
| Атрибуты | Дополнительные HTML-атрибуты. До тега не доходят. |

> [!WARNING]
> **ID** и **Атрибуты** до тега не доходят. **Название тега**, **Класс** и **Стиль** доходят. Соберите нужный атрибут сниппетом или фильтром вывода.

## См. также

1. [Тип вывода Date](building-sites/elements/template-variables/output-types/date)
2. [Тип вывода Delimiter](building-sites/elements/template-variables/output-types/delimiter)
3. [Тип вывода HTML Tag](building-sites/elements/template-variables/output-types/html)
4. [Тип вывода Image](building-sites/elements/template-variables/output-types/image)
5. [Тип вывода URL](building-sites/elements/template-variables/output-types/url)
