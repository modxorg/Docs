---
title: "OnContextFormPrerender"
translation: "extending-modx/plugins/system-events/oncontextformprerender"
description: "Событие запускается перед отрисовкой формы редактирования контекста в менеджере."
---

## Событие: OnContextFormPrerender

Событие запускается перед загрузкой формы редактирования контекста. Полезно для запуска пользовательского JavaScript. Событие вызывается только из формы **редактирования** контекста, поэтому `mode` всегда 'upd'.

- Служба: 2 - Manager Access Events
- Group: Contexts

## Параметры события

| Имя     | Описание                                  |
| ------- | ----------------------------------------- |
| key     | Ключ контекста.                           |
| context | Ссылка на объект modContext.              |
| mode    | Всегда 'upd' (modSystemEvent::MODE\_UPD). |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
