---
title: "OnRichTextEditorInit"
translation: "extending-modx/plugins/system-events/onrichtexteditorinit"
---

## Событие: OnRichTextEditorInit

Визуализирует каждый раз, когда можно использовать Richtext Editor.

Служба: 1 - Parser Service Events
Group: Richtext Editor

## Параметры события

| Имя      | Описание                                                     |
| -------- | ------------------------------------------------------------ |
| editor   | Указанный редактор, который пользователь хочет использовать. |
| elements | Массив элементов для преобразования в RTE.                   |

Другие свойства могут быть переданы, такие как:

| forfrontend | Если он пройден, это будет указывать плагину, что он должен быть загружен во внешнем контексте, а не в менеджере. |
| ----------- | ----------------------------------------------------------------------------------------------------------------- |
| width       | Запрашиваемая ширина RTE.                                                                                         |
| height      | Запрашиваемая высота RTE.                                                                                         |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
