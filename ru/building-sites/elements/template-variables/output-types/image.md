---
title: "Тип вывода TV - Изображение"
translation: "building-sites/elements/template-variables/output-types/image"
---

## Тип вывода TV - Изображение

Этот тип вывода оборачивает значение TV в тег `img`. Ставьте его вместе с типом ввода Image.

## Свойства вывода

| Имя | Описание |
| --- | --- |
| Альтернативный текст | Текст атрибута `alt`. Если поле пустое, в тег всё равно попадает `alt=""`. |
| ID | Значение атрибута `id`. |
| Класс | CSS-класс тега `img`. |
| Стиль | CSS в атрибуте `style`. |
| Атрибуты | Дополнительные HTML-атрибуты тега. |

Если сохранённое значение выглядит как `подпись==путь`, адресом картинки становится подпись, часть до `==`. Путь после `==` в `src` не попадает. Храните путь отдельно, если именно он должен быть адресом картинки.

## См. также

1. [Тип вывода Date](building-sites/elements/template-variables/output-types/date)
2. [Тип вывода Delimiter](building-sites/elements/template-variables/output-types/delimiter)
3. [Тип вывода HTML Tag](building-sites/elements/template-variables/output-types/html)
4. [Тип вывода Image](building-sites/elements/template-variables/output-types/image)
5. [Тип вывода URL](building-sites/elements/template-variables/output-types/url)
