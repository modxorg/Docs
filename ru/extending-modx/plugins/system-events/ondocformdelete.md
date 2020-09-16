---
title: "OnDocFormDelete"
translation: "extending-modx/plugins/system-events/ondocformdelete"
---

## Событие: OnDocFormDelete

Запускается после удаления ресурса

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                                       |
| -------- | ------------------------------------------------------------------------------ |
| resource | Ссылка на объект modResource.                                                  |
| id       | Идентификатор ресурса.                                                         |
| children | Массив идентификаторов дочерних элементов этого ресурса, которые были удалены. |

## Пример

Такой плагин отправит на почту список удаленных ресурсов:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormDelete':
        $modx->getService('mail', 'mail.modPHPMailer');
        $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
        $modx->mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
        //Адрес получателя
        $modx->mail->address('to', 'mail@pitrooo.ru');
        //Заголовок
        $modx->mail->set(modMail::MAIL_SUBJECT, 'Были удалены ресурсы');
        //тело письма
        foreach ($children as $value) {
            $resource = $modx->getObject('modResource', $value);
            $name .= '<br>'.$resource->get('pagetitle');
        }
        $contentbody = 'Были удален ресурс с id '.$id.' а вместе с ним '.$name;
        $modx->mail->set(modMail::MAIL_BODY, $contentbody);
        //Отправляем
        $modx->mail->setHTML(true);
        if (!$modx->mail->send()) {
            $modx->log(modX::LOG_LEVEL_ERROR,'Произошла ошибка при попытке отправки сообщения электронной почты: '.$modx->mail->mailer->ErrorInfo);
        }
        $modx->mail->reset();
        break;
}
```

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
