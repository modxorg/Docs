---
title: "recaptcha"
description: "Хук recaptcha для Formit"
translation: "extras/formit/formit.hooks/recaptcha"
---

## Хук recaptcha для FormIt

The recaptcha хук включит поддержку reCaptcha для форм FormIt.

## Использование

Во-первых, добавьте recaptcha в параметр `&hooks` в вызове FormIt. Затем вам нужно будет включить в форму следующие плейсхолдеры: 

``` php
[[+formit.recaptcha_html]]
[[!+fi.error.recaptcha]]
```

Первый плейсхолдер - это место, где будет отображаться форма reCaptcha; 2-е - сообщение об ошибке (если есть) для reCaptcha.

Наконец, вам необходимо настроить закрытый и открытый ключи reCaptcha в системных настройках. Для reCaptcha доступны следующие настройки: 

| Имя                            | Описание                                                             |
| ------------------------------ | -------------------------------------------------------------------- |
| formit.recaptcha\_public\_key  | Ваш публичный ключ reCaptcha.                                        |
| formit.recaptcha\_private\_key | Ваш приватный ключ reCaptcha.                                        |
| formit.recaptcha\_use\_ssl     | Следует ли использовать SSL для запросов reCaptcha. По умолчанию - "нет".  |

## Поддерживаемые параметры

Хук reCaptcha имеет несколько дополнительных параметров конфигурации: 

| Имя           | Описание                                                                                                                                       | По умолчанию |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| recaptchaJs    | Объект JSON для передачи в переменную `RecaptchaOptions`, которая настраивает виджет reCaptcha. См. Официальную документацию по reCaptcha для получения дополнительной информации. | {}      |
| recaptchaTheme | Используемая тема reСaptcha.                                                                                                                        | clean   |

## Смотрите также

1. [FormIt хук email](extras/formit/formit.hooks/email)
2. [FormIt хук FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt хук FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt хук math](extras/formit/formit.hooks/math)
5. [FormIt хук recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt хук redirect](extras/formit/formit.hooks/redirect)
7. [FormIt хук spam](extras/formit/formit.hooks/spam)
8. [FormIt прехук FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
