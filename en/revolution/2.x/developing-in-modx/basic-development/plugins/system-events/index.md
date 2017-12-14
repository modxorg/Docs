---
title: "System Events"
_old_id: "298"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/"
---

<div>- [What are System Events?](#SystemEvents-WhatareSystemEvents%3F)
- [The Model of a System Event](#SystemEvents-TheModelofaSystemEvent)
  - [Service Types](#SystemEvents-ServiceTypes)
- [Available Events](#SystemEvents-AvailableEvents)
- [Custom Events](#custom_events)
- [See Also](#SystemEvents-SeeAlso)
 
</div>What are System Events?
-----------------------

 System Events are the events in MODx that [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins") are registered to. They are 'fired' throughout the MODx code, allowing Plugins to interact with MODx code and add custom functionality without hacking core code.

The Model of a System Event
---------------------------

 The system events table is found under {table\_prefix}\_system\_eventnames, and has the following fields:

- **id** - The unique ID of the event.
- **name** - The name of the event. This is how they are referenced in code, via the [modX.invokeEvent](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.invokeevent "modX.invokeEvent") method.
- **service** - What type of system event this event is.
- **groupname** - Used for user interfaces, primarily for filtering, grouping and sorting of events. Not used explicitly in the modx model.

### Service Types

 The 'service' field in the System event is a number; the numbers reference different types of System Events. They are:

- 1 - Parser Service Events
- 2 - Manager Access Events
- 3 - Web Access Service Events
- 4 - Cache Service Events
- 5 - Template Service Events
- 6 - User Defined Events

 3 is not fired in the 'mgr' context; 2 is not fired in any context but 'mgr'.

Available Events
----------------

<div class="note"> This is not an exhaustive list as events are still being documented. Thank you for your patience. The TV, Template and Snippet events are still to be documented. For a complete list, please either view a Plugin in the manager and see the System Events tab, or view [here](https://github.com/modxcms/revolution/blob/develop/_build/data/transport.core.events.php). Note also that all WUsr (web-user) events have been removed. </div>1. [OnBeforeCacheUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate)
2. [OnBeforeChunkFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete)
3. [OnBeforeChunkFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave)
4. [OnBeforeDocFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete)
5. [OnBeforeDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave)
6. [OnBeforeEmptyTrash](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash)
7. [OnBeforeManagerLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin)
8. [OnBeforeManagerLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout)
9. [OnBeforeManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit)
10. [OnBeforePluginFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete)
11. [OnBeforePluginFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave)
12. [OnBeforeSaveWebPageCache](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache)
13. [OnBeforeSnipFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete)
14. [OnBeforeSnipFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave)
15. [OnBeforeTempFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete)
16. [OnBeforeTempFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave)
17. [OnBeforeTVFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetvformdelete)
18. [OnBeforeTVFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave)
19. [OnBeforeUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate)
20. [OnBeforeUserFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete)
21. [OnBeforeUserFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave)
22. [OnBeforeWebLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin)
23. [OnBeforeWebLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout)
24. [OnCacheUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncacheupdate)
25. [OnCategoryBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorybeforeremove)
26. [OnCategoryBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorybeforesave)
27. [OnCategoryRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategoryremove)
28. [OnCategorySave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncategorysave)
29. [OnChunkBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkbeforeremove)
30. [OnChunkBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkbeforesave)
31. [OnChunkFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformdelete)
32. [OnChunkFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformprerender)
33. [OnChunkFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformrender)
34. [OnChunkFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformsave)
35. [OnChunkRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunkremove)
36. [OnChunkSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onchunksave)
37. [OnContextBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextbeforeremove)
38. [OnContextBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave)
39. [OnContextFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformprerender)
40. [OnContextFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformrender)
41. [OnContextRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextremove)
42. [OnContextSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oncontextsave)
43. [OnDocFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformdelete)
44. [OnDocFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformprerender)
45. [OnDocFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformrender)
46. [OnDocFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocformsave)
47. [OnDocPublished](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocpublished)
48. [OnDocUnPublished](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ondocunpublished)
49. [OnEmptyTrash](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onemptytrash)
50. [OnFileManagerBeforeUpload](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload)
51. [OnFileManagerUpload](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
52. [OnFileManagerDirCreate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdircreate)
53. [OnFileManagerDirRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirremove)
54. [OnFileManagerDirRename](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirrename)
55. [OnFileManagerFileCreate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilecreate)
56. [OnFileManagerFileRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileremove)
57. [OnFileManagerFileRename](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilerename)
58. [OnFileManagerFileUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileupdate)
59. [OnFileManagerMoveObject](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagermoveobject)
60. [OnHandleRequest](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
61. [OnInitCulture](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oninitculture)
62. [OnLoadWebDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
63. [OnLoadWebPageCache](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache)
64. [OnManagerAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
65. [OnManagerLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogin)
66. [OnManagerLoginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
67. [OnManagerLoginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
68. [OnManagerLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout)
69. [OnManagerPageAfterRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
70. [OnManagerPageBeforeRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender)
71. [OnManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
72. [OnMODXInit](http://rtfm.modx.com/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmodxinit)
73. [OnPageNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
74. [OnPageUnauthorized](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
75. [OnParseDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onparsedocument)
76. [OnPluginBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
77. [OnPluginBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
78. [OnPluginEventRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
79. [OnPluginFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
80. [OnPluginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
81. [OnPluginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
82. [OnPluginFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
83. [OnPluginRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginremove)
84. [OnPluginSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginsave)
85. [OnPropertySetBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
86. [OnPropertySetBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
87. [OnPropertySetRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
88. [OnPropertySetSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
89. [OnResourceAutoPublish](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourceautopublish)
90. [OnResourceGroupBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
91. [OnResourceGroupBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
92. [OnResourceGroupRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
93. [OnResourceGroupSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
94. [OnRichTextBrowserInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
95. [OnRichTextEditorInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
96. [OnRichTextEditorRegister](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
97. [OnSiteRefresh](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onsiterefresh)
98. [OnSiteSettingsRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
99. [OnTemplateVarBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove)
100. [OnTemplateVarBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave)
101. [OnTemplateVarRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove)
102. [OnTemplateVarSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave)
103. [OnUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuseractivate)
104. [OnUserBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
105. [OnUserBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
106. [OnUserChangePassword](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword)
107. [OnUserFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
108. [OnUserFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformsave)
109. [OnUserNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusernotfound)
110. [OnUserRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserremove)
111. [OnUserSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusersave)
112. [OnWebAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
113. [OnWebLogin](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onweblogin)
114. [OnWebLogout](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout)
115. [OnWebPageComplete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
116. [OnWebPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageinit)
117. [OnWebPagePrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageprerender)

Custom Events
-------------

 You can create your own custom events, but there is currently no GUI available for this; instead you must use the API. Events have the following attributes:

- **name** - the unique event name.
- **service** - loose attempt to group events for particular areas. 1,2,4,5,6 are loaded inside the manager, whereas 1,3,4,5,6 are loaded outside the manager. (see getEventMap())
- **groupname** - Used for visually grouping the events in the MODX manager (visible as a Plugin tab).

 Creating an event using the MODX API would look something like this:

 ```
<pre class="brush: php">
$Event = $modx->newObject('modEvent');
$Event->set('name', 'OnMyCustomEvent');
$Event->set('service',1); 
$Event->set('groupname', 'Custom');

``` Then your code could trigger that event by name:

 ```
<pre class="brush: php">
$modx->invokeEvent('OnMyCustomEvent', $options);

``` Finally, a plugin could be set to listen for that event. In this case, it can receive options passed to it.

 ```
<pre class="brush: php">
//... TODO...

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
  63. [OnFileManagerBeforeUpload](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload)
  64. [OnFileManagerUpload](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
  65. [OnFileManagerDirCreate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdircreate)
  66. [OnFileManagerDirRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirremove)
  67. [OnFileManagerDirRename](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirrename)
  68. [OnFileManagerFileCreate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilecreate)
  69. [OnFileManagerFileRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileremove)
  70. [OnFileManagerFileRename](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilerename)
  71. [OnFileManagerFileUpdate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileupdate)
  72. [OnFileManagerMoveObject](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagermoveobject)
  73. [OnHandleRequest](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
  74. [OnInitCulture](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/oninitculture)
  75. [OnLoadWebDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
  76. [OnManagerAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
  77. [OnManagerLoginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
  78. [OnManagerLoginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
  79. [OnManagerPageAfterRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
  80. [OnManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
  81. [OnPageNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
  82. [OnPageUnauthorized](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
  83. [OnParseDocument](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onparsedocument)
  84. [OnPluginBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
  85. [OnPluginBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
  86. [OnPluginEventRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
  87. [OnPluginFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
  88. [OnPluginFormPrerender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
  89. [OnPluginFormRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
  90. [OnPluginFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
  91. [OnPluginRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginremove)
  92. [OnPluginSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpluginsave)
  93. [OnPropertySetBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
  94. [OnPropertySetBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
  95. [OnPropertySetRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
  96. [OnPropertySetSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
  97. [OnResourceAutoPublish](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourceautopublish)
  98. [OnResourceGroupBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
  99. [OnResourceGroupBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
  100. [OnResourceGroupRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
  101. [OnResourceGroupSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
  102. [OnRichTextBrowserInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
  103. [OnRichTextEditorInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
  104. [OnRichTextEditorRegister](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
  105. [OnSiteSettingsRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
  106. [OnUserActivate](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuseractivate)
  107. [OnUserBeforeRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
  108. [OnUserBeforeSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
  109. [OnUserFormDelete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
  110. [OnUserFormSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserformsave)
  111. [OnUserNotFound](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusernotfound)
  112. [OnUserRemove](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onuserremove)
  113. [OnUserSave](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onusersave)
  114. [OnWebAuthentication](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
  115. [OnWebPageComplete](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
  116. [OnWebPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageinit)