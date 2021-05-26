---
title: "FormItLoadSavedForm"
description: "Прехук FormItLoadSavedForm для Formit"
translation: "extras/formit/formit.hooks/prehooks.formitloadsavedform"
---

## FormItLoadSavedForm прехук для Formit

Этот прехук будет загружать данные для отправленных форм с помощью предоставленного хэша, который также доступен на FormIt CMP. Его нужно использовать вместе с [хуком FormItSaveForm](extras/formit/formit.hooks/formitsaveform)

## Использование

Чтобы использовать этот прехук, вам нужно использовать следующий вызов сниппета:

```php
[[!FormIt?
    &preHooks=`FormItLoadSavedForm`
    &updateSavedForm=`true`
    &savedFormHashKeyField=`yourCustomGetParameter`
    &hooks=`FormItSaveForm`
    &formFields=`name,address,zipCode,town` // параметр FormItSaveForm
]]
// откройте страницу в браузере
// http://your-domain.com/path/to/form?yourCustomGetParameter=<FormHashFromFormItCMP>
```

**Обратите внимание:** вы не должны использовать параметр `fieldNames`, потому что он делает невозможным присвоение значений формы полям.

## Поддерживаемые параметры

Прехук имеет следующие свойства, которые нужно передать в вызов фрагмента FormIt:

| Имя                   | Описание                                                                                      |
| --------------------- | --------------------------------------------------------------------------------------------- |
| savedFormHashKeyField | `$_GET` параметр для получения хэша отправки из URL-адреса. По умолчанию "savedFormHashKey".  |
| updateSavedForm       | Если загрузка ранее представленных значений формы должна быть возможна. По умолчанию - "нет". |
| returnValueOnFail     | Если прехук должен возвращать "да" в случае неудачи. По умолчанию "да"                        |

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
