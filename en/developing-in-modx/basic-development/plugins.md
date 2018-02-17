---
title: "Plugins"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

- [What is a Plugin?](#Plugins-WhatisaPlugin%3F)
- [The Event Model](#Plugins-TheEventModel)
- [Handling an Event](#Plugins-HandlinganEvent)
- [Plugin Examples](#Plugins-PluginExamples)
  - [Message the User:](#Plugins-MessagetheUser%3A)
  - [Custom Validation](#Plugins-CustomValidation)
  - [Word Filter](#Plugins-WordFilter)
  - [Page-Not-Found Redirector:](#Plugins-PageNotFoundRedirector%3A)
- [See Also](#Plugins-SeeAlso)



## What is a Plugin?

Plugins are similar to Snippets in that they are bits of PHP code that have access to the MODx API. The big difference, however, is in _when_ the code executes. You put Snippets inside of a page or inside a template and they run when the page is viewed, whereas Plugins are set to execute during certain system events, e.g. saving a Chunk, or emptying the cache. So when a given event "fires", any Plugin "listening" for that event is executed. Once the Plugin's code has executed, control returns to the point after the spot where the System Event was triggered.

**Other CMSs** 
 Every CMS uses some concept of "plugin", but the exact nomenclature may differ. In WordPress, for example, plugins are "hooked" to events called "actions" or "filters".

Since they execute during various events, Plugins aren't limited to front-end processing. Many events are triggered by events that take place only within the MODx Manager. There is a list of MODx System Events [here](http://wiki.modxcms.com/index.php/System_Events "MODx System Events").

Any closing PHP tag ?> will be stripped from your plugin code when it is saved. It's unnecessary (and unwanted) because the plugin code will end up inside other PHP code when executed.

## The Event Model

MODx invokes System Events across its code processes to allow you to modify core functionality without hacking the core. These System Events can have any number of Plugins attached to them, and will execute each Plugin in rank according to its priority (lowest numbers first).

## Handling an Event

In your Plugin, how you handle the output depends on the System Event you are in. For some system events, you return a value from the Plugin. For others, you access the output by reference and modify it.

If you need to know which event triggered your plugin (say, for a plugin that listens to more than one event), you can access the Event's name like so:

```
<pre class="brush: php">$eventName = $modx->event->name;

```The code for a Plugin listening to more than one event looks like this:

```
<pre class="brush: php">$eventName = $modx->event->name;
switch($eventName) {
    case 'OnWebPageInit':
        /* do something */
        break;
    case 'OnWebPagePrerender':
        /* do something else */
        break;
}

```## Plugin Examples

Plugins can be used for a variety of different applications, below are a couple of examples:

### Message the User:

**Description:** Send a custom message to the user as they create/edit a page... a custom header. 
**System Events:** OnDocFormPrerender

```
<pre class="brush: php">$modx->event->output('Hi there user!');

```- - - - - -

### Custom Validation

**Description:** Do some custom validation on saving a page resource 
**System Events:** OnBeforeDocFormSave

```
<pre class="brush: php">// Do some logical stuff.... if validation failed:
$modx->event->output('Something did not validate!');
return "This goes to the logs";

```The trick here is that what you want to message the user has to be passed to the **$modx->event->output()** function; any text you want to write to the logs can simply be returned by the plugin. If you pass validation, simply return null.

**No HTML Allowed** 
 The output you set in **$modx->event->output()** must not contain any HTML! Use plain text only! This is because the message is passed to the user via a Javascript modal window.

Return value must be a string. If your return value will be a number, concatenate it with an empty string.


- - - - - -

### Word Filter

**Description:** Filter words from a document before it's displayed on the web 
**System Events:** OnWebPagePrerender

```
<pre class="brush: php">$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);


```- - - - - -

### Page-Not-Found Redirector:

**Description:** Redirects a user to selected document and sends a message 
**System Events:** OnPageNotFound 
**System Settings:**

- _pnf.page_: Error Resource ID
- _pnf.mailto_: Mail To Address
- _pnf.mailfrom_: Mail From Address

```
<pre class="brush: php">if ($modx->event->name == 'OnPageNotFound') {
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

```## See Also

1. [System Events](developing-in-modx/basic-development/plugins/system-events)
  1. [OnBeforeCacheUpdate](developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate)
  2. [OnBeforeChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete)
  3. [OnBeforeChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave)
  4. [OnBeforeDocFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete)
  5. [OnBeforeDocFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave)
  6. [OnBeforeManagerLogout](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout)
  7. [OnBeforeSaveWebPageCache](developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache)
  8. [OnBeforeWebLogout](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout)
  9. [OnCacheUpdate](developing-in-modx/basic-development/plugins/system-events/oncacheupdate)
  10. [OnChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onchunkformdelete)
  11. [OnChunkFormPrerender](developing-in-modx/basic-development/plugins/system-events/onchunkformprerender)
  12. [OnChunkFormRender](developing-in-modx/basic-development/plugins/system-events/onchunkformrender)
  13. [OnChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onchunkformsave)
  14. [OnDocFormDelete](developing-in-modx/basic-development/plugins/system-events/ondocformdelete)
  15. [OnDocFormPrerender](developing-in-modx/basic-development/plugins/system-events/ondocformprerender)
  16. [OnDocFormRender](developing-in-modx/basic-development/plugins/system-events/ondocformrender)
  17. [OnDocFormSave](developing-in-modx/basic-development/plugins/system-events/ondocformsave)
  18. [OnDocPublished](developing-in-modx/basic-development/plugins/system-events/ondocpublished)
  19. [OnDocUnPublished](developing-in-modx/basic-development/plugins/system-events/ondocunpublished)
  20. [OnLoadWebPageCache](developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache)
  21. [OnManagerLogin](developing-in-modx/basic-development/plugins/system-events/onmanagerlogin)
  22. [OnManagerLogout](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout)
  23. [OnSiteRefresh](developing-in-modx/basic-development/plugins/system-events/onsiterefresh)
  24. [OnUserChangePassword](developing-in-modx/basic-development/plugins/system-events/onuserchangepassword)
  25. [OnWebLogin](developing-in-modx/basic-development/plugins/system-events/onweblogin)
  26. [OnWebLogout](developing-in-modx/basic-development/plugins/system-events/onweblogout)
  27. [OnWebPagePrerender](developing-in-modx/basic-development/plugins/system-events/onwebpageprerender)
  28. [OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender)
  29. [OnTemplateVarBeforeSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave)
  30. [OnTemplateVarSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave)
  31. [OnTemplateVarBeforeRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove)
  32. [OnTemplateVarRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove)
  33. [OnBeforeEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash)
  34. [OnBeforeManagerLogin](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin)
  35. [OnBeforeManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit)
  36. [OnBeforePluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete)
  37. [OnBeforePluginFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave)
  38. [OnBeforeSnipFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete)
  39. [OnBeforeSnipFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave)
  40. [OnBeforeTempFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete)
  41. [OnBeforeTempFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave)
  42. [OnBeforeTVFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetvformdelete)
  43. [OnBeforeTVFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave)
  44. [OnBeforeUserActivate](developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate)
  45. [OnBeforeUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete)
  46. [OnBeforeUserFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave)
  47. [OnBeforeWebLogin](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin)
  48. [OnCategoryBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncategorybeforeremove)
  49. [OnCategoryBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncategorybeforesave)
  50. [OnCategoryRemove](developing-in-modx/basic-development/plugins/system-events/oncategoryremove)
  51. [OnCategorySave](developing-in-modx/basic-development/plugins/system-events/oncategorysave)
  52. [OnChunkBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onchunkbeforeremove)
  53. [OnChunkBeforeSave](developing-in-modx/basic-development/plugins/system-events/onchunkbeforesave)
  54. [OnChunkRemove](developing-in-modx/basic-development/plugins/system-events/onchunkremove)
  55. [OnChunkSave](developing-in-modx/basic-development/plugins/system-events/onchunksave)
  56. [OnContextBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncontextbeforeremove)
  57. [OnContextBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave)
  58. [OnContextFormPrerender](developing-in-modx/basic-development/plugins/system-events/oncontextformprerender)
  59. [OnContextFormRender](developing-in-modx/basic-development/plugins/system-events/oncontextformrender)
  60. [OnContextRemove](developing-in-modx/basic-development/plugins/system-events/oncontextremove)
  61. [OnContextSave](developing-in-modx/basic-development/plugins/system-events/oncontextsave)
  62. [OnEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onemptytrash)
  63. [OnFileManagerUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
  64. [OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
  65. [OnInitCulture](developing-in-modx/basic-development/plugins/system-events/oninitculture)
  66. [OnLoadWebDocument](developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
  67. [OnManagerAuthentication](developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
  68. [OnManagerLoginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
  69. [OnManagerLoginFormRender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
  70. [OnManagerPageAfterRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
  71. [OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
  72. [OnPageNotFound](developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
  73. [OnPageUnauthorized](developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
  74. [OnParseDocument](developing-in-modx/basic-development/plugins/system-events/onparsedocument)
  75. [OnPluginBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
  76. [OnPluginBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
  77. [OnPluginEventRemove](developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
  78. [OnPluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
  79. [OnPluginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
  80. [OnPluginFormRender](developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
  81. [OnPluginFormSave](developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
  82. [OnPluginRemove](developing-in-modx/basic-development/plugins/system-events/onpluginremove)
  83. [OnPluginSave](developing-in-modx/basic-development/plugins/system-events/onpluginsave)
  84. [OnPropertySetBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
  85. [OnPropertySetBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
  86. [OnPropertySetRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
  87. [OnPropertySetSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
  88. [OnResourceGroupBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
  89. [OnResourceGroupBeforeSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
  90. [OnResourceGroupRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
  91. [OnResourceGroupSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
  92. [OnRichTextBrowserInit](developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
  93. [OnRichTextEditorInit](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
  94. [OnRichTextEditorRegister](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
  95. [OnSiteSettingsRender](developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
  96. [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate)
  97. [OnUserBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
  98. [OnUserBeforeSave](developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
  99. [OnUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
  100. [OnUserFormSave](developing-in-modx/basic-development/plugins/system-events/onuserformsave)
  101. [OnUserNotFound](developing-in-modx/basic-development/plugins/system-events/onusernotfound)
  102. [OnUserRemove](developing-in-modx/basic-development/plugins/system-events/onuserremove)
  103. [OnUserSave](developing-in-modx/basic-development/plugins/system-events/onusersave)
  104. [OnWebAuthentication](developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
  105. [OnWebPageComplete](developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
  106. [OnWebPageInit](developing-in-modx/basic-development/plugins/system-events/onwebpageinit)