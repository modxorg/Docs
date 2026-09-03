---
title: "recaptcha"
description: "Хук recaptcha для FormIt (reCAPTCHA v3)"
translation: "extras/formit/formit.hooks/recaptcha"
---

## Хук recaptcha

Хук `recaptcha` добавляет проверку [Google reCAPTCHA v3](https://www.google.com/recaptcha/about/) в форму FormIt. v3 работает в фоне. Чекбокса и виджета с заданием нет.

Google возвращает оценку от `0.0` до `1.0`. FormIt принимает отправку только если проверка прошла и оценка не ниже `formit.recaptcha_min_score` (по умолчанию `0.5`).

Так устроен FormIt начиная с **5.2.1** ([Sterc/FormIt](https://github.com/Sterc/FormIt)). В старых версиях FormIt был reCAPTCHA v1 и другие системные настройки. Они здесь больше не действуют.

## Требования

1. FormIt **5.2.1+** (пакет с reCAPTCHA v3).
2. Пара ключей **reCAPTCHA v3** в [админке Google reCAPTCHA](https://www.google.com/recaptcha/admin). Создайте ключ типа v3 для своего домена. Ключи v2 (чекбокс) с этим хуком не работают.
3. Заполненные системные настройки `formit.recaptcha_site_key` и `formit.recaptcha_secret_key` (область `formit_recaptcha`).
4. Включённый фронтенд JS: `formit.frontend_js` = `js/web/formit.js` (значение по умолчанию при обычной установке FormIt).

Без `formit.frontend_js` FormIt не подключает скрипт Google и не запрашивает токен, поэтому хук на отправке падает.

## Как подключается JavaScript

Когда страница рендерится (до POST) и в `&hooks` есть `recaptcha`, FormIt:

1. Заполняет `[[+formit.recaptcha_html]]` двумя скрытыми полями: `g-recaptcha-response` и `g-recaptcha-action`.
2. Регистрирует `https://www.google.com/recaptcha/api.js?render={siteKey}`, если задан site key.
3. Регистрирует `assets/components/formit/js/web/formit.js`, если задан `formit.frontend_js`, и передаёт в конфиг JS объекты `recaptchaSiteKey` / `recaptchaDefaultAction`.

При отправке `formit.js` вызывает `grecaptcha.execute()`, записывает токен в `g-recaptcha-response`, затем делает обычный POST или [AJAX](extras/formit/formit.ajax), если на форме есть `data-formit-ajax-token`.

Скрипт Google вручную подключать не нужно. Нужны плейсхолдер в разметке формы и рабочая настройка `formit.frontend_js`.

## Использование

```php
[[!FormIt?
    &hooks=`recaptcha,email`
    &recaptchaAction=`contact`
]]
```

Внутри `<form>`:

```html
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

Ставьте `recaptcha` перед хуками, которые должны идти только после успешной оценки (например перед `email`). `redirect`, если есть, обычно последний.

Пример с полями и письмом: [Простая страница контактов](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## Системные настройки

Ключи задаются в **Системных настройках**, область `formit_recaptcha`:

| Настройка | Описание | По умолчанию |
| --- | --- | --- |
| `formit.recaptcha_site_key` | Публичный ключ reCAPTCHA v3 (site key). | |
| `formit.recaptcha_secret_key` | Секретный ключ reCAPTCHA v3 (secret key). | |
| `formit.recaptcha_min_score` | Минимальная оценка Google для принятия (от `0.0` до `1.0`). | `0.5` |

Для запроса токена также нужна:

| Настройка | Описание | По умолчанию |
| --- | --- | --- |
| `formit.frontend_js` | Путь к фронтенд-скрипту относительно URL assets FormIt. | `js/web/formit.js` |

После обновления с FormIt, где был reCAPTCHA v1, не опирайтесь на `formit.recaptcha_public_key`, `formit.recaptcha_private_key`, `recaptchaTheme`, `recaptchaJs` и `recaptcha_use_ssl`. Эти ключи и свойства удалены. Используйте настройки v3 выше.

## Поддерживаемые параметры

| Имя | Описание | По умолчанию |
| --- | --- | --- |
| `recaptchaAction` | Имя action для `grecaptcha.execute()`. Видно в аналитике админки Google reCAPTCHA. Допустимы буквы, цифры и подчёркивания (правила Google для action). | `submit` |

## Устранение неполадок

| Симптом | Что проверить |
| --- | --- |
| Всегда `fi.error.recaptcha` / «incorrect» | Пара ключей относится к **v3**. Домен добавлен в Google admin. Оценка может быть ниже `formit.recaptcha_min_score` (для теста временно `0.3`, потом поднять). |
| Пустой токен / ошибка без виджета | `[[+formit.recaptcha_html]]` внутри формы. В исходнике страницы есть `g-recaptcha-response`. `formit.frontend_js` = `js/web/formit.js`, в HTML есть `api.js?render=` и `formit.js`. |
| Локально ок, на проде нет | Хост продакшена должен быть в списке доменов ключа Google. После смены настроек очистите кэш MODX. |
| После апгрейда ещё фигурируют старые ключи | Заново введите v3 в `formit.recaptcha_site_key` / `formit.recaptcha_secret_key`. Старые public/private больше не используются. |

На сервере проверка идёт через `siteverify`: секрет, токен и IP клиента. PHP нужен исходящий HTTPS (cURL) до `www.google.com`.

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
6. [FormIt хук spam](extras/formit/formit.hooks/spam)
7. [AJAX-отправка форм](extras/formit/formit.ajax)
8. [Простая страница контактов](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page)
