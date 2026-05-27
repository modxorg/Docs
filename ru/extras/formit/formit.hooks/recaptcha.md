---
title: "recaptcha"
description: "Хук recaptcha для Formit"
translation: "extras/formit/formit.hooks/recaptcha"
---

## Хук recaptcha для FormIt

Хук recaptcha включает поддержку reCAPTCHA v3 для форм FormIt. reCAPTCHA v3 работает незаметно в фоне — пользователю не показывается никаких чекбоксов или заданий. Google возвращает оценку (0.0–1.0), отражающую вероятность того, что форму отправил человек; заявки ниже минимального порога отклоняются.

## Требования

- Ключи reCAPTCHA v3 (site key и secret key) с [https://www.google.com/recaptcha](https://www.google.com/recaptcha)
- Фронтенд JS FormIt включён через системную настройку `formit.frontend_js` (значение: `js/web/formit.js`)

## Использование

Добавьте `recaptcha` в параметр `&hooks`:

```php
[[!FormIt?
    &hooks=`recaptcha,email`
]]
```

Добавьте плейсхолдер reCAPTCHA и плейсхолдер ошибки в форму:

```html
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

`[[+formit.recaptcha_html]]` выводит два скрытых поля (`g-recaptcha-response` и `g-recaptcha-action`), необходимых для v3. FormIt автоматически подключает скрипт Google reCAPTCHA и выполняет запрос токена при отправке формы.

## Системные настройки

Настройте ключи в **Системных настройках** в области `formit_recaptcha`:

| Настройка | Описание | По умолчанию |
| --- | --- | --- |
| `formit.recaptcha_site_key` | Ваш публичный ключ reCAPTCHA v3 (site key). | |
| `formit.recaptcha_secret_key` | Ваш приватный ключ reCAPTCHA v3 (secret key). | |
| `formit.recaptcha_min_score` | Минимальная оценка для принятия заявки (0.0–1.0). | `0.5` |

## Поддерживаемые параметры

| Имя | Описание | По умолчанию |
| --- | --- | --- |
| `recaptchaAction` | Имя action, отправляемое в Google вместе с токеном. Отображается в панели администратора reCAPTCHA. | `submit` |

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
