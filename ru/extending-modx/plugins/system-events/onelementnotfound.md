---
title: "OnElementNotFound"
translation: "extending-modx/plugins/system-events/onelementnotfound"
description: "Событие запускается парсером при обработке тегов в контенте страницы, когда не удается найти элемент modElement."
---

## Событие: OnElementNotFound

Событие запускается парсером при обработке тегов в контенте страницы, когда не удается найти элемент `modElement`.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя    | Описание                                                       |
| ------ | -------------------------------------------------------------- |
| class  | Ссылка на производный от `modElement` класс, который он пытался загрузить. |
| name   | Имя элемента / тега                                            |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
