---
title: "Пример простой контактной формы связи"
translation: "extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
description: "Пример простой контактной формы связи"
---

Здесь мы приведем простой пример контактной страницы.

Мы предполагаем, что вы уже установили Компонент Formit через [Управление пакетами](develop-in-modx/advanced-development/package-management) и ознакомились с разделом Formit [Как использовать](/extras/formit#kak-ispolzovat «Как использовать»).

В этом примере контактная форма будет проверять входные данные, отправлять электронное письмо и, наконец, перенаправлять на ресурс с идентификатором 123.

Процесс валидации (смотрите, как он работает [здесь](extras/formit/formit.validators), если описать кратко, в нем - каждый хук выполняет какую-то логику, в случае успеха - передает обработку следующему хуку) в этом примере делает следующее: кроме прочего удаляет теги из сообщения, подтверждает валидность электронной почты и убеждается, что ни одно из полей не пустое. Все это указывается в параметре `&validate`.

И, наконец, нам нужна поддержка [reCaptcha](https://www.google.com/recaptcha/about/). Мы уже настроили наши открытый и закрытый ключи для `reCaptcha` с помощью следующих системных настроек:

-   `formit.recaptcha_public_key`
-   `formit.recaptcha_private_key`

## Тег сниппета

Вы можете вызвать этот Сниппет где угодно: внутри Шаблона, Чанка, тела содержимого страницы или даже программно через [runSnippet](exnding-modx/modx-class/reference/modx.runsnippet).

Есть только одно условие - Formit должен быть запущен на странице, куда будут отправлены данные из контактной формы ниже (см. значение поля «action»).

```php
[[!FormIt?
   &hooks=`recaptcha,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &redirectTo=`123`
   &validate=`nospam:blank,
      name:required,
      email:email:required,
      subject:required,
      text:required:stripTags,
      numbers:required,
      colors:required`
]]
```

## Контактная форма

Этот HTML-код должен вызываться на странице сайта, где вы хотите увидеть контактную форму. Значение атрибута `action` указывает на страницу, на которой расположен вызов Сниппета, в нашем случае мы вызываем его на той же странице, поэтому мы используем [~tag](building-sites/tag-syntax/common#default-resource-content-field-tags), чтобы создать ссылку на текущую страницу.

```html
<h2>Контактная форма</h2>

[[!+fi.validation_error_message:notempty=`
<p>[[!+fi.validation_error_message]]</p>
`]]

<form action="[[~[[*id]]]]" method="post" class="form">
    <input type="hidden" name="nospam" value="" />

    <label for="name">
        Имя:
        <span class="error">[[!+fi.error.name]]</span>
    </label>
    <input type="text" name="name" id="name" value="[[!+fi.name]]" />

    <label for="email">
        Email:
        <span class="error">[[!+fi.error.email]]</span>
    </label>
    <input type="text" name="email" id="email" value="[[!+fi.email]]" />

    <label for="subject">
        Тема:
        <span class="error">[[!+fi.error.subject]]</span>
    </label>
    <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />

    <label for="text">
        Сообщение:
        <span class="error">[[!+fi.error.text]]</span>
    </label>
    <textarea name="text" id="text" cols="55" rows="7" value="[[!+fi.text]]">
[[!+fi.text]]</textarea
    >

    <label>
        Числа:[[+fi.error.numbers]]
        <select name="numbers" value="[[!+fi.numbers]]">
            <option value="">Select an option...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected="`one`]]">
                Один
            </option>
            <option value="two" [[!+fi.numbers:FormItIsSelected="`two`]]">
                Два
            </option>
            <option value="three" [[!+fi.numbers:FormItIsSelected="`three`]]">
                Три
            </option>
        </select>
    </label>

    <label>
        Цвета:[[!+fi.error.colors]]
        <input type="hidden" name="colors[]" value="" />
    </label>
    <ul>
        <li>
            <label
                ><input
                    type="checkbox"
                    name="colors[]"
                    value="red"
                    [[!+fi.colors:FormItIsChecked="`red`]]"
                />
                Красный</label
            >
        </li>
        <li>
            <label
                ><input
                    type="checkbox"
                    name="colors[]"
                    value="blue"
                    [[!+fi.colors:FormItIsChecked="`blue`]]"
                />
                Синий</label
            >
        </li>
        <li>
            <label
                ><input
                    type="checkbox"
                    name="colors[]"
                    value="green"
                    [[!+fi.colors:FormItIsChecked="`green`]]"
                />
                Зеленый</label
            >
        </li>
    </ul>

    <br class="clear" />
    [[!+formit.recaptcha_html]] [[!+fi.error.recaptcha]]

    <br class="clear" />

    <div class="form-buttons">
        <input type="submit" value="Отправить" />
    </div>
</form>
```

## MyEmailChunk (Tpl чанк)

Ниже приведен чанк для письма электронной почты `&emailTpl`, который мы отправляем на адрес, указанный в параметре `&emailTo` Formit, после получения и проверки данных формы.

```php

Это Чанк нашей формы.

<br />[[+name]] ([[+email]]) Wrote: <br />

[[+text]]
```

## Смотрите также

1. [AjaxForm](https://modx.com/extras/package/ajaxform) Отправка любой формы через Ajax
2. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. Что такое [Google Recaptcha](https://www.google.com/recaptcha/about/)
4. [ReCaptchaV2](https://modx.com/extras/package/recaptchav2) Google Recaptcha(V2 и V3 поддерживаются) компонент для MODX
