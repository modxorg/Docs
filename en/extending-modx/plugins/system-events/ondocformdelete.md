---
title: "OnDocFormDelete"
_old_id: "419"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformdelete"
---

## Event: OnDocFormDelete

Fires after a Resource is deleted via the manager.

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name     | Description                                                      |
| -------- | ---------------------------------------------------------------- |
| resource | A reference to the modResource object.                           |
| id       | The ID of the Resource.                                          |
| children | An array of IDs of children of this resource which were deleted. |

## Example

Such a plugin will send a list of deleted resources by email:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormDelete':
        $modx->getService('mail', 'mail.modPHPMailer');
        $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
        $modx->mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
        //Address of the recipient
        $modx->mail->address('to', 'mail@pitrooo.ru');
        //Title
        $modx->mail->set(modMail::MAIL_SUBJECT, 'Resources have been removed');
        // Body of letter
        foreach ($children as $value) {
            $resource = $modx->getObject('modResource', $value);
            $name .= '<br>'.$resource->get('pagetitle');
        }
        $contentbody = 'The resource was removed from id '.$id.' and with him '.$name;
        $modx->mail->set(modMail::MAIL_BODY, $contentbody);
        // We send
        $modx->mail->setHTML(true);
        if (!$modx->mail->send()) {
            $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send an email message: '.$modx->mail->mailer->ErrorInfo);
        }
        $modx->mail->reset();
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
