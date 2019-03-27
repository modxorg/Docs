---
title: "Writing Plugins"
_old_id: "242"
_old_uri: "2.x/developing-in-modx/basic-development/plugins"
---

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

1. [System Events](extending-modx/plugins/system-events)
2. [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
3. [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
4. [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
5. [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
6. [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
7. [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
8. [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
9. [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
10. [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
11. [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
12. [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
13. [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
14. [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
15. [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
16. [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
17. [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
18. [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
19. [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
20. [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
21. [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
22. [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
23. [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
24. [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
25. [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
26. [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
27. [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
28. [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
29. [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
30. [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
31. [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
32. [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
33. [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
34. [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
35. [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
36. [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
37. [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
38. [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
39. [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
40. [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
41. [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
42. [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
43. [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
44. [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
45. [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
46. [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
47. [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
48. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
49. [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
50. [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
51. [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
52. [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
53. [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
54. [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
55. [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
56. [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
57. [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
58. [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
59. [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
60. [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
61. [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
62. [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
63. [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
64. [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
65. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
66. [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
67. [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
68. [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
69. [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
70. [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
71. [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
72. [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
73. [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
74. [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
75. [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
76. [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
77. [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
78. [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
79. [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
80. [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
81. [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
82. [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
83. [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
84. [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
85. [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
86. [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
87. [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
88. [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
89. [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
90. [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
91. [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
92. [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
93. [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
94. [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
95. [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
96. [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
97. [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
98. [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
99. [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
100. [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
101. [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
102. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
103. [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
104. [OnUserSave](extending-modx/plugins/system-events/onusersave)
105. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
106. [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
107. [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
