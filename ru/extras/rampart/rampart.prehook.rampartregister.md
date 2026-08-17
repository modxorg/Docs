---
title: "Rampart.preHook.RampartRegister"
description: "PreHook Rampart для антиспама при регистрации через Register"
translation: "extras/rampart/rampart.prehook.rampartregister"
---

## preHook.RampartRegister

Чтобы включить антиспам Rampart в формах Register, добавьте preHook.RampartRegister как preHook:

``` php
[[!Register?
    &preHooks=`math,preHook.RampartRegister`
    &moderatedResourceId=`217`
    &submittedResourceId=`194`
    &activationResourceId=`193`
    &submitVar=`login-register-btn`
]]
```

Если задано свойство moderatedResourceId, регистрации, помеченные как возможный спам, перенаправляются на этот ресурс вместо страницы &submittedResourceId.

Rampart блокирует спам-регистрации: помечает подозрительных пользователей и не активирует аккаунт до одобления модератором. Одобрение выполняется на кастомной странице Rampart в админке MODX. После одобления пользователь получит письмо подтверждения и должен подтвердить регистрацию для активации.

### Как это работает?

Rampart сравнивает регистрации с banlist, который вы редактируете на кастомной странице в менеджере. При совпадении с шаблоном блокировки регистрация полностью отклоняется.

Также выполняется проверка через [StopForumSpam](http://stopforumspam.com/) по email и комбинации username+ip. При совпадении регистрация помечается как «flagged», активация и письмо подтверждения блокируются до одобления модератором на кастомной странице Rampart.

## Доступные свойства

Свойства передаются в вызов Register:

| имя                    | описание                                                                         | по умолчанию                                      |
| ---------------------- | -------------------------------------------------------------------------------- | ------------------------------------------------- |
| rptSpammerErrorMessage | Сообщение для поля, когда заблокированный пользователь пытается зарегистрироваться | Your account has been banned as a spammer. Sorry. |

## См. также

1. [Rampart.hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister)
