---
title: "session_gc_maxlifetime"
translation: "building-sites/settings/session_gc_maxlifetime"
description: "Максимальный возраст сессий в БД до удаления сборщиком мусора modSessionHandler"
---

- **Имя**: Максимальное время жизни сборщика мусора для сессии  
- **Тип**: String  
- **По умолчанию**: 604800  
- **Доступен в**: Revolution 2.1.1+

Возраст в секундах, после которого [`modSessionHandler`](building-sites/settings/session_handler_class) может удалить строку сессии во время PHP session garbage collection. Значение по умолчанию `604800` — семь дней. При старте сессии MODX также выставляет это значение в ini `session.gc_maxlifetime`.

GC срабатывает только если позволяют `session.gc_probability` / `session.gc_divisor`. На многих хостах Debian/Ubuntu вероятность равна `0`, и настройка не работает, пока не поправите сервер или не добавите cron. См. [Сборка мусора сессий](getting-started/maintenance/session-garbage-collection).
