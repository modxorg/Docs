---
title: "FormItSaveForm"
description: "Хук FormItSaveForm для Formit"
translation: "extras/formit/formit.hooks/formitsaveform"
---

## Хук FormItSaveForm для FormIt

Этот хук сохранит отправленные формы внутри Formit [CMP](extending-modx/custom-manager-pages).

FormIt 3.0 представляет обновление методов шифрования, используемых для шифрования отправленных форм. До версии 3.0 использовался `mcrypt`, который в версии 3.0 заменен на `openssl` из-за того, что `mcrypt` устарел с версии PHP 7.2. FormIt 3.0 поставляется со страницей миграции, доступной из Менеджера. 

## Поддерживаемые параметры

Хук имеет следующие параметры, которые нужно передать в вызов сниппета FormIt:

| Имя                                                                    | Описание                                                                                                                 | Пример                                                                |
| ---------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| formName                                                               | Название формы. По умолчанию "form-{resourceid}".                                                                     | |
| formEncrypt                                                            | Если установлено значение "1" *(true)*, отправленная форма будет зашифрована перед сохранением в БД.                  | |
| formFields                                                             | Список полей, разделенных запятыми, которые будут сохранены. По умолчанию будут сохранены все поля, включая кнопку отправки.              | |
| fieldNames                                                             | Измените имя поля внутри CMP. Например, если имя поля - "email2", вы можете изменить имя на "дополнительный адрес электронной почты".  | &fieldnames=\`fieldname==Название поля,anotherone==Другое название поля\` |

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
