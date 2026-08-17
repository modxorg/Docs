---
title: Отправка почты
translation: "building-sites/sending-mail"
---

В MODX есть [встроенный email-сервис](extending-modx/services/modmail). Он шлёт письма через PHP `mail()` или через SMTP.

Письма уходят в разных сценариях:

- Сброс пароля или passwordless login
- Отправка формы на фронтенде, обычно через [FormIt](extras/formit)
- Свой код. Как пользоваться email-сервисом, см. [modMail](extending-modx/services/modmail).

Во всех случаях работают настройки почты ядра. В Менеджере: **Система** (иконка шестерёнки) → **Системные настройки**. Ищите `mail` или фильтр области **Mail**.

По умолчанию используется PHP `mail()`. Это настройки сервера, но deliverability обычно слабая. Лучше настроить SMTP.

## Включение SMTP

1. Включите `mail_use_smtp`
2. Включите `mail_smtp_auth`
3. Укажите хост SMTP в `mail_smtp_hosts`
4. Укажите порт в `mail_smtp_port`. Порт 25 часто закрыт, обычно берут 587 или 465.
5. Введите учётные данные в `mail_smtp_user` и `mail_smtp_pass`
6. При необходимости поставьте `mail_smtp_secure` в `tls` или `ssl` (MODX 3). В старых текстах встречался `mail_smtp_prefix`. Смотрите область Mail в Системных настройках вашей установки.

Для шагов 3-6 точные значения зависят от почтового сервера или сервиса. Берите их из документации провайдера, инструкции по настройке или у поддержки.

Отдельные инструкции:

- [Amazon SES](building-sites/sending-mail/amazon-ses)
- [Mailtrap.io](building-sites/sending-mail/mailtrap)

### Частые SMTP-провайдеры

Это стартовые значения. Правила auth у провайдеров меняются. В их панелях создавайте app password или SMTP credentials, когда просят.

| Provider | Host | Port | `mail_smtp_secure` | Auth notes |
| -------- | ---- | ---- | ------------------ | ---------- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` / `465` | `tls` / `ssl` | App password или OAuth. Обычный пароль аккаунта часто отклоняют |
| Yandex Mail | `smtp.yandex.com` или `smtp.yandex.ru` | `465` / `587` | `ssl` на 465 | App password в настройках клиента Yandex Mail |
| Mail.ru | `smtp.mail.ru` | `465` / `587` | `ssl` / `tls` | App password в настройках безопасности Mail.ru |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Актуальные требования смотрите в справке Rambler |
| Mailgun | `smtp.mailgun.org` или `smtp.eu.mailgun.org` | `587` / `465` / `2525` | По порту | SMTP credentials на домен в Mailgun |
| Custom VPS / shared hosting | SMTP-хост от хостера | Часто `587` или `465` | По хосту | Исходящий `25` часто закрыт |

В `emailsender` укажите адрес, который провайдер разрешает (тот же ящик или подтверждённый sending domain).

Если FormIt редиректит или показывает success, а письма нет, поставьте [QuickEmail](extras/quickemail) и проверьте SMTP отдельно, прежде чем трогать hooks FormIt. См. также troubleshooting на [простой контактной странице](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## Проверка отправки

После настройки проверьте отправку. Проще всего поставить [QuickEmail](extras/quickemail) через [Package Manager](building-sites/extras).

После установки добавьте вызов сниппета на ресурс:

```
[[!QuickEmail? &debug=`1`]]
```

Откройте ресурс на фронтенде. QuickEmail попробует отправить тестовое письмо и покажет подробный debug-лог. Если не вышло, обычно виноваты порт, prefix или auth.

**Когда всё работает, уберите вызов сниппета.** Иначе кто-то наткнётся на него и может увидеть ваши credentials.

## Deliverability

Отправить письмо это одно. Попасть во входящие у получателя это другое.

На это влияют содержимое (похоже ли на спам) и защита вроде SPF, DKIM и DMARC. IP почтовых серверов могут попасть в blacklist при большом объёме спама.

Это настраивают на уровне сервера, вне рамок этой страницы. Чтобы письма доходили, настройте эти механизмы правильно.

В сети много сервисов и гайдов. Хороший бесплатный вариант: [mail-tester.com](https://www.mail-tester.com/). Вы получаете одноразовый адрес (удобно через QuickEmail с `&to`) и проверяете много факторов deliverability.

## Другие связанные настройки

Если сниппет или код не задают иное, заголовок `From` берётся из `emailsender`, а имя из `site_name`.
