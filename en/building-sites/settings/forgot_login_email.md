---
title: "forgot_login_email"
_old_id: "130"
_old_uri: "2.x/administering-your-site/settings/system-settings/forgot_login_email"
---

## Password reset email (MODX 3)

In MODX 3 the manager forgot-password flow no longer emails a temporary password. The user gets a one-time reset link, opens the manager login screen, and chooses a new password. [#13786](https://github.com/modxcms/revolution/pull/13786)

The email body comes from the lexicon key `login_forgot_email` (namespace `core`, topic `login`), not from a system setting. Edit it under System → Lexicon Management, or override it in a custom lexicon.

The default English text is:

```html
<h2>Forgot your password?</h2>
<p>We received a request to change your MODX Revolution password. You can reset your password by clicking the button below and following the instructions on screen.</p>
<p class="center"><a href="[[+url_scheme]][[+http_host]][[+manager_url]]?modhash=[[+hash]]" class="btn">Reset my password</a></p>
<p class="small">If you did not send this request, please ignore this email.</p>
```

### Placeholders

| Placeholder | Role |
| --- | --- |
| `[[+hash]]` | One-time activation hash (required in the reset URL as `modhash`) |
| `[[+url_scheme]]`, `[[+http_host]]`, `[[+manager_url]]` | Build the absolute manager URL |
| `[[+username]]` and other user fields | Available from the user object when the message is parsed |
| System config placeholders | Merged from `$modx->config` before parse |

Do **not** put `[[+password]]` in the template. MODX 3 does not generate or send a password in this email.

### Reset flow

1. User requests a reset on the manager login screen (`allow_manager_login_forgot_password` must be enabled).
2. MODX stores a hash and emails the lexicon message with `?modhash=[[+hash]]`.
3. Opening that URL loads the login screen in password-change mode.
4. The user enters and confirms a new password.

### Legacy `forgot_login_email` setting

Revolution 2.x used the `forgot_login_email` system setting for this template. That setting is removed in MODX 3. Upgraded sites that still have a customized value in the database should move the HTML into the `login_forgot_email` lexicon entry and drop any `[[+password]]` line.
