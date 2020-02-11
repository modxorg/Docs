---
title: "forgot_login_email"
translation: "building-sites/settings/forgot_login_email"
---

## forgot_login_email

-   **Имя**: Письмо восстановления пароля
-   **Тип**: textarea
-   **По умолчанию**: (see below)
-   **Доступно в**: Revolution 2.0.0+

Шаблон для электронного письма, которое отправляется, когда пользователь забыл свое имя пользователя и/или пароль MODX.

По умолчанию это:

```html
<p>Hello [[+username]],</p>
<p>
    A request for a password reset has been issued for your MODX user. If you
    sent this, you may follow this link and use this password to login. If you
    did not send this request, please ignore this email.
</p>

<p>
    <strong>Activation Link:</strong>
    [[+url_scheme]][[+http_host]][[+manager_url]]?modahsh=[[+hash]]<br />
    <strong>Username:</strong> [[+username]]<br />
    <strong>Password:</strong> [[+password]]<br />
</p>

<p>
    After you log into the MODX Manager, you can change your password again, if
    you wish.
</p>

<p>Regards,<br />Site Administrator</p>
```
