---
title: "Rampart.hook.RampartFormIt"
description: "Хук Rampart для антиспама в формах FormIt"
translation: "extras/rampart/rampart.hook.rampartformit"
---

## hook.RampartFormIt

Чтобы включить антиспам Rampart в формах FormIt, добавьте hook.RampartFormIt как hook в вызов FormIt:

``` php
[[!FormIt?
    &hook=`hook.RampartFormIt`
    &rptErrorField=`rampart`
    &submitVar=`contact_me`
]]

/* somewhere in my form */
[[!+fi.error.rampart]]
```

## Доступные свойства

Свойства передаются в вызов FormIt:

| имя                    | описание                                                                                                                                                                           | по умолчанию                                      |
| ---------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------- |
| rptErrorField          | Имя поля, в которое Rampart запишет сообщение об ошибке при обнаружении спама                                                                                                      | email                                             |
| rptUsernameField       | Если поле username называется иначе, укажите имя здесь для проверки как username. Если поле не найдено, проверка пропускается                                                      | username                                          |
| rptEmailField          | Если поле email называется иначе, укажите имя здесь для проверки как email. Если поле не найдено, проверка пропускается                                                          | email                                             |
| rptSpammerErrorMessage | Сообщение для поля, когда спамер пытается отправить форму                                                                                                                          | Your account has been banned as a spammer. Sorry. |

## См. также

1. [Rampart.hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister)
