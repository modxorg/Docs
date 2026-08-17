---
title: "signupemail_message"
translation: "building-sites/settings/signupemail_message"
---

## signupemail\_message

**Имя**: Письмо регистрации  
**Тип**: String  
**По умолчанию**:

``` html
Hello [[+uid]]

Here are your login details for [[+sname]] Content Manager:

Username: [[+uid]]
Password: [[+pwd]]

Once you log into the Content Manager ([[+surl]]), you can change your password.

Regards,
Site Administrator
```

Здесь задаётся текст письма, которое MODX отправляет пользователю, когда вы создаёте для него учётную запись и включаете отправку логина и пароля.

При отправке Content Manager подставляет плейсхолдеры:

- `[[+sname]]`: название сайта
- `[[+saddr]]`: email сайта
- `[[+surl]]`: URL сайта
- `[[+uid]]`: логин или id пользователя
- `[[+pwd]]`: пароль пользователя
- `[[+ufn]]`: полное имя пользователя

Оставьте в письме `[[+uid]]` и `[[+pwd]]`. Иначе логин и пароль не уйдут, и пользователь их не узнает.
