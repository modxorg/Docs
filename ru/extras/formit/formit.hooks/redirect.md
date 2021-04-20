---
title: "redirect"
description: "Хук redirect для Formit"
translation: "extras/formit/formit.hooks/redirect"
---

## redirect хук для Formit

Хук перенаправит пользователя на указанный ресурс, когда его HTML форма завершит отправку. Для этого требуется один параметр `redirectTo`, который должен быть идентификатором ресурса, на который вы хотите выполнить перенаправление. Значения полей формы **не** пересылаются. 

## Поддерживаемые параметры

| Имя            | Описание                                                                             |
| -------------- | --------------------------------------------------------------------------------------- |
| redirectTo     | Обязательный. Идентификатор ресурса, на который следует перенаправить пользователя при успешной отправке HTML формы.  |
| redirectParams | Объект JSON с параметрами для передачи в URL-адресе перенаправления.                                 |

Обратите внимание, что это также можно использовать со свойством `&store` для отправки значений формы на перенаправленную страницу с помощью сниппета [FormItRetriever](extras/formit/formit.formitretriever "FormIt.FormItRetriever"). 

## Использование

Просто включите redirect хук в свойство `&hooks` при вызове FormIt. Затем укажите идентификатор ресурса для перенаправления с помощью свойства `&redirectTo`. 

### Перенаправление с параметрами

Вы можете указать параметры для перенаправления при использовании этого хука. Просто используйте свойство `&redirectParams`: 

``` php
[[!FormIt?
   &hooks=`redirect`
   &redirectTo=`212`
   &redirectParams=`{"user":"123","success":"1"}`
]]
```

Это создаст URL-адрес с этими параметрами. Скажем, идентификатор ресурса 212 находится в `books.html`, тогда URL-адрес перенаправления будет: 

- books.html?user=123&success=1

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
