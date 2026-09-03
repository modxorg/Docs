---
title: "Отправка формы через AJAX"
translation: "extras/formit/formit.ajax"
description: "Отправка формы через AJAX без перезагрузки страницы"
---

## Отправка формы через AJAX

FormIt с версии **5.2.0** может отправлять формы через AJAX без полной перезагрузки страницы. Ошибки валидации, сообщения об успехе и редиректы обрабатывает встроенный `formit.js`. Тот же скрипт нужен для [reCAPTCHA v3](extras/formit/formit.hooks/recaptcha): он запрашивает токен перед POST.

## Настройка

Включите системную настройку `formit.frontend_js` (в свежей установке FormIt она уже задана):

| Настройка | Значение |
|---|---|
| `formit.frontend_js` | `js/web/formit.js` |

FormIt подключит `assets/components/formit/js/web/formit.js` и передаст в конфиг URL `action.php`. Если активен хук `recaptcha` и задан site key, дополнительно регистрируется Google `api.js?render=...`.

## Как это работает

1. Пока формы ещё нет в POST, сниппет FormIt сохраняет свою конфигурацию (хуки, правила валидации и т.д.) в сессии и в кэше и выводит случайный токен в `[[!+fi.ajaxToken]]` (32 hex-символа из `random_bytes`, не MD5).
2. Вы кладёте этот токен в атрибут `data-formit-ajax-token` на `<form>`.
3. При загрузке страницы `formit.js` вешает обработчик на все теги `<form>`. AJAX включается только если на форме есть `data-formit-ajax-token`. Если токена нет, но в форме есть `g-recaptcha-response`, скрипт всё равно перехватывает submit, получает токен reCAPTCHA и делает обычный POST.
4. В AJAX-режиме JS отправляет данные формы и заголовок `X-FormIt-Token` через `fetch()` на `action.php`.
5. Эндпоинт достаёт сохранённую конфигурацию по токену, прогоняет FormIt на сервере и отвечает JSON.
6. JS обновляет DOM: ошибки полей, сообщения валидации, success или редирект.

## Вызов сниппета

Вызов сниппета такой же, как и для обычной формы. Для AJAX не нужны специальные параметры:

```php
[[!FormIt?
    &hooks=`email,redirect`
    &emailTpl=`MyEmailChunk`
    &emailTo=`user@example.com`
    &emailFrom=`[[++emailsender]]`
    &redirectTo=`123`
    &validate=`name:required,
        email:email:required,
        subject:required,
        text:required:stripTags`
]]
```

## HTML формы

Чтобы форма работала через AJAX, добавьте атрибут `data-formit-ajax-token` на тег `<form>` и используйте атрибуты `data-formit-*` для элементов ошибок и сообщений:

```html
<form action="[[~[[*id]]]]" method="post" class="form"
      data-formit-ajax-token="[[!+fi.ajaxToken]]">

    <div data-formit-validation-error-message>[[!+fi.validation_error_message]]</div>
    <div data-formit-success-message>[[!+fi.successMessage]]</div>

    <div class="form-field">
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="[[!+fi.name]]" />
        <span data-formit-error="name">[[!+fi.error.name]]</span>
    </div>

    <div class="form-field">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="[[!+fi.email]]" />
        <span data-formit-error="email">[[!+fi.error.email]]</span>
    </div>

    <div class="form-field">
        <label for="subject">Тема:</label>
        <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />
        <span data-formit-error="subject">[[!+fi.error.subject]]</span>
    </div>

    <div class="form-field">
        <label for="text">Сообщение:</label>
        <textarea name="text" id="text" cols="55" rows="7">[[!+fi.text]]</textarea>
        <span data-formit-error="text">[[!+fi.error.text]]</span>
    </div>

    <div class="form-field">
        <label for="numbers">Числа:</label>
        <select name="numbers" id="numbers">
            <option value="">Выберите вариант...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected=`one`]]>Один</option>
            <option value="two" [[!+fi.numbers:FormItIsSelected=`two`]]>Два</option>
            <option value="three" [[!+fi.numbers:FormItIsSelected=`three`]]>Три</option>
        </select>
        <span data-formit-error="numbers">[[!+fi.error.numbers]]</span>
    </div>

    <div class="form-field">
        <label>Цвета:</label>
        <input type="hidden" name="colors[]" value="" />
        <ul>
            <li><label><input type="checkbox" name="colors[]" value="red" [[!+fi.colors:FormItIsChecked=`red`]] /> Красный</label></li>
            <li><label><input type="checkbox" name="colors[]" value="blue" [[!+fi.colors:FormItIsChecked=`blue`]] /> Синий</label></li>
            <li><label><input type="checkbox" name="colors[]" value="green" [[!+fi.colors:FormItIsChecked=`green`]] /> Зелёный</label></li>
        </ul>
        <span data-formit-error="colors">[[!+fi.error.colors]]</span>
    </div>

    <div class="form-buttons">
        <input type="submit" value="Отправить" />
    </div>
</form>
```

> **Примечание:** Атрибут `action` сохранён как запасной вариант на случай, если JavaScript отключён. В AJAX-режиме форма отправляется на `action.php`.

### Справочник data-атрибутов

| Атрибут | Элемент | Описание |
|---|---|---|
| `data-formit-ajax-token` | `<form>` | Активирует AJAX-режим. Значение должно быть `[[!+fi.ajaxToken]]`. |
| `data-formit-error="fieldname"` | `<span>` | Отображает ошибку валидации для конкретного поля. JS заполняет `innerHTML` текстом ошибки. |
| `data-formit-validation-error-message` | `<div>` | Отображает общее сообщение об ошибке валидации (эквивалент `[[!+fi.validation_error_message]]`). |
| `data-formit-success-message` | `<div>` | Отображает сообщение об успехе (из свойства `&successMessage`). |
| `data-formit-error-message` | `<div>` | Отображает ошибки хуков (из `[[!+fi.error_message]]`). |

Все элементы `data-formit-error` и сообщений очищаются перед каждой отправкой.

## JavaScript API

### Автоматическая инициализация

При `DOMContentLoaded` `formit.js` инициализирует **все** `<form>` на странице. Дополнительный JS для базового сценария не нужен. Режим AJAX на конкретной форме включается только атрибутом `data-formit-ajax-token`.

## JavaScript-события

Элемент формы отправляет `CustomEvent`, которые можно слушать через `addEventListener`. Все события всплывают (bubble).

| Событие | Отменяемое | `event.detail` | Описание |
|---|---|---|---|
| `formit:beforesubmit` | Да | `{ form }` | Перед запросом токена reCAPTCHA / отправкой. `event.preventDefault()` отменяет. |
| `formit:success` | Нет | `{ data }` | Срабатывает при успешной отправке. |
| `formit:error` | Нет | `{ data }` | Срабатывает при ошибке валидации. |
| `formit:complete` | Нет | `{}` | Срабатывает после каждого запроса (успех или ошибка). |
| `formit:redirect` | Да | `{ url }` | Срабатывает перед редиректом. Вызовите `event.preventDefault()` для отмены. |

Пример:

```javascript
document.getElementById('my-form').addEventListener('formit:success', function (e) {
    alert('Спасибо! Ваша форма была отправлена.');
});
```

## Обработка редиректов

Когда используется хук `redirect`, AJAX-режим **не** выполняет серверный редирект. Вместо этого:

1. Сервер возвращает поле `redirect_url` в JSON-ответе.
2. JS отправляет отменяемое событие `formit:redirect`.
3. Если событие не отменено (через `event.preventDefault()` или возврат `false` из `onRedirect`), JS устанавливает `window.location.href` на URL редиректа.

Это позволяет перехватить редирект и обработать его по-своему (например, загрузить контент через AJAX, показать сообщение благодарности на месте и т.д.).

## CSS-состояние загрузки

Пока идёт получение токена reCAPTCHA и/или AJAX-запрос:

- CSS-класс `formit-loading` добавляется к элементу `<form>`.
- Все кнопки `[type="submit"]` внутри формы получают атрибут `disabled`.

Оба состояния снимаются после завершения (или при ошибке reCAPTCHA).

Вы можете использовать это для стилизации индикатора загрузки:

```css
.formit-loading {
    opacity: 0.6;
    pointer-events: none;
}
```

## Структура JSON-ответа

Для продвинутых сценариев, AJAX-эндпоинт возвращает JSON-объект следующей структуры:

```json
{
    "success": true,
    "message": "Сообщение об успехе или ошибке",
    "redirect_url": "https://example.com/thank-you",
    "placeholders": {
        "error.name": "<span class=\"error\">Это поле обязательно для заполнения.</span>",
        "error.email": "<span class=\"error\">Пожалуйста, введите корректный email.</span>",
        "validation_error_message": "<p class=\"error\">Произошла ошибка валидации формы.</p>",
        "successMessage": "Форма успешно отправлена."
    }
}
```

| Поле | Тип | Описание |
|---|---|---|
| `success` | Boolean | `true`, если форма прошла все проверки и хуки выполнились успешно. |
| `message` | String | Сообщение об успехе или ошибке. |
| `redirect_url` | String | Присутствует только когда активен хук `redirect`. |
| `placeholders` | Object | Все плейсхолдеры FormIt (с удалённым префиксом `fi.`). Ошибки полей находятся в `error.fieldname`. |

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
