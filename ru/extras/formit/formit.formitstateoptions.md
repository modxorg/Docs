---
title: "FormItStateOptions"
translation: "extras/formit/formit.formitstateoptions"
description: "вспомогательный сниппет FormIt для получения списка штатов или регионов для определенной страны"
---

## Что такое FormItStateOptions?

FormItStateOptions это вспомогательный [Сниппет](building-sites/elements/snippets) для [FormIt](extras/formit "FormIt"), с версии 1.7.0+, который возвращает список регионов. Это полезно для форм, которым нужен такой список.

В настоящий момент доступен переводные списки регионов для следующих стран - США, Франция, Нидерланды, Германия, Бельгия, Швеция и Канада.

---

Замечание: В ближайшее время появится список регионов РФ.

---

Какой список регионов выбрать - решается на основании значения системной переменной `cultureKey`, по умолчанию - регионы США (значение ключа `us`).

## Использование

Просто добавьте Сниппет в вашу форму внутрь `<select>` элемента:

```php
<select name="state">
[[!FormItStateOptions? &selected=`[[!+fi.state]]`]]
</select>
```

Обратите внимание, как мы передаем значение плейсхолдера "fi.state" (в котором хранится значение поля штата) в выбранный параметр. Это сообщает FormItStateOptions выбрать последний выбранный параметр в форме.

### Свойства FormItStateOptions

FormItStateOptions имеет некоторые свойства по умолчанию, которые вы можете переопределить. Вот что там есть:

| Имя               | Описание                                                                                                                | По умолчанию        |
| ----------------- | ----------------------------------------------------------------------------------------------------------------------- | ------------------- |
| selected          | Код штата/региона для отметки, что он выбран                                                                            |                     |
| selectedAttribute | Необязательный. Атрибут HTML, добавляемый в выбранный штат.                                                             | selected="selected" |
| tpl               | Необязательный. Код, используемый для каждого варианта раскрывающегося списка регионов.                                 |                     |
| useAbbr           | Если указано '1', для значения будет использоваться аббревиатура(код региона)). Если 0, будет использоваться полное имя | 1                   |
| toPlaceholder     | Необязательный. Используйте это, чтобы установить вывод в качестве плейсхолдера вместо вывода напрямую.                 |                     |

## Смотрите также

1. [Хуки](extras/formit/formit.hooks)
    1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
    2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
    3. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
    4. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
    5. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
    6. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
    7. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
2. [Валидаторы](extras/formit/formit.validators)
3. [FormItRetriever](extras/formit/formit.formitretriever)
4. [Руководства и примеры](extras/formit/formit.tutorials-and-examples)
    1. [Пользовательский произвольный хук](extras/formit/formit.tutorials-and-examples/examples.custom-hook)
    2. [Пример простой формы](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
    3. [Обработка выпадающих списков, чекбоксов и радио кнопок](extras/formit/formit.tutorials-and-examples/handling-selects,-checkboxes-and-radios)
    4. [Использование пустого поля для защиты от спама](extras/formit/formit.tutorials-and-examples/using-a-blank-nospam-field)
5. [FormItCountryOptions](extras/formit/formit.formitcountryoptions)
6. [FormItStateOptions](extras/formit/formit.formitstateoptions)
