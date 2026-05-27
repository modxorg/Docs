---
title: "Пример простой контактной формы связи"
translation: "extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
description: "Пример простой контактной формы связи"
---

Здесь мы приведём простой пример контактной страницы.

Мы предполагаем, что вы уже установили FormIt через [Управление пакетами](developing-in-modx/advanced-development/package-management) и ознакомились с разделом [Как использовать](/extras/formit#kak-ispolzovat "Как использовать").

В этом примере контактная форма проверяет входные данные, отправляет email и перенаправляет на ресурс с ID 123.

Валидация (подробнее — [FormIt Validators](extras/formit/formit.validators)) удаляет теги из сообщения, проверяет корректность email и требует заполнения всех полей — всё указывается в параметре `&validate`.

Форма также использует [reCAPTCHA v3](https://www.google.com/recaptcha/about/). Настройте ключи в системных настройках:

- `formit.recaptcha_site_key`
- `formit.recaptcha_secret_key`

## Тег сниппета

```php
[[!FormIt?
   &hooks=`recaptcha,email,redirect`
   &emailTpl=`MyEmailChunk`
   &emailTo=`user@example.com`
   &emailFrom=`[[++emailsender]]`
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

> Убедитесь, что `emailFrom` установлен в `[[++emailsender]]`, иначе будет использоваться email из поля формы — большинство хостингов отклоняют письма с адресом отправителя от неизвестных доменов.

## Контактная форма

```html
<h2>Контактная форма</h2>

<form action="[[~[[*id]]]]" method="post" class="form">
    [[!+fi.validation_error_message]]
    [[!+fi.successMessage]]
    <div class="error">[[!+fi.error_message]]</div>

    <input type="hidden" name="nospam" value="" />

    <div class="form-field">
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="[[!+fi.name]]" />
        [[!+fi.error.name]]
    </div>

    <div class="form-field">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="[[!+fi.email]]" />
        [[!+fi.error.email]]
    </div>

    <div class="form-field">
        <label for="subject">Тема:</label>
        <input type="text" name="subject" id="subject" value="[[!+fi.subject]]" />
        [[!+fi.error.subject]]
    </div>

    <div class="form-field">
        <label for="text">Сообщение:</label>
        <textarea name="text" id="text" cols="55" rows="7">[[!+fi.text]]</textarea>
        [[!+fi.error.text]]
    </div>

    <div class="form-field">
        <label for="numbers">Числа:</label>
        <select name="numbers" id="numbers">
            <option value="">Выберите вариант...</option>
            <option value="one" [[!+fi.numbers:FormItIsSelected=`one`]]>Один</option>
            <option value="two" [[!+fi.numbers:FormItIsSelected=`two`]]>Два</option>
            <option value="three" [[!+fi.numbers:FormItIsSelected=`three`]]>Три</option>
        </select>
        [[!+fi.error.numbers]]
    </div>

    <div class="form-field">
        <label>Цвета:</label>
        <input type="hidden" name="colors[]" value="" />
        <ul>
            <li><label><input type="checkbox" name="colors[]" value="red" [[!+fi.colors:FormItIsChecked=`red`]] /> Красный</label></li>
            <li><label><input type="checkbox" name="colors[]" value="blue" [[!+fi.colors:FormItIsChecked=`blue`]] /> Синий</label></li>
            <li><label><input type="checkbox" name="colors[]" value="green" [[!+fi.colors:FormItIsChecked=`green`]] /> Зелёный</label></li>
        </ul>
        [[!+fi.error.colors]]
    </div>

    <div class="form-field">
        [[+formit.recaptcha_html]]
        [[!+fi.error.recaptcha]]
    </div>

    <div class="form-buttons">
        <input type="submit" value="Отправить" />
    </div>
</form>
```

## MyEmailChunk (Tpl чанк)

```php
Это чанк письма FormIt.

<br />[[+name]] ([[+email]]) написал(а): <br />

[[+text]]
```

## Смотрите также

1. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
2. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Validators](extras/formit/formit.validators)
