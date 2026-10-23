---
title: "Writing Plugins"
description: How MODX plugins hook into system events, read the event name, and return or modify output, with worked examples"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

## What is a Plugin?

A Plugin is PHP that runs at a system event. A Snippet runs when the page renders. A Plugin runs when something happens: a Chunk is saved, the cache is cleared, a user logs in. You can change core functionality without editing core files.

Every Plugin attached to the event runs, lowest priority number first. Control then returns to the caller.

Most MODX events fire only inside the Manager, so Plugins are not limited to front-end work. The full list is in [System Events](extending-modx/plugins/system-events "MODX System Events").

Any closing PHP tag `?>` is stripped from Plugin code when it is saved. It is unnecessary: the body ends up inside other PHP code when executed.

## Handling an Event

How you handle output depends on the event. For some events, return a value from the Plugin. For others, take the output by reference and change it.

Read the event name from `$modx->event->name`. A Plugin on more than one event switches on it:

``` php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnWebPageInit':
        /* do something */
        break;
    case 'OnWebPagePrerender':
        /* do something else */
        break;
}
```

## Message the User

Shown on the resource form as a custom header.

**System Events:** OnDocFormPrerender

``` php
$modx->event->output('Hi there user!');
```

## Custom Validation

**System Events:** OnBeforeDocFormSave

``` php
// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";
```

Pass the user message to **$modx->event->output()**. Return log text from the Plugin. If validation passes, return null.

> [!WARNING]
> The output you set in **$modx->event->output()** must not contain any HTML. Use plain text only. For OnBeforeDocFormSave the text becomes the processor's error message, which is rendered as plain text.

Return value must be a string. If your return value will be a number, concatenate it with an empty string.

## Word Filter

**System Events:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

## Page-Not-Found Redirector

**System Events:** OnPageNotFound
**System Settings:** create `pnf.page` in System → Settings. It does not ship with core. The value is the error resource id.

``` php
if ($modx->event->name == 'OnPageNotFound') {
    $errorPage = $modx->getOption('pnf.page');
    if (empty($errorPage)) {
        $modx->sendErrorPage();
    } else {
        $modx->sendRedirect($modx->makeUrl($errorPage), ['count_attempts' => true]);
    }
}
```

`$modx->resource` is not loaded on this event. Do not read it.

## Sending mail from a plugin

Mail does not exist until the plugin asks for it. `getService()` returns a `MODX\Revolution\Mail\modPHPMailer`. Constants live on `MODX\Revolution\Mail\modMail`.

Create `pnf.mailto` and `pnf.mailfrom` in System → Settings. They do not ship with core.

``` php
$mail = $modx->getService('mail', \MODX\Revolution\Mail\modPHPMailer::class);
if (!$mail) {
   return;
}
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_BODY, 'Someone requested a missing page.');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_FROM, $modx->getOption('pnf.mailfrom'));
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_FROM_NAME, 'MODX');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_SENDER, 'MODX');
$mail->set(\MODX\Revolution\Mail\modMail::MAIL_SUBJECT, 'Page not found');
$mail->address('to', $modx->getOption('pnf.mailto'));
$mail->setHTML(true);
$mail->send();
```

> [!WARNING]
> Inside Plugin code use `$modx->…`, never `$this->…`. The plugin body is included from inside the plugin object, so `$this` is the `modPlugin`. It has no `makeUrl()` or lexicon helpers.

## See Also

- [System Events](extending-modx/plugins/system-events)
