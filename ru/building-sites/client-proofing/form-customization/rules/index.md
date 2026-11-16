---
title: "Правила настройки формы"
translation: "building-sites/client-proofing/form-customization/rules/index"
description: "Десять правил набора настройки формы в MODX: что делает каждое и в какой сетке набора оно задаётся."
---

## Что такое правила

Правила — это изменения, которые набор вносит в форму менеджера. Их десять, и каждое задаётся в одной из трёх сеток набора.

| Правило | Что делает | Где задаётся |
| --- | --- | --- |
| [Видимость поля](building-sites/client-proofing/form-customization/rules/field-visible "Видимость поля") | Прячет поле формы. | Поля, **Visible** |
| [Метка поля](building-sites/client-proofing/form-customization/rules/field-label "Метка поля") | Переименовывает поле формы. | Поля, **Label** |
| [Значение поля по умолчанию](building-sites/client-proofing/form-customization/rules/field-default "Значение поля по умолчанию") | Подставляет значение в поле формы. | Поля, **Default Value** |
| [Видимость области](building-sites/client-proofing/form-customization/rules/tab-visible "Видимость области") | Прячет область формы. | Области, **Visible** |
| [Заголовок области](building-sites/client-proofing/form-customization/rules/tab-title "Заголовок области") | Переименовывает область формы. | Области, **Title** |
| [Новая область](building-sites/client-proofing/form-customization/rules/new-tab "Новая область") | Добавляет свою область в форму. | Области, **Create** |
| [Видимость TV](building-sites/client-proofing/form-customization/rules/tv-visible "Видимость TV") | Прячет TV формы. | Template Variables, **Visible** |
| [Заголовок TV](building-sites/client-proofing/form-customization/rules/tv-title "Заголовок TV") | Переименовывает TV формы. | Template Variables, **Label** |
| [Значение TV по умолчанию](building-sites/client-proofing/form-customization/rules/tv-default "Значение TV по умолчанию") | Задаёт значение по умолчанию для TV. | Template Variables, **Default Value** |
| [Перенос TV в другую область](building-sites/client-proofing/form-customization/rules/move-tv-to-tab "Перенос TV в другую область") | Переносит TV в другую область. | Template Variables, **Region** |

## Правила не правятся напрямую

В MODX 3 нет сетки правил. Правила пересобираются из трёх сеток набора при каждом его сохранении, поэтому меняете вы сетку, а не правило.

Три сетки лежат на вкладках набора:

- **Set Information and Fields** — сам набор и поля формы;
- **Regions** — области формы;
- **Template Variables** — TV, назначенные шаблону набора.

## Порядок применения правил

Правила применяются в фиксированном порядке, чтобы одно правило не отменяло другое:

1. значение поля по умолчанию;
2. новая область, затем видимость и заголовок областей;
3. метка и видимость полей;
4. значение по умолчанию, метка и видимость TV;
5. перенос TV в другую область.

Перенос идёт последним намеренно: TV можно перенести в область, которую тот же набор только что создал.

## Смотрите также

1. [Правила настройки формы](building-sites/client-proofing/form-customization/rules)
2. [Наборы настроек формы](building-sites/client-proofing/form-customization/sets)
3. [Настройка вкладок](building-sites/client-proofing/form-customization/tabs)
