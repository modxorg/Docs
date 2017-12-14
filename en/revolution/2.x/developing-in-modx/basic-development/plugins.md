---
title: "Plugins"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

<div>- [What is a Plugin?](#Plugins-WhatisaPlugin%3F)
- [The Event Model](#Plugins-TheEventModel)
- [Handling an Event](#Plugins-HandlinganEvent)
- [Plugin Examples](#Plugins-PluginExamples)
  - [Message the User:](#Plugins-MessagetheUser%3A)
  - [Custom Validation](#Plugins-CustomValidation)
  - [Word Filter](#Plugins-WordFilter)
  - [Page-Not-Found Redirector:](#Plugins-PageNotFoundRedirector%3A)
- [See Also](#Plugins-SeeAlso)

</div>What is a Plugin?
-----------------

Plugins are similar to Snippets in that they are bits of PHP code that have access to the MODx API. The big difference, however, is in _when_ the code executes. You put Snippets inside of a page or inside a template and they run when the page is viewed, whereas Plugins are set to execute during certain system events, e.g. saving a Chunk, or emptying the cache. So when a given event "fires", any Plugin "listening" for that event is executed. Once the Plugin's code has executed, control returns to the point after the spot where the System Event was triggered.

<div class="info">**Other CMSs**   
 Every CMS uses some concept of "plugin", but the exact nomenclature may differ. In WordPress, for example, plugins are "hooked" to events called "actions" or "filters".</div>Since they execute during various events, Plugins aren't limited to front-end processing. Many events are triggered by events that take place only within the MODx Manager. There is a list of MODx System Events [here](http://wiki.modxcms.com/index.php/System_Events "MODx System Events").

<div class="info">Any closing PHP tag ?> will be stripped from your plugin code when it is saved. It's unnecessary (and unwanted) because the plugin code will end up inside other PHP code when executed.</div>The Event Model
---------------

MODx invokes System Events across its code processes to allow you to modify core functionality without hacking the core. These System Events can have any number of Plugins attached to them, and will execute each Plugin in rank according to its priority (lowest numbers first).

Handling an Event
-----------------

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

```Plugin Examples
---------------

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

<div class="warning">**No HTML Allowed**   
 The output you set in **$modx->event->output()** must not contain any HTML! Use plain text only! This is because the message is passed to the user via a Javascript modal window.  
  
Return value must be a string. If your return value will be a number, concatenate it with an empty string.  
</div>- - - - - -

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

```See Also
--------

1. [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events)
  1. [OnBeforeCacheUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate)
  2. [OnBeforeChunkFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete)
  3. [OnBeforeChunkFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave)
  4. [OnBeforeDocFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete)
  5. [OnBeforeDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave)
  6. [OnBeforeManagerLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout)
  7. [OnBeforeSaveWebPageCache](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache)
  8. [OnBeforeWebLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout)
  9. [OnCacheUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncacheupdate)
  10. [OnChunkFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformdelete)
  11. [OnChunkFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformprerender)
  12. [OnChunkFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformrender)
  13. [OnChunkFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformsave)
  14. [OnDocFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformdelete)
  15. [OnDocFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformprerender)
  16. [OnDocFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformrender)
  17. [OnDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformsave)
  18. [OnDocPublished](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocpublished)
  19. [OnDocUnPublished](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocunpublished)
  20. [OnLoadWebPageCache](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache)
  21. [OnManagerLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogin)
  22. [OnManagerLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout)
  23. [OnSiteRefresh](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onsiterefresh)
  24. [OnUserChangePassword](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword)
  25. [OnWebLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onweblogin)
  26. [OnWebLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout)
  27. [OnWebPagePrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageprerender)
  28. [OnManagerPageBeforeRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender)
  29. [OnTemplateVarBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave)
  30. [OnTemplateVarSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave)
  31. [OnTemplateVarBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove)
  32. [OnTemplateVarRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove)
  33. [OnBeforeEmptyTrash](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash)
  34. [OnBeforeManagerLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin)
  35. [OnBeforeManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit)
  36. [OnBeforePluginFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete)
  37. [OnBeforePluginFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave)
  38. [OnBeforeSnipFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete)
  39. [OnBeforeSnipFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave)
  40. [OnBeforeTempFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete)
  41. [OnBeforeTempFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave)
  42. [OnBeforeTVFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetvformdelete)
  43. [OnBeforeTVFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave)
  44. [OnBeforeUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate)
  45. [OnBeforeUserFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete)
  46. [OnBeforeUserFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave)
  47. [OnBeforeWebLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin)
  48. [OnCategoryBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorybeforeremove)
  49. [OnCategoryBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorybeforesave)
  50. [OnCategoryRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategoryremove)
  51. [OnCategorySave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorysave)
  52. [OnChunkBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkbeforeremove)
  53. [OnChunkBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkbeforesave)
  54. [OnChunkRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkremove)
  55. [OnChunkSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunksave)
  56. [OnContextBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextbeforeremove)
  57. [OnContextBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave)
  58. [OnContextFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformprerender)
  59. [OnContextFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformrender)
  60. [OnContextRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextremove)
  61. [OnContextSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextsave)
  62. [OnEmptyTrash](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onemptytrash)
  63. [OnFileManagerUpload](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
  64. [OnHandleRequest](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
  65. [OnInitCulture](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oninitculture)
  66. [OnLoadWebDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
  67. [OnManagerAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
  68. [OnManagerLoginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
  69. [OnManagerLoginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
  70. [OnManagerPageAfterRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
  71. [OnManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
  72. [OnPageNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
  73. [OnPageUnauthorized](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
  74. [OnParseDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onparsedocument)
  75. [OnPluginBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
  76. [OnPluginBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
  77. [OnPluginEventRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
  78. [OnPluginFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
  79. [OnPluginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
  80. [OnPluginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
  81. [OnPluginFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
  82. [OnPluginRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginremove)
  83. [OnPluginSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginsave)
  84. [OnPropertySetBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
  85. [OnPropertySetBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
  86. [OnPropertySetRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
  87. [OnPropertySetSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
  88. [OnResourceGroupBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
  89. [OnResourceGroupBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
  90. [OnResourceGroupRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
  91. [OnResourceGroupSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
  92. [OnRichTextBrowserInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
  93. [OnRichTextEditorInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
  94. [OnRichTextEditorRegister](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
  95. [OnSiteSettingsRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
  96. [OnUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuseractivate)
  97. [OnUserBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
  98. [OnUserBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
  99. [OnUserFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
  100. [OnUserFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformsave)
  101. [OnUserNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusernotfound)
  102. [OnUserRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserremove)
  103. [OnUserSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusersave)
  104. [OnWebAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
  105. [OnWebPageComplete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
  106. [OnWebPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageinit)