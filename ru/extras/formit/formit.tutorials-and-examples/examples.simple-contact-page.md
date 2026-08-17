---
title: "Пример простой контактной формы связи"
translation: "extras/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page"
description: "Пример простой контактной формы связи"
---

Здесь мы приведём простой пример контактной страницы.

Мы предполагаем, что вы уже установили FormIt через [Управление пакетами](developing-in-modx/advanced-development/package-management) и ознакомились с разделом [Как использовать](/extras/formit#kak-ispolzovat "Как использовать").

В этом примере контактная форма проверяет входные данные, отправляет email и перенаправляет на ресурс с ID 123.

Валидация (подробнее. [FormIt Validators](extras/formit/formit.validators)) удаляет теги из сообщения, проверяет корректность email и требует заполнения всех полей. всё указывается в параметре `&validate`.

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

> Убедитесь, что `emailFrom` установлен в `[[++emailsender]]`, иначе будет использоваться email из поля формы. большинство хостингов отклоняют письма с адресом отправителя от неизвестных доменов.

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

## Форма уходит, а письма нет

FormIt шлёт почту через системные настройки MODX. Если форма «срабатывает» (редирект, success), а письма в ящике нет, сначала проверяйте SMTP и доставку, а не только хуки FormIt.

### 1. Проверьте сам FormIt

1. Смотрите ошибки на странице: `[[!+fi.error_message]]`, `[[!+fi.validation_error_message]]` и ошибки полей вроде `[[!+fi.error.email]]`.
2. Держите порядок `&hooks=` осмысленным: проверки (например `recaptcha`) до `email`, `redirect` в конце. Если `email` падает, следующие хуки могут не отработать так, как вы ждёте.
3. Укажите в `&emailTo=` адрес, который вы реально читаете.
4. Оставьте `&emailFrom=` как `[[++emailsender]]` (или другой адрес вашего домена). Не ставьте email посетителя в `From`.
5. Убедитесь, что чанк `emailTpl` существует и рендерится. Неверное имя чанка ломает email-хук без явной ошибки для посетителя.

### 2. Отделите FormIt от SMTP через QuickEmail

Установите [QuickEmail](extras/quickemail) (Bob Ray) через Управление пакетами. На временном ресурсе поставьте:

```php
[[!QuickEmail? &debug=`1`]]
```

Откройте ресурс на сайте. QuickEmail отправит тестовое письмо тем же стеком MODX, что и FormIt, и выведет подробный лог.

- Если QuickEmail не шлёт письмо, сначала поправьте **Система → Системные настройки → область Mail**.
- Если QuickEmail работает, а FormIt нет, снова проверьте `&emailTo`, `&emailTpl`, хуки и папку «Спам».

Уберите вызов QuickEmail после проверки. Публичная страница с `&debug=` может светить параметры почты.

Полная настройка SMTP, доставляемость и примеры провайдеров: [Sending mail](building-sites/sending-mail) (EN). Ключи настроек те же в русской панели.

### 3. Типичные SMTP-настройки (MODX 3)

Включите `mail_use_smtp` и обычно `mail_smtp_auth`. Задайте хост, порт, логин, пароль и шифрование (`mail_smtp_secure`: `tls` или `ssl`, либо пустое значение плюс `mail_smtp_autotls`, если так удобнее провайдеру).

| Провайдер | `mail_smtp_hosts` | Порт | Secure | Заметки |
| --------- | ----------------- | ---- | ------ | ------- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` или `465` | `tls` (587) или `ssl` (465) | Нужен [пароль приложения](https://support.google.com/accounts/answer/185833) или OAuth. Обычный пароль аккаунта чаще всего не проходит. |
| Яндекс Почта | `smtp.yandex.ru` (или `smtp.yandex.com`) | `465` или `587` | `ssl` (465) | Создайте пароль приложения в настройках почтовых клиентов Яндекса. |
| Mail.ru | `smtp.mail.ru` | `465` или `587` | `ssl` / `tls` | Пароль приложения из настроек безопасности Mail.ru. |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Актуальные значения смотрите в справке Rambler. Правила доступа меняются. |
| Mailgun | `smtp.mailgun.org` (EU: `smtp.eu.mailgun.org`) | `587`, `465` или `2525` | `tls` / `ssl` по порту | Логин и пароль SMTP берутся в credentials домена в Mailgun. |
| Свой VPS / хостинг | SMTP-хост от провайдера | Часто `587` или `465` | По документации хоста | Исходящий порт `25` часто закрыт. Используйте авторизованную отправку на 587/465. |

Значение `emailsender` должно быть адресом, который провайдер разрешает (верифицированный домен для Mailgun/SES или ящик, под которым вы логинитесь в SMTP).

Тема на форуме, которая привела к этому разделу: [Can’t get FormIt to send form](https://community.modx.com/t/cant-get-formit-to-send-form/3736).

## Смотрите также

1. [Sending mail](building-sites/sending-mail)
2. [QuickEmail](extras/quickemail)
3. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
4. [FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
5. [FormIt.Validators](extras/formit/formit.validators)
