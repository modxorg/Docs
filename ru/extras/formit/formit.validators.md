---
title: "Валидаторы"
translation: "extras/formit/formit.validators"
description: "Валидация в FormIt, базовые и произвольные пользовательские, параметры, переопределение"
---

## Валидация в FormIt

FormIt 3.0 представляет обновление методов шифрования, используемых для шифрования отправленных форм. До версии 3.0 использовался `mcrypt`, который в версии 3.0 заменен на `openssl` из-за того, что `mcrypt` устарел с версии PHP 7.2. FormIt 3.0 поставляется со страницей миграции, доступной из Менеджера.

Начиная с FormIt 2.2.9, ко всем полям автоматически применяется `html_entities`. Чтобы разрешить сохранение HTML-тегов, вам нужно будет использовать валидатор `allowSpecialChars` для каждого поля, который должен сохранять необработанные html-теги.

Начиная с FormIt 1.1.4, ко всем полям будут автоматически применяться `stripTags`. Чтобы разрешить сохранение HTML-тегов, вам нужно будет использовать валидатор `allowTags` для каждого поля, определяя, какие теги разрешены. 

Валидацию можно просто выполнить, добавив поля для проверки в свойство `&validate` при вызове Сниппета. Например, чтобы сделать поле имени пользователя обязательным, вы можете сделать так: 

``` php
[[!FormIt? &validate=`username:required`]]
```

Валидаторы также могут быть «связаны» или выполняться последовательно. В следующем примере сначала проверяется, передано ли значение поля `text`, а затем удаляются все теги из сообщения:

``` php
[[!FormIt? &validate=`text:required:stripTags`
```

Несколько полей и валидаторов разделяются запятыми:

``` php
[[!FormIt? 
    &validate=`date:required:isDate=^%m/%d/%Y^,
        name:required:testFormItValidator,
        email:email:required,
        colors:required,
        subject:required,
        username:required:islowercase,
        message:stripTags,
        numbers:required`
]]
```

FormIt допускает разделение валидаторов на несколько строк, если вам так будет удобнее. 

**Примечание**: не используйте обратные кавычки ` внутри проверочного вызова (это сломает синтаксическую разметку). Вместо этого используйте символы `^`: 

``` php
[[!FormIt? &validate=`date:required:isDate=^%m/%d/%Y^`]]
```

Это исправит вызов и заставит валидацию работать правильно. 

Общее сообщение об ошибке для валидаторов, полезное, если ошибки не отображаются, но проверка не проходит, используется со следующим плейсхолдером: 

``` php
[[!+fi.validation_error_message]]
```

Он будет содержать сообщение об ошибке валидации, которое можно установить с помощью свойства `&validationErrorMessage` и используя `[[+errors]]` в значении свойства, которое будет заменено всеми ошибками поля. 

Также существует "Да/нет" плейсхолдер:

``` php
[[!+fi.validation_error]]
```

## Встроенные валидаторы

| Имя              | Функция                                                                                  | Параметр                                     | Пример                                 |
| ----------------- | --------------------------------------------------------------------------------------- | -------------------------------------------- | -------------------------------------- |
| blank             | Поле пустое?                                                                            |                                              | nospam:blank                           |
| required          | Поле не пустое?                                                                         |                                              | username:required                      |
| password\_confirm | Соответствует ли поле значению другого поля?                                            | Имя поля пароля                              | password2:password\_confirm=^password^ |
| email             | Это корректный адрес электронной почты?                                                 |                                              | emailaddr:email                        |
| minLength         | Длина поля не менее X символов?                                                         | Минимальная длина                            | password:minLength=^6^                 |
| maxLength         | Длина поля не превышает X символов?                                                     | Максимальная длина                           | password:maxLength=^12^                |
| minValue          | Значение поля не меньше X?                                                              | Минимальное значение                         | donation:minValue=^1^                  |
| maxValue          | Значение поля не больше X?                                                              | Максимальное значение                        | cost:maxValue=^1200^                   |
| contains          | Содержит ли поле строку X?                                                              | Строка X.                                    | title:contains=^Hello^                 |
| strip             | Удалите определенную строку из поля.                                                    | Строка, которую нужно удалить                | message:strip=^badword^                |
| stripTags         | Удалите все HTML-теги из поля. Обратите внимание, что по умолчанию это включено.        | Необязательный список разрешенных тегов      | message:stripTags                      |
| allowTags         | Не удаляйте HTML-теги в поле. Обратите внимание, что по умолчанию это отключено.        |                                              | content:allowTags                      |
| isNumber          | Поле имеет числовое значение?                                                           |                                              | cost:isNumber                          |
| allowSpecialChars | Не заменяйте специальные символы HTML их сущностями. По умолчанию это отключено.        |                                              | message:allowSpecialChars              |
| isDate            | Поле - это дата?                                                                        | Необязательный формат для форматирования даты        | startDate:isDate=^%Y-%m-%d^    |
| regexp            | Соответствует ли поле ожидаемому формату?                                               | Действительное регулярное выражение для сравнения  | secretPin:regexp=^/\[0-9\]{4}/^  |

## Пользовательские валидаторы

Валидаторами также могут быть любые пользовательские [сниппеты](development-in-modx/basic-development/snippets "сниппеты"). Вы можете сделать это, просто указав имя сниппета в свойстве `customValidators`: 

``` php
[[!FormIt? &customValidators=`isBigEnough`]]
```

Начиная с FormIt 1.2.0, все такие произвольные валидаторы **должны** быть указаны в свойстве `customValidators`, иначе они не будут запускаться. 

И кроме того в качестве валидатора для свойства `&validate`: 

``` php
[[!FormIt? &validate=`cost:isBigEnough`]]
```

Ну и сам сниппет, "isBigEnough":

``` php
<?php
$value = (float)$value;
$success = $value > 1000;
if (!$success) {
    // Обратите внимание, как мы можем добавить здесь ошибку в поле.
    $validator->addError($key,'Маловато будет!');
}
return $success;
```

Валидатор отправит в сниппет следующие свойства в массиве `$scriptProperties`:  

| Имя       | Функция                                                              |
| --------- | ---------------------------------------------------------------------|
| key       | Ключ проверяемого поля.                                              |
| value     | Значение поля, которое было передано в массиве $_POST.               |
| param     | Если для валидатора был указан параметр, то он будет также передан.  |
| type      | Имя валидатора(сниппета)                                             |
| validator | Ссылка на экземпляр класса `fiValidator`.                            |

## Пользовательские сообщения об ошибках

Начиная с FormIt 2.0-pl, вы можете переопределить сообщения об ошибках, отображаемые валидаторами, отправив соответствующее свойство:

| Валидатор         | Свойство                                   |
| ----------------- | ------------------------------------------ |
| blank             | vTextBlank                                 |
| required          | vTextRequired                              |
| password\_confirm | vTextPasswordConfirm                       |
| email             | vTextEmailInvalid, vTextEmailInvalidDomain |
| minLength         | vTextMinLength                             |
| maxLength         | vTextMaxLength                             |
| minValue          | vTextMinValue                              |
| maxValue          | vTextMaxValue                              |
| contains          | vTextContains                              |
| isNumber          | vTextIsNumber                              |
| isDate            | vTextIsDate                                |
| regexp            | vTextRegexp                                |

Вы также можете указать сообщение для каждого поля, поставив префикс ключа поля в свойстве. Например, чтобы переопределить обязательное ("required") сообщение валидатора, просто передайте в свой вызов FormIt: 

``` php
[[!FormIt?
    &vTextRequired=`Пожалуйста, укажите значение для этого поля.`
    &subject.vTextRequired=`Пожалуйста введите тему.`
]]
```

Это будет использовать `&subject.vTextRequired` для поля темы, а затем вернуться к сообщению `&vTextRequired` для всех других полей. 

## Посмотрите также

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
7. [$_POST](https://www.php.net/manual/ru/reserved.variables.post.php)