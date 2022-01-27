---
title: "OnElementNotFound"
translation: "extending-modx/plugins/system-events/onelementnotfound"
description: "Событие OnElementNotFound запускается парсером при обработке тегов в контенте страницы, когда не удается найти элемент modElement"
---

## Событие: OnElementNotFound

Запускается парсером при обработке тегов в контенте страницы, когда не удается найти элемент `modElement`. 

- Служба: Parser Service Events
- Группа: System

## Параметры события

| Имя    | Описание                                            |
| ----- | ---------------------------------------------------------------- |
| class | Ссылка на производный от `modElement` класс, который он пытался загрузить.  |
| name  | Имя элемента / тега                                      |

## Смотрите также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")