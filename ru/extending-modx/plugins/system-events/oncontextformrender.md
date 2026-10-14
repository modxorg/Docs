---
title: "OnContextFormRender"
translation: "extending-modx/plugins/system-events/oncontextformrender"
description: "Событие запускается после отрисовки формы редактирования контекста в менеджере."
---

## Событие: OnContextFormRender

Событие запускается после загрузки формы редактирования контекста. Событие вызывается только из формы **редактирования** контекста, поэтому `mode` всегда 'upd'.

- Служба: 2 - Manager Access Events
- Group: Contexts

## Параметры события

| Имя     | Описание                                         |
| ------- | ------------------------------------------------ |
| key     | Ключ контекста.                                  |
| context | Ссылка на объект modContext.                     |
| mode    | Всегда 'upd' (modSystemEvent::MODE\_UPD).        |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
