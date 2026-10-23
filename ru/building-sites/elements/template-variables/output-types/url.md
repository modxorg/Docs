---
title: "Тип вывода TV - URL"
translation: "building-sites/elements/template-variables/output-types/url"
---

## Тип вывода TV - URL

Этот тип вывода оборачивает значение TV в ссылку.

Целое число в значении становится ссылкой на этот ресурс, в виде `[[~id]]`. Несколько значений через `||` становятся несколькими ссылками. Между ними ставится `<br />`.

## Свойства вывода

| Имя | Описание |
| --- | --- |
| Показать текст | Текст ссылки. Если поле пустое, текстом ссылки остаётся само значение. |
| Заголовок | Атрибут `title`. Если поле пустое, берётся текст ссылки. |
| ID | Атрибут `id`. |
| Класс(ы) | CSS-класс ссылки. |
| Стиль | CSS в атрибуте `style`. |
| Цель | Куда открывается ссылка. В поле с самого начала стоит `_self`. Варианты: `_blank`, `_self`, `_parent`, `_top`. |
| Атрибуты | Дополнительные HTML-атрибуты. До тега они не доходят. |

> [!WARNING]
> То, что вы вводите в **Атрибуты**, на ссылке не появляется. **Показать текст**, **Заголовок**, **ID**, **Класс(ы)**, **Стиль** и **Цель** появляются. В этом типе вывода нет поля, которое добавит произвольный атрибут.

## См. также

1. [Тип вывода Date](building-sites/elements/template-variables/output-types/date)
2. [Тип вывода Delimiter](building-sites/elements/template-variables/output-types/delimiter)
3. [Тип вывода HTML Tag](building-sites/elements/template-variables/output-types/html)
4. [Тип вывода Image](building-sites/elements/template-variables/output-types/image)
5. [Тип вывода URL](building-sites/elements/template-variables/output-types/url)
