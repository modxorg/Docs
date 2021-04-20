---
title: "spam"
description: "Хук spam для Formit"
translation: "extras/formit/formit.hooks/spam"
---

## Хук spam для Formit

Хук проверяет все поля, указанные в свойстве `spamEmailFields`, на соответствие фильтру спама через [StopForumSpam](http://www.stopforumspam.com/). Если пользователь отмечен как спамер, будет показано сообщение об ошибке для этого отмеченного поля.

Для хука требуется поддержка `cURL` или `Sockets` в вашей установке PHP (те же требования для [Управление пакетами](development-in-modx/advanced-development/package-management «Управление пакетами»)). 

## Возможные параметры

| имя             | описание                                                                        |
| --------------- | ------------------------------------------------------------------------------- |
| spamEmailFields | Опциональный. Список полей,где указана адреса электронной почты, разделенных запятыми, для проверки. По умолчанию "email".  |
| spamCheckIp     | Если 'true', также будет проверяться IP отправителя. По умолчанию 'false'.      |

## Использование

Просто укажите хук "spam" в вызове FormIt, остальное сниппет сделает сам. 

``` php
[[!FormIt? &hooks=`spam`]]
```

### Проверка IP адреса на спам

Хотя **настоятельно не рекомендуется** использовать IP адрес для проверки на спам (поскольку спамеры могут легко изменить IP адреса, а проверка IP адресов часто дает ложные срабатывания), FormIt предоставляет вам такую возможность. Просто установите для параметра `&spamCheckIp` значение 1 при вызове FormIt. 

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
