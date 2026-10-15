---
title: "modMail"
_old_id: "199"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modmail"
---

## What is modMail?

modMail is an abstract class you extend to provide mail services in MODX. It cannot run by itself; an implementation class (such as PHPMailer) must extend it.

### What is modPHPMailer?

modPHPMailer is a class that extends modMail to provide an implementation for the open source PHPMailer class.

<!-- MEDIA: diagram | nice | The class chain: modMail is the abstract base, modPHPMailer extends it, PHPMailer does the sending, and a class of your own plugs in the same way | Draw it from the two paragraphs above -->

## Usage

The example below sends a Chunk as an HTML email through the bundled modPHPMailer:

``` php
$message = $modx->getChunk('myEmailTemplate');

$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,'me@example.org');
$modx->mail->set(modMail::MAIL_FROM_NAME,'Johnny Tester');
$modx->mail->set(modMail::MAIL_SUBJECT,'Check out my new email template!');
$modx->mail->address('to','user@example.com');
$modx->mail->address('reply-to','me@xexample.org');
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
}
$modx->mail->reset();
```

Call `reset()` before sending another message — it blanks all the fields. Every field is optional, so `reply-to` can be skipped when you don't need it.

To reach several recipients, repeat `address('to')`:

``` php
$modx->mail->address('to','user@example.com');
$modx->mail->address('to','mom@example.org');
```

## Placeholders in your Chunk

The body can come from anywhere. The example above uses [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk") (see its optional second argument there); you can also pass a static string to **modMail::MAIL\_BODY**. Which placeholders appear in the body is up to you.

## What if I want to use another email class?

Extend `modMail` with that class and load it with [getService](extending-modx/modx-class/reference/modx.getservice "modX.getService"). You get all modMail functionality and provide the wrapper class yourself, as modPHPMailer does.

<!-- MEDIA: snippet-code | nice | A small wrapper class extending modMail and the getService() call that loads it, the same pattern modPHPMailer uses | Write it from the paragraph above; do not invent methods beyond the ones listed on this page -->

## API and settings

### Methods

Beyond the `set()`, `address()`, `send()` and `reset()` methods used above, the modPHPMailer implementation provides:

- `header($header)` — add a raw header to the message;
- `attach($file, $name = '', $encoding = 'base64', $type = 'application/octet-stream')` — attach a file;
- `embedImage($image, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream')` — embed an inline image (referenced by `$cid` in the HTML body);
- `clearEmbeddedImages()` / `clearAttachments()` — remove previously added images/attachments before reusing the object;
- `setHTML($toggle)` — switch between plain-text and HTML mode (used in the example above);
- `hasError()` / `getError()` — check for and read the underlying mailer error;
- `getDefaultAttributes()` — the resolved attribute defaults (see below).

### Attribute constants

`set()` and `get()` accept the keys defined as class constants on `modMail`:

- general: `MAIL_BODY`, `MAIL_BODY_TEXT`, `MAIL_CHARSET`, `MAIL_CONTENT_TYPE`, `MAIL_ENCODING`, `MAIL_ENGINE`, `MAIL_ENGINE_PATH`, `MAIL_ERROR_INFO`, `MAIL_FROM`, `MAIL_FROM_NAME`, `MAIL_HOSTNAME`, `MAIL_LANGUAGE`, `MAIL_PRIORITY`, `MAIL_READ_TO`, `MAIL_SENDER`, `MAIL_SERVICE`, `MAIL_SUBJECT`;
- SMTP: `MAIL_SMTP_AUTH`, `MAIL_SMTP_HELO`, `MAIL_SMTP_HOSTS`, `MAIL_SMTP_KEEPALIVE`, `MAIL_SMTP_PASS`, `MAIL_SMTP_PORT`, `MAIL_SMTP_SECURE`, `MAIL_SMTP_AUTOTLS`, `MAIL_SMTP_SINGLE_TO`, `MAIL_SMTP_TIMEOUT`, `MAIL_SMTP_USER`;
- DKIM: `MAIL_DKIM_SELECTOR`, `MAIL_DKIM_IDENTITY`, `MAIL_DKIM_DOMAIN`, `MAIL_DKIM_PRIVATEKEYFILE`, `MAIL_DKIM_PRIVATEKEYSTRING`, `MAIL_DKIM_PASSPHRASE`.

### System settings

`getDefaultAttributes()` reads its defaults from system settings, so a site-wide mailer is configured without code. With `mail_use_smtp` enabled, the SMTP settings below are used instead of PHP `mail()`.

| Setting | Default |
|---|---|
| `mail_smtp_hosts` | `localhost` |
| `mail_smtp_port` | `25` |
| `mail_smtp_autotls` | `true` |
| `mail_smtp_timeout` | `10` |
| `mail_charset` | `UTF-8` |
| `mail_encoding` | `8bit` |
| `mail_smtp_auth`, `mail_smtp_helo`, `mail_smtp_keepalive`, `mail_smtp_pass`, `mail_smtp_secure`, `mail_smtp_single_to`, `mail_smtp_user` | — |
| `mail_dkim_selector`, `mail_dkim_identity`, `mail_dkim_domain`, `mail_dkim_privatekeyfile`, `mail_dkim_privatekeystring`, `mail_dkim_passphrase` | — |

See [Sending mail](building-sites/sending-mail) for the manager-side configuration of these settings.

## See Also

- [MODX Services](extending-modx/services "MODX Services")
- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService")
- [Sending mail](building-sites/sending-mail)
