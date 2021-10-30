---
title: "FormItAutoResponder"
description: "Хук FormItAutoResponder для Formit"
translation: "extras/formit/formit.hooks/formitautoresponder"
---

## Хук FormItAutoResponder для Formit

Хук отправляет авто-ответ отправителю по электронной почте.

## Поддерживаемые параметры

Хук имеет следующие параметры, которые нужно передать в вызов сниппета FormIt:

| имя                | описание                                                                                                                                                                                            |
| ------------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| fiarTpl            | Обязательный. Имя чанка для авто-ответа.                                                                                                                                                            |
| fiarSubject        | Тема письма.                                                                                                                                                                                        |
| fiarToField        | Имя поля формы, которое будет использоваться в качестве адреса электронной почты отправителя. По умолчанию "email".                                                                                 |
| fiarFrom           | Необязательный. Если установлен, будет указан адрес "От:"("From:") для электронного письма. По умолчанию используется системная настройка `emailsender`.                                            |
| fiarFromName       | Необязательный. Если установлен, будет указано имя отправителя для "От:"("From:").                                                                                                                  |
| fiarSender         | Необязательный. Укажите заголовок отправителя электронной почты. По умолчанию используется системная настройка `emailsender`.                                                                       |
| fiarHtml           | Необязательный. Должно ли электронное письмо быть в формате HTML. По умолчанию 1.                                                                                                                   |
| fiarReplyTo        | Обязательный. Адрес электронной почты, на который можно дать ответ ("Reply-To:").                                                                                                                   |
| fiarReplyToName    | Необязательный. Имя поля для ответа через "Reply-To:"                                                                                                                                               |
| fiarCC             | Список писем, разделенных запятыми, для отправки через "CC:".                                                                                                                                       |
| fiarCCName         | Необязательный. Список имен, разделенных запятыми, для попарного сопряжения со значениями `fiarCC`.                                                                                                 |
| fiarBCC            | Список email адресов, разделенных запятыми, для отправки через скрытую копию ("BCC").                                                                                                               |
| fiarBCCName        | Необязательный. Список имен, разделенных запятыми, для сопряжения со значениями `fiarBCC`.                                                                                                          |
| fiarMultiWrapper   | Оборочивает значения, переданные через чекбоксы/списки множественного выбора этим значением. По умолчанию используется только значение.                                                             |
| fiarMultiSeparator | Разделяет чекбоксы/списки множественного выбора этим значением. По умолчанию используется новая строка. ("\\n")                                                                                     |
| fiarFiles          | Необязательный. Список файлов, разделенных запятыми, для добавления в качестве вложения к электронному письму. Вы не можете использовать здесь URL-адрес, только путь к локальной файловой системе. |
| fiarRequired       | Необязательный. Если установлено значение false, обработчик FormItAutoResponder не останавливается, когда поле, определенное в `fiarToField`, остается пустым. По умолчанию true.                   |

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
