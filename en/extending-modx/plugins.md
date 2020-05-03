---
title: "Writing Plugins"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

## What is a Plugin?

Plugins are similar to Snippets in that they are bits of PHP code that have access to the MODX API. The big difference, however, is in _when_ the code executes. You put Snippets inside of a page or inside a template and they run when the page is viewed, whereas Plugins are set to execute during certain system events, e.g. saving a Chunk, or emptying the cache. So when a given event "fires", any Plugin "listening" for that event is executed. Once the Plugin's code has executed, control returns to the point after the spot where the System Event was triggered.

**Other CMSs**
Every CMS uses some concept of "plugin", but the exact nomenclature may differ. In WordPress, for example, plugins are "hooked" to events called "actions" or "filters".

Since they execute during various events, Plugins aren't limited to front-end processing. Many events are triggered by events that take place only within the MODX Manager. There is a list of MODX System Events [here](http://wiki.modxcms.com/index.php/System_Events "MODX System Events").

Any closing PHP tag ?> will be stripped from your plugin code when it is saved. It's unnecessary (and unwanted) because the plugin code will end up inside other PHP code when executed.

## The Event Model

MODX invokes System Events across its code processes to allow you to modify core functionality without hacking the core. These System Events can have any number of Plugins attached to them, and will execute each Plugin in rank according to its priority (lowest numbers first).

## Handling an Event

In your Plugin, how you handle the output depends on the System Event you are in. For some system events, you return a value from the Plugin. For others, you access the output by reference and modify it.

If you need to know which event triggered your plugin (say, for a plugin that listens to more than one event), you can access the Event's name like so:

``` php
$eventName = $modx->event->name;
```

The code for a Plugin listening to more than one event looks like this:

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

## Plugin Examples

Plugins can be used for a variety of different applications, below are a couple of examples:

### Message the User

**Description:** Send a custom message to the user as they create/edit a page... a custom header.
**System Events:** OnDocFormPrerender

``` php
$modx->event->output('Hi there user!');
```

### Custom Validation

**Description:** Do some custom validation on saving a page resource
**System Events:** OnBeforeDocFormSave

``` php
// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";
```

The trick here is that what you want to message the user has to be passed to the **$modx->event->output()** function; any text you want to write to the logs can simply be returned by the plugin. If you pass validation, simply return null.

**No HTML Allowed**
The output you set in **$modx->event->output()** must not contain any HTML! Use plain text only! This is because the message is passed to the user via a Javascript modal window.

Return value must be a string. If your return value will be a number, concatenate it with an empty string.

### Word Filter

**Description:** Filter words from a document before it's displayed on the web
**System Events:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

### Page-Not-Found Redirector

**Description:** Redirects a user to selected document and sends a message
**System Events:** OnPageNotFound
**System Settings:**

- _pnf.page_: Error Resource ID
- _pnf.mailto_: Mail To Address
- _pnf.mailfrom_: Mail From Address

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

## See Also

[System Events](extending-modx/plugins/system-events)
[OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
[OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
[OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
[OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
[OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
[OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
[OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
[OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
[OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
[OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
[OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
[OnBeforeRegisterClientScripts](extending-modx/plugins/system-events/onbeforeregisterclientscripts)
[OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
[OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
[OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
[OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
[OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
[OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
[OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
[OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
[OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
[OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
[OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
[OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
[OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
[OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
[OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
[OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
[OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
[OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
[OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
[OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
[OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
[OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
[OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
[OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
[OnChunkSave](extending-modx/plugins/system-events/onchunksave)
[OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
[OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
[OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
[OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
[OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
[OnContextSave](extending-modx/plugins/system-events/oncontextsave)
[OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
[OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
[OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
[OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
[OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
[OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
[OnElementNotFound](extending-modx/plugins/system-events/onelementnotfound)
[OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
[OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
[OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
[OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
[OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
[OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
[OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
[OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
[OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
[OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
[OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
[OnInitCulture](extending-modx/plugins/system-events/oninitculture)
[OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
[OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
[OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
[OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
[OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
[OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
[OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
[OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
[OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
[OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
[OnModxInit](extending-modx/plugins/system-events/onmodxinit)
[OnPackageInstall](extending-modx/plugins/system-events/onpackageinstall)
[OnPackageRemove](extending-modx/plugins/system-events/onpackageremove)
[OnPackageUninstall](extending-modx/plugins/system-events/onpackageuninstall)
[OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
[OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
[OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
[OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
[OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
[OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
[OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
[OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
[OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
[OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
[OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
[OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
[OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
[OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
[OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
[OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
[OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
[OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
[OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
[OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
[OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
[OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
[OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
[OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
[OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
[OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
[OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
[OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
[OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
[OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
[OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
[OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
[OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
[OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
[OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
[OnUserRemove](extending-modx/plugins/system-events/onuserremove)
[OnUserSave](extending-modx/plugins/system-events/onusersave)
[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
[OnWebLogin](extending-modx/plugins/system-events/onweblogin)
[OnWebLogout](extending-modx/plugins/system-events/onweblogout)
[OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
[OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
[OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
