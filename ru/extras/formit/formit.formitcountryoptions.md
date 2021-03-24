---
title: "FormItCountryOptions"
translation: "extras/formit/formit.formitcountryoptions"
description: "вспомогательный сниппет FormIt для получения списка стран"
---

## Что такое FormItCountryOptions?

FormItCountryOptions это вспомогательный [Сниппет](building-sites/elements/snippets) для [FormIt](extras/formit "FormIt"), начиная с версии 1.7.0, для вывода список стран мира. Это полезно для форм, которым нужен, например, раскрывающийся список стран.

В настоящий момент доступны переводные списки стран для следующих языков - английский, французский, голландский, немецкий, бельгийский и шведский. 

---

Замечание: В ближайшее время появится список стран по-русски.

---

Какой язык для списка стран выбрать - решается на основании значения системной переменной `cultureKey`, по умолчанию - английский (значение ключа `us`).

## Использование

Просто добавьте Сниппет в вашу форму внутрь `<select>` элемента:

``` html
<select name="country">
    [[!FormItCountryOptions? &selected=`[[!+fi.country]]`]]
</select>
```

Обратите внимание, как мы передаем значение плейсхолдера "fi.country" (в котором хранится значение поля страны) в выбранный параметр. Это сообщает FormItCountryOptions выбрать последний выбранный параметр в форме. 

### Свойства FormItCountryOptions

FormItCountryOptions имеет некоторые свойства по умолчанию, которые вы можете переопределить. Вот что там есть:

| Имя                  | Описание                                                                                                                                                                                                        | По умолчанию        |
| -------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------- |
| selected             | Код страны для отметки, что она выбрана                                                                                                                                                                                     |                     |
| selectedAttribute    | Необязательный. Атрибут HTML, добавляемый в выбранную страну.                                                                                                                                                      | selected="selected" |
| tpl                  | Необязательный. Код, используемый для каждого варианта раскрывающегося списка стран                                                                                                                                                    |                     |
| useIsoCode           | If 1, для значения будет использоваться аббревиатура (код страны)). Если 0, будет использоваться полное имя                                                                                                                            | 1                   |
| prioritized          | Необязательный. Разделенный запятыми список кодов ISO для стран, которые можно поместить в приоритетную optiongroup вверху раскрывающегося списка. Это можно использовать для часто выбираемых стран.  |                     |
| prioritizedGroupText | Необязательный. Если установлено и используется `&prioritized`, будет добавлена текстовая метка для группы опций с приоритетом.                                                                                                            |
| allGroupText         | Необязательный. Если установлено и используется `&prioritized`, будет добавлена текстовая метка для группы опций для всех остальных стран.                                                                                                    |
| optGroupTpl          | Необязательный. Если установлено и используется `&prioritized`, будет использован этот фрагмент для разметки группы параметров.                                                                                                           | optgroup            |
| toPlaceholder        | Необязательный. Используйте это, чтобы установить вывод в качестве плейсхолдера вместо вывода напрямую.                                                                                                                           |                     |

### Приоритетные страны

Иногда вы хотите, чтобы определенные страны отображались вверху списка в блоке `optiongroup`. FormItCountryOptions поддерживает это с помощью параметра `&prioritized`. Например: 

``` php
[[!FormItCountryOptions?
    &selected=`[[+fi.country]]`
    &prioritized=`US,GB,DE,RU,JP,FR,NL,CA,AU,UA`
]]
```

Будет выведен список, который выглядит так: 

![](20110707-ckb8i6wtgk9gwrtds59nra4smh.jpeg)

You simply pass the ISO codes of the countries you wish to prioritize in the &prioritized parameter. You can also adjust the text of the option groups with the `&prioritizedGroupText` and `&allGroupText` properties.

Вы просто передаете коды ISO стран, которым вы хотите присвоить приоритет, в параметре `&prioritized`. Вы также можете настроить текст `optiogroup` с помощью свойств `&prioritizedGroupText` и` &allGroupText`. 

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