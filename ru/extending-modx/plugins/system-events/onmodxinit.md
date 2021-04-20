---
title: "OnMODXInit"
translation: "extending-modx/plugins/system-events/onmodxinit"
---

## Событие: OnMODXInit

 Вызывается при инициализации объекта MODX.

 Служба: 5 - Manager Access Events
 Группа: System

## Параметры события

 | Имя        | Описание                                       |
 | ---------- | ---------------------------------------------- |
 | contextKey | context\_key инициализируемого контекста       |
 | options    | Любые параметры переданы функцией initialize() |

## Remarks

 | Предыдущее событие | ?                                                                                                                  |
 | ------------------ | ------------------------------------------------------------------------------------------------------------------ |
 | Следующее событие  | ?                                                                                                                  |
 | File               | [core/model/modx/modx.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modx.class.php) |
 | Class              | class modx                                                                                                         |
 | Method             | public function initialize($contextKey= 'web', $options = null)                                                    |

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
