---
title: "FormItRetriever"
translation: "extras/formit/formit.formitretriever"
description: "вспомогательный сниппет FormIt для получения пользовательских данных отправленной формы"
---

## Что такое FormItRetriever?

FormItRetriever - это вспомогательный [Сниппет](building-sites/elements/snippets) для [FormIt](extras/formit "FormIt"), который будет получать пользовательские данные последней отправки формы через FormIt. Это полезно для страниц, куда пользователь перенаправляется после отправки формы.

## Использование

Просто добавьте этот Сниппет на любую страницу, с которой вы перенаправляете (используя свойство FormIt `&redirectTo`), и установите `&store=1` в вызове FormIt:

```php
[[!FormItRetriever]]
```

А затем отобразите данные формы с плейсхолдерами, относящимися к именам полей, например:

```php
<p><Благодарим [[!+fi.name]] за сообщение. Письмо будет отправлено вам на ящик [[!+fi.email]].</p>
```

Не забудьте установить `&store=1` в вызове FormIt, чтобы сниппет понимал, что нужно хранить значение.

Обязательно вызывайте Плейсхолдеры некэшированными. Эти данные изменяются при каждом запросе, поэтому Плейсхолдеры также должны изменять каждый запрос.

### Свойства FormItRetriever

FormItRetriever имеет некоторые свойства по умолчанию, которые вы можете переопределить. Вот что там есть:

| Имя                  | Описание                                                                                                                                                                          | По умолчанию |
| -------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| placeholderPrefix    | Строка для префикса всех плейсхолдеров для полей формы, которые будут установлены этим Сниппетом.                                                                                 | `fi.`        |
| redirectToOnNotFound | Если данные не найдены и если это свойство установлено, перенаправить на Ресурс с этим идентификатором.                                                                           |              |
| eraseOnLoad          | Если указано, при загрузке будут удалены сохраненные данные формы. Настоятельно рекомендуется оставить значение `0`, если вы не хотите, чтобы данные загружались только один раз. |              |
| storeLocation        | Откуда взять данные формы. Должно быть равно свойству `storeLocation` вашего вызова Сниппета FormIt. Возможные значения: 'cache' и 'session'.                                     | `cache`      |

## Пример

Отправим форму с автоматическим ответом и защитой от спама, затем перенаправим на страницу с благодарностью, где загружается последняя отправленная форма, и, если она не найдена, перенаправим на Ресурс с идентификатором 444.

На вашей странице с формой:

```php
[[!FormIt?
    &submitVar=`go`
    &hooks=`spam,FormItAutoResponder,redirect`
    &emailTo=`my@email.com`
    &store=`1`
    &redirectTo=`123`
]]
<form action="[[~[[*id]]]]" method="post">
    <input type="hidden" name="nospam" value="" />
    <label for="name">Имя: [[!+fi.error.name]]</label>
    <input type="text" name="name:required" id="name" value="[[!+fi.name]]" />
    <label for="email">Email: [[!+fi.error.email]]</label>
    <input type="text" name="email:email:required" id="email" value="[[!+fi.email]]" />
    <label for="message">Сообщение: [[!+fi.error.message]]</label>
    <textarea name="message:stripTags" id="message" cols="55" rows="7">[[!+fi.message]]</textarea>
    <br />
    <input type="submit" name="go" value="Отправить" />
</form>
```

На вашей странице подтверждения (Resource ID 123):

```php
[[!FormItRetriever? &redirectToOnNotFound=`444`]]
<p>Спасибо [[!+fi.name]] за ваше обращение. Вам будет отправлен автоматически электронное письмо на адрес [[!+fi.email]]. Текст вашего обращения:</p>
[[!+fi.message]]
```

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
