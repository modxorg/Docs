---
title: "Написание плагинов"
description: Как плагины MODX подписываются на системные события, читают имя события и возвращают или изменяют вывод, с примерами"
translation: "extending-modx/plugins"
---

## Что такое плагин?

Плагин — это PHP, который выполняется на системном событии, а не при отрисовке страницы. Сниппет работает, когда рендерится страница; плагин — когда что-то происходит: сохраняется чанк, чистится кэш, пользователь логинится. Все плагины, подписанные на сработавшее событие, выполняются по возрастанию приоритета, после чего управление возвращается вызывающему коду.

В других CMS этот механизм называют хуком, действием или фильтром — имя разное, суть одна. Большинство событий MODX возникает только в менеджере, поэтому плагины не ограничены фронтендом; полный список — в [Системных событиях](extending-modx/plugins/system-events "MODX System Events").

При сохранении из кода плагина удаляется любой закрывающий PHP-тег `?>`. Он не нужен: при выполнении код плагина окажется внутри другого PHP-кода.

## Модель событий

MODX вызывает системные события в своих процессах, чтобы вы могли менять поведение ядра без правок core. К одному событию можно привязать несколько плагинов. Они выполняются по приоритету: сначала с меньшим числом.

## Обработка события

В плагине способ работы с выводом зависит от системного события. Для одних вы возвращаете значение из плагина. Для других берёте вывод по ссылке и меняете его.

Если нужно узнать, какое событие вызвало плагин (например, когда он слушает несколько событий), имя события доступно так:

``` php
$eventName = $modx->event->name;
```

Код плагина на несколько событий:

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

## Сообщение пользователю

**Описание:** Отправьте пользователю сообщение при создании или редактировании страницы, например свой заголовок.
**Системные события:** OnDocFormPrerender

``` php
$modx->event->output('Hi there user!');
```

## Валидация при сохранении

**Описание:** Выполните пользовательскую валидацию при сохранении ресурса страницы.
**Системные события:** OnBeforeDocFormSave

``` php
// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";
```

Текст для пользователя передавайте в **$modx->event->output()**. Сообщение в лог отправляйте через `return`. Если валидация прошла, верните `null`.

**HTML не допускается**
Вывод в **$modx->event->output()** должен быть plain text, без HTML. Для OnBeforeDocFormSave этот текст становится сообщением об ошибке процессора и выводится как обычный текст.

Возвращаемое значение должно быть строкой. Если это число, склейте его с пустой строкой.

## Фильтр слов

**Описание:** Отфильтруйте слова в документе перед выводом на сайт.
**Системные события:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

## Редирект при 404

**Описание:** Перенаправьте пользователя на выбранный документ и отправьте сообщение.
**Системные события:** OnPageNotFound
**Системные настройки:** создайте эти три ключа в «Система → Настройки» — в ядре их нет:

- _pnf.page_: ID ресурса ошибки
- _pnf.mailto_: адрес получателя
- _pnf.mailfrom_: адрес отправителя

``` php
if ($modx->event->name == 'OnPageNotFound') {
     $errorPage = $modx->getOption('pnf.page');
     if (empty($errorPage)) {
         $modx->sendErrorPage();
     } else {
         $mailto = $modx->getOption('pnf.mailto');
         if (!empty($mailto)) {
            // send a message to a local account
            $resourceId = $modx->resource->get('id');
            $subject = 'Page not found';
            $body = 'Someone tried to access document id '.$resourceId;
            $modx->mail->set(\MODX\Revolution\modMail::MAIL_BODY, $body);
            $modx->mail->set(\MODX\Revolution\modMail::MAIL_FROM, $modx->getOption('pnf.mailfrom'));
            $modx->mail->set(\MODX\Revolution\modMail::MAIL_FROM_NAME, 'MODX');
            $modx->mail->set(\MODX\Revolution\modMail::MAIL_SENDER, 'MODX');
            $modx->mail->set(\MODX\Revolution\modMail::MAIL_SUBJECT, $subject);
            $modx->mail->address('to', $mailto);
            $modx->mail->setHTML(true);
            $modx->mail->send();
         }
         $modx->sendRedirect($modx->makeUrl($errorPage), ['count_attempts' => true]);
         exit;
    }
}
```

> [!WARNING]
> Внутри кода плагина используйте `$modx->…`, а не `$this->…`. В 3.x тело плагина подключается через `include` напрямую, без обёртки в метод, поэтому `$this` — это объект `modPlugin`, у которого нет ни `makeUrl()`, ни `getOption()`, ни лексиконных методов.

## Смотрите также

- [Системные события](extending-modx/plugins/system-events)
- [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
- [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
- [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
- [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
- [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
- [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
- [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
- [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
- [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
- [OnBeforeRegisterClientScripts](extending-modx/plugins/system-events/onbeforeregisterclientscripts)
- [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
- [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
- [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
- [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
- [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
- [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
- [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
- [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
- [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
- [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
- [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
- [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
- [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
- [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
- [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
- [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
- [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
- [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
- [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
- [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
- [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
- [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
- [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
- [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
- [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
- [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
- [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
- [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
- [OnElementNotFound](extending-modx/plugins/system-events/onelementnotfound)
- [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
- [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
- [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
- [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
- [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
- [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
- [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
- [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
- [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
- [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
- [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
- [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
- [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
- [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
- [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
- [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
- [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
- [OnMODXInit](extending-modx/plugins/system-events/onmodxinit)
- [OnPackageInstall](extending-modx/plugins/system-events/onpackageinstall)
- [OnPackageRemove](extending-modx/plugins/system-events/onpackageremove)
- [OnPackageUninstall](extending-modx/plugins/system-events/onpackageuninstall)
- [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
- [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
- [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
- [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
- [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
- [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
- [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
- [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
- [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
- [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
- [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
- [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
- [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
- [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
- [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
- [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
- [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
- [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
- [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
- [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
- [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
- [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
- [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
- [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
- [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
- [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
- [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
- [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
- [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
- [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
- [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
- [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
- [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
- [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
- [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
