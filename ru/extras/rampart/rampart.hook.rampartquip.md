---
title: "Rampart.hook.RampartQuip"
description: "Хук Rampart для антиспама в комментариях Quip"
translation: "extras/rampart/rampart.hook.rampartquip"
---

## hook.RampartQuip

Чтобы включить антиспам Rampart в комментариях Quip, добавьте hook.RampartQuip как preHook в вызов Quip:

``` php
[[!Quip?
    &preHook=`hook.RampartQuip`
]]
```

Email из формы Quip автоматически проверяется по спамерам в системе.

## Доступные свойства

Свойства передаются в вызов FormIt:

| имя                    | описание                                                                           | по умолчанию                                      |
| ---------------------- | ---------------------------------------------------------------------------------- | ------------------------------------------------- |
| rptSpammerErrorMessage | Сообщение для поля, когда спамер пытается отправить форму                          | Your account has been banned as a spammer. Sorry. |

## См. также

1. [Rampart.hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister)
