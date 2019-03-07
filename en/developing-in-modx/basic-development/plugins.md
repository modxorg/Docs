---
title: "Plugins"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

- [What is a Plugin?](#what-is-a-plugin)
- [The Event Model](#the-event-model)
- [Handling an Event](#handling-an-event)
- [Plugin Examples](#plugin-examples)
  - [Message the User:](#message-the-user)
  - [Custom Validation](#custom-validation)
  - [Word Filter](#word-filter)
  - [Page-Not-Found Redirector:](#page-not-found-redirector)
- [See Also](#see-also)



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

### Message the User:

**Description:** Send a custom message to the user as they create/edit a page... a custom header. 
**System Events:** OnDocFormPrerender

``` php 
$modx->event->output('Hi there user!');
```

- - - - - -

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


- - - - - -

### Word Filter

**Description:** Filter words from a document before it's displayed on the web 
**System Events:** OnWebPagePrerender

``` php 
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

- - - - - -

### Page-Not-Found Redirector:

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

1. [System Events](developing-in-modx/basic-development/plugins/system-events)
2. [OnBeforeCacheUpdate](developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate)
3. [OnBeforeChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete)
4. [OnBeforeChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave)
5. [OnBeforeDocFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete)
6. [OnBeforeDocFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave)
7. [OnBeforeManagerLogout](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout)
8. [OnBeforeSaveWebPageCache](developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache)
9. [OnBeforeWebLogout](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout)
10. [OnCacheUpdate](developing-in-modx/basic-development/plugins/system-events/oncacheupdate)
11. [OnChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onchunkformdelete)
12. [OnChunkFormPrerender](developing-in-modx/basic-development/plugins/system-events/onchunkformprerender)
13. [OnChunkFormRender](developing-in-modx/basic-development/plugins/system-events/onchunkformrender)
14. [OnChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onchunkformsave)
15. [OnDocFormDelete](developing-in-modx/basic-development/plugins/system-events/ondocformdelete)
16. [OnDocFormPrerender](developing-in-modx/basic-development/plugins/system-events/ondocformprerender)
17. [OnDocFormRender](developing-in-modx/basic-development/plugins/system-events/ondocformrender)
18. [OnDocFormSave](developing-in-modx/basic-development/plugins/system-events/ondocformsave)
19. [OnDocPublished](developing-in-modx/basic-development/plugins/system-events/ondocpublished)
20. [OnDocUnPublished](developing-in-modx/basic-development/plugins/system-events/ondocunpublished)
21. [OnLoadWebPageCache](developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache)
22. [OnManagerLogin](developing-in-modx/basic-development/plugins/system-events/onmanagerlogin)
23. [OnManagerLogout](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout)
24. [OnSiteRefresh](developing-in-modx/basic-development/plugins/system-events/onsiterefresh)
25. [OnUserChangePassword](developing-in-modx/basic-development/plugins/system-events/onuserchangepassword)
26. [OnWebLogin](developing-in-modx/basic-development/plugins/system-events/onweblogin)
27. [OnWebLogout](developing-in-modx/basic-development/plugins/system-events/onweblogout)
28. [OnWebPagePrerender](developing-in-modx/basic-development/plugins/system-events/onwebpageprerender)
29. [OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender)
30. [OnTemplateVarBeforeSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave)
31. [OnTemplateVarSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave)
32. [OnTemplateVarBeforeRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove)
33. [OnTemplateVarRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove)
34. [OnBeforeEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash)
35. [OnBeforeManagerLogin](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin)
36. [OnBeforeManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit)
37. [OnBeforePluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete)
38. [OnBeforePluginFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave)
39. [OnBeforeSnipFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete)
40. [OnBeforeSnipFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave)
41. [OnBeforeTempFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete)
42. [OnBeforeTempFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave)
43. [OnBeforeTVFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetvformdelete)
44. [OnBeforeTVFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave)
45. [OnBeforeUserActivate](developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate)
46. [OnBeforeUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete)
47. [OnBeforeUserFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave)
48. [OnBeforeWebLogin](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin)
49. [OnCategoryBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncategorybeforeremove)
50. [OnCategoryBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncategorybeforesave)
51. [OnCategoryRemove](developing-in-modx/basic-development/plugins/system-events/oncategoryremove)
52. [OnCategorySave](developing-in-modx/basic-development/plugins/system-events/oncategorysave)
53. [OnChunkBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onchunkbeforeremove)
54. [OnChunkBeforeSave](developing-in-modx/basic-development/plugins/system-events/onchunkbeforesave)
55. [OnChunkRemove](developing-in-modx/basic-development/plugins/system-events/onchunkremove)
56. [OnChunkSave](developing-in-modx/basic-development/plugins/system-events/onchunksave)
57. [OnContextBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncontextbeforeremove)
58. [OnContextBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave)
59. [OnContextFormPrerender](developing-in-modx/basic-development/plugins/system-events/oncontextformprerender)
60. [OnContextFormRender](developing-in-modx/basic-development/plugins/system-events/oncontextformrender)
61. [OnContextRemove](developing-in-modx/basic-development/plugins/system-events/oncontextremove)
62. [OnContextSave](developing-in-modx/basic-development/plugins/system-events/oncontextsave)
63. [OnEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onemptytrash)
64. [OnFileManagerUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
65. [OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
66. [OnInitCulture](developing-in-modx/basic-development/plugins/system-events/oninitculture)
67. [OnLoadWebDocument](developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
68. [OnManagerAuthentication](developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
69. [OnManagerLoginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
70. [OnManagerLoginFormRender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
71. [OnManagerPageAfterRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
72. [OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
73. [OnPageNotFound](developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
74. [OnPageUnauthorized](developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
75. [OnParseDocument](developing-in-modx/basic-development/plugins/system-events/onparsedocument)
76. [OnPluginBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
77. [OnPluginBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
78. [OnPluginEventRemove](developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
79. [OnPluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
80. [OnPluginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
81. [OnPluginFormRender](developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
82. [OnPluginFormSave](developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
83. [OnPluginRemove](developing-in-modx/basic-development/plugins/system-events/onpluginremove)
84. [OnPluginSave](developing-in-modx/basic-development/plugins/system-events/onpluginsave)
85. [OnPropertySetBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
86. [OnPropertySetBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
87. [OnPropertySetRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
88. [OnPropertySetSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
89. [OnResourceGroupBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
90. [OnResourceGroupBeforeSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
91. [OnResourceGroupRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
92. [OnResourceGroupSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
93. [OnRichTextBrowserInit](developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
94. [OnRichTextEditorInit](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
95. [OnRichTextEditorRegister](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
96. [OnSiteSettingsRender](developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
97. [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate)
98. [OnUserBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
99. [OnUserBeforeSave](developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
100. [OnUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
101. [OnUserFormSave](developing-in-modx/basic-development/plugins/system-events/onuserformsave)
102. [OnUserNotFound](developing-in-modx/basic-development/plugins/system-events/onusernotfound)
103. [OnUserRemove](developing-in-modx/basic-development/plugins/system-events/onuserremove)
104. [OnUserSave](developing-in-modx/basic-development/plugins/system-events/onusersave)
105. [OnWebAuthentication](developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
106. [OnWebPageComplete](developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
107. [OnWebPageInit](developing-in-modx/basic-development/plugins/system-events/onwebpageinit)