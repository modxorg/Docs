---
title: "OnMODXInit"
translation: "extending-modx/plugins/system-events/onmodxinit"
description: "Вызывается при инициализации объекта MODX."
---

## Событие: OnMODXInit

Вызывается при инициализации объекта MODX.

- Служба: 5 - Template Service Events
- Group: System

## Параметры события

| Имя        | Описание                                     |
| ---------- | -------------------------------------------- |
| contextKey | context\_key инициализируемого контекста     |
| options    | Любые параметры, переданные в initialize()   |

## Примечания

| Предыдущее событие | ?                                                                                                   |
| ------------------ | --------------------------------------------------------------------------------------------------- |
| Следующее событие  | ?                                                                                                   |
| Файл               | [core/src/Revolution/modX.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modX.php) |
| Класс              | MODX\Revolution\modX                                                                                |
| Метод              | public function initialize($contextKey= 'web', $options = null)                                      |

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
