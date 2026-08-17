---
title: "Написание плагинов"
translation: "extending-modx/plugins"
---

## Что такое плагин?

Плагины похожи на сниппеты: это фрагменты PHP-кода с доступом к API MODX. Главное отличие в том, _когда_ выполняется код. Сниппеты вы вставляете в страницу или шаблон, и они запускаются при просмотре. Плагины срабатывают на системные события: сохранение чанка, очистка кеша и т. п. Когда событие «стреляет», выполняется каждый плагин, который на него подписан. После выполнения управление возвращается к точке сразу после места вызова системного события.

**Другие CMS**
В каждой CMS есть аналог «плагина», но термины могут отличаться. В WordPress, например, плагины «цепляются» к событиям «actions» или «filters».

Плагины не ограничены фронтендом. Многие события возникают только в менеджере MODX. Список системных событий MODX см. [здесь](https://docs.modx.com/current/en/extending-modx/plugins/system-events "MODX System Events").

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

## Примеры плагинов

Ниже несколько типичных сценариев:

### Сообщение пользователю

**Описание:** Отправьте пользователю сообщение при создании или редактировании страницы, например кастомный заголовок.
**Системные события:** OnDocFormPrerender

``` php
$modx->event->output('Hi there user!');
```

### Пользовательская валидация

**Описание:** Выполните пользовательскую валидацию при сохранении ресурса страницы.
**Системные события:** OnBeforeDocFormSave

``` php
// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";
```

Текст для пользователя передавайте в **$modx->event->output()**. Сообщение в лог отправляйте через `return`. Если валидация прошла, верните `null`.

**HTML не допускается**
Вывод в **$modx->event->output()** должен быть plain text, без HTML. Сообщение показывается в модальном окне JavaScript.

Возвращаемое значение должно быть строкой. Если это число, склейте его с пустой строкой.

### Фильтр слов

**Описание:** Отфильтруйте слова в документе перед выводом на сайт.
**Системные события:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

### Редирект при 404

**Описание:** Перенаправьте пользователя на выбранный документ и отправьте сообщение.
**Системные события:** OnPageNotFound
**Системные настройки:**

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
            $modx->getService('mail', 'mail.modPHPMailer');
            $modx->mail->set(modMail::MAIL_BODY, $body);
            $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('pnf.mailfrom'));
            $modx->mail->set(modMail::MAIL_FROM_NAME, 'MODX');
            $modx->mail->set(modMail::MAIL_SENDER, 'MODX');
            $modx->mail->set(modMail::MAIL_SUBJECT, $subject);
            $modx->mail->address('to',$mailto);
            $modx->mail->setHTML(true);
            $modx->mail->send();
         }
         $url = $this->makeUrl($scriptProperties['page']);
         $modx->sendRedirect($url, 1);
         exit;
    }
}
```

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
- [OnModxInit](extending-modx/plugins/system-events/onmodxinit)
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
- [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
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
