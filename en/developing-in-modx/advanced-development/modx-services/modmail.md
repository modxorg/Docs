---
title: "modMail"
_old_id: "199"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modmail"
---

## What is modMail?

modMail is an abstract class that can be extended to provide mail services for Revolution. It cannot be run by itself, but must be extended with an implementation class (such as PHPMailer).

### What is modPHPMailer?

modPHPMailer is a class that extends modMail to provide an implementation for the open source PHPMailer class.

### Other modMail Implementations

- [modSwiftMailer](/extras/revo/modswiftmailer "modSwiftMailer") - Can be downloaded through Package Management.

## Usage

The following example is based on the native modPHPMailer which comes with MODX Revolution.

Let's say we have an email template in the Chunk 'myEmailTemplate'. We want to send it via mail to user@example.com, with the From address being 'me@example.org'. We also want it to be an HTML email. Here's how we'd do it:

```
<pre class="brush: php">
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

```Simple, no?

Note that we have to reset() if we want to send mail again; this resets all the fields to blank. Also, the fields above are _optional_ (just like PHPMailer), so that if you didn't want to specify a 'reply-to' (though we recommend it!) you can.

Also, if you want to send the email to multiple addresses, you can simply call address('to') again, like so:

```
<pre class="brush: php">
$modx->mail->address('to','user@example.com');
$modx->mail->address('to','mom@example.org');

```And finally, the example code above will send a message to our error.log if the mail isn't sent for some reason (usually a server misconfiguration).

## Placeholders in your Chunk

In the example above, [modX.getChunk](developing-in-modx/other-development-resources/class-reference/modx/modx.getchunk "modX.getChunk") was used as the mail message. See the documentation on that function for how to use its optional second argument. As far as modMail is concerned, the placeholders used are entirely up to you; you don't even have to use getChunk at all. You could just as easily pass the **modMail::MAIL\_BODY** setting a static string.

## What if I want to use another email class?

Simple - just extend modMail with that class, then load your class via [getService](developing-in-modx/other-development-resources/class-reference/modx/modx.getservice "modX.getService"). You'll get all the modMail functionality, but you will have to provide the wrapper class (like modPHPMailer) to do so.

## See Also

- [MODx Services](developing-in-modx/advanced-development/modx-services "MODx Services")
- [modX.getService](developing-in-modx/other-development-resources/class-reference/modx/modx.getservice "modX.getService")
- [modSwiftMailer](/extras/revo/modswiftmailer "modSwiftMailer")