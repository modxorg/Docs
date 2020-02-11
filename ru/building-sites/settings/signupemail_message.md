---
title: "signupemail_message"
translation: "building-sites/settings/signupemail_message"
---

## signupemail_message

-   **Имя**: Письмо регистрации
-   **Тип**: String
-   **По умолчанию**:

```html
Hello [[+uid]] Here are your login details for [[+sname]] Content Manager:
Username: [[+uid]] Password: [[+pwd]] Once you log into the Content Manager
([[+surl]]), you can change your password. Regards, Site Administrator
```

Здесь вы можете установить сообщение, отправляемое вашим пользователям, когда вы создаете для них учетную запись, и позволить MODX отправить им электронное письмо, содержащее их имя пользователя и пароль.

Следующие заполнители заменяются Content Manager при отправке сообщения: `[[+sname]]` - Название вашего веб-сайта.
`[[+saddr]]` - Адрес электронной почты вашего сайта
`[[+surl]]` - URL вашего сайта
`[[+uid]]` - User\\'s Login name or id
`[[+pwd]]` - User\\'s password
`[[+ufn]]` - User\\'s full name.

Оставьте `[[+uid]]` и `[[+pwd]]` в электронном письме, иначе имя пользователя и пароль не будут отправлены по почте, и ваши пользователи не будут знать их имя пользователя или пароль!
