---
title: "FormIt"
description: "Хуки FormIt для интеграции Eletters с формами"
translation: "extras/eletters/eletters.formit"
---

## Хуки FormIt

В версии 1.1 добавлены два хука для FormIt. Если вы используете FormIt для форм, можно совместить Eletters и FormIt. FormIt упрощает создание форм, а встроенный email-хук теперь дополняется возможностью оформить письмо как ресурс MODX, логировать отправку и давать получателю ссылку на веб-версию. В будущих версиях планируется просмотр лога в менеджере MODX.

### EletterFormItEmail заменяет стандартный хук FormIt Email

Хук EletterFormItEmail (это сниппет) задуман как прямая замена хука FormIt Email.

#### Доступные свойства

| Имя               | Описание                                                                                                                                                                           |
| ----------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| emailNewsletterID | (Int) ID рассылки для идентификации newsletter                                                                                                                                    |
| emailResourceID   | (Int) Необязательно. Вместо emailNewsletterID можно указать ID ресурса рассылки                                                                                                    |
| emailUseChunk     | Boolean, по умолчанию false. При true используется стандартный чанк, а не ресурс рассылки                                                                                          |
| emailUploads      | Boolean, по умолчанию true. При true вложения из формы отправляются по email                                                                                                       |
| emailFiles        | Boolean, по умолчанию true. При true отправляются файловые вложения ресурса рассылки, добавленные через TV в менеджере                                                           |
| emailLog          | Boolean, по умолчанию true. При true содержимое письма сохраняется в БД и можно создать ссылку «Просмотреть в браузере». Также логируются ошибки, если письмо не доставлено       |

Дополнительные свойства см. в документации FormIt Email: [FormIt email Hook](extras/formit/formit.hooks/email)

#### Пример

1. После создания формы создайте ресурс с плейсхолдерами, соответствующими полям FormIt. У ресурса должны быть TV Eletters, он опубликован и отправлен тест
2. Укажите ID ресурса в свойстве emailResourceID вызова FormIt

После валидации формы будет отправлено письмо по ресурсу #10:

``` php
[[!FormIt?
 &submitVar=`submit`
 &validationErrorMessage=`<h3>Please fill in all fields</h3>`
 &validate=`email:email:required,question:required`
 &hooks=`eletterFormItEmail`
 &emailSubject=`Question`
 &emailTo=`email@email.com`
 &emailResourceID=`10`
]]
```

## См. также

1. [Eletters.API](extras/eletters/eletters.api)
2. [Eletters.FormIt](extras/eletters/eletters.formit)
3. [Eletters.Import CSV](extras/eletters/eletters.import-csv)
4. [Eletters.Templates](extras/eletters/eletters.templates)
