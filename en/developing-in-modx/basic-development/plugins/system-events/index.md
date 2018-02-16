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

 System Events are the events in MODx that [Plugins](developing-in-modx/basic-development/plugins "Plugins") are registered to. They are 'fired' throughout the MODx code, allowing Plugins to interact with MODx code and add custom functionality without hacking core code.

The Model of a System Event
---------------------------

 The system events table is found under {table\_prefix}\_system\_eventnames, and has the following fields:

- **id** - The unique ID of the event.
- **name** - The name of the event. This is how they are referenced in code, via the [modX.invokeEvent](developing-in-modx/other-development-resources/class-reference/modx/modx.invokeevent "modX.invokeEvent") method.
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

<div class="note"> This is not an exhaustive list as events are still being documented. Thank you for your patience. The TV, Template and Snippet events are still to be documented. For a complete list, please either view a Plugin in the manager and see the System Events tab, or view [here](https://github.com/modxcms/revolution/blob/develop/_build/data/transport.core.events.php). Note also that all WUsr (web-user) events have been removed. </div>1. [OnBeforeCacheUpdate](developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate)
2. [OnBeforeChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete)
3. [OnBeforeChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave)
4. [OnBeforeDocFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete)
5. [OnBeforeDocFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforedocformsave)
6. [OnBeforeEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash)
7. [OnBeforeManagerLogin](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin)
8. [OnBeforeManagerLogout](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout)
9. [OnBeforeManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit)
10. [OnBeforePluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete)
11. [OnBeforePluginFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave)
12. [OnBeforeSaveWebPageCache](developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache)
13. [OnBeforeSnipFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformdelete)
14. [OnBeforeSnipFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforesnipformsave)
15. [OnBeforeTempFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete)
16. [OnBeforeTempFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave)
17. [OnBeforeTVFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforetvformdelete)
18. [OnBeforeTVFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave)
19. [OnBeforeUserActivate](developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate)
20. [OnBeforeUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete)
21. [OnBeforeUserFormSave](developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave)
22. [OnBeforeWebLogin](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin)
23. [OnBeforeWebLogout](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout)
24. [OnCacheUpdate](developing-in-modx/basic-development/plugins/system-events/oncacheupdate)
25. [OnCategoryBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncategorybeforeremove)
26. [OnCategoryBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncategorybeforesave)
27. [OnCategoryRemove](developing-in-modx/basic-development/plugins/system-events/oncategoryremove)
28. [OnCategorySave](developing-in-modx/basic-development/plugins/system-events/oncategorysave)
29. [OnChunkBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onchunkbeforeremove)
30. [OnChunkBeforeSave](developing-in-modx/basic-development/plugins/system-events/onchunkbeforesave)
31. [OnChunkFormDelete](developing-in-modx/basic-development/plugins/system-events/onchunkformdelete)
32. [OnChunkFormPrerender](developing-in-modx/basic-development/plugins/system-events/onchunkformprerender)
33. [OnChunkFormRender](developing-in-modx/basic-development/plugins/system-events/onchunkformrender)
34. [OnChunkFormSave](developing-in-modx/basic-development/plugins/system-events/onchunkformsave)
35. [OnChunkRemove](developing-in-modx/basic-development/plugins/system-events/onchunkremove)
36. [OnChunkSave](developing-in-modx/basic-development/plugins/system-events/onchunksave)
37. [OnContextBeforeRemove](developing-in-modx/basic-development/plugins/system-events/oncontextbeforeremove)
38. [OnContextBeforeSave](developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave)
39. [OnContextFormPrerender](developing-in-modx/basic-development/plugins/system-events/oncontextformprerender)
40. [OnContextFormRender](developing-in-modx/basic-development/plugins/system-events/oncontextformrender)
41. [OnContextRemove](developing-in-modx/basic-development/plugins/system-events/oncontextremove)
42. [OnContextSave](developing-in-modx/basic-development/plugins/system-events/oncontextsave)
43. [OnDocFormDelete](developing-in-modx/basic-development/plugins/system-events/ondocformdelete)
44. [OnDocFormPrerender](developing-in-modx/basic-development/plugins/system-events/ondocformprerender)
45. [OnDocFormRender](developing-in-modx/basic-development/plugins/system-events/ondocformrender)
46. [OnDocFormSave](developing-in-modx/basic-development/plugins/system-events/ondocformsave)
47. [OnDocPublished](developing-in-modx/basic-development/plugins/system-events/ondocpublished)
48. [OnDocUnPublished](developing-in-modx/basic-development/plugins/system-events/ondocunpublished)
49. [OnEmptyTrash](developing-in-modx/basic-development/plugins/system-events/onemptytrash)
50. [OnFileManagerBeforeUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload)
51. [OnFileManagerUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
52. [OnFileManagerDirCreate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdircreate)
53. [OnFileManagerDirRemove](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirremove)
54. [OnFileManagerDirRename](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirrename)
55. [OnFileManagerFileCreate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilecreate)
56. [OnFileManagerFileRemove](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileremove)
57. [OnFileManagerFileRename](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilerename)
58. [OnFileManagerFileUpdate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileupdate)
59. [OnFileManagerMoveObject](developing-in-modx/basic-development/plugins/system-events/onfilemanagermoveobject)
60. [OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
61. [OnInitCulture](developing-in-modx/basic-development/plugins/system-events/oninitculture)
62. [OnLoadWebDocument](developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
63. [OnLoadWebPageCache](developing-in-modx/basic-development/plugins/system-events/onloadwebpagecache)
64. [OnManagerAuthentication](developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
65. [OnManagerLogin](developing-in-modx/basic-development/plugins/system-events/onmanagerlogin)
66. [OnManagerLoginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
67. [OnManagerLoginFormRender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
68. [OnManagerLogout](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout)
69. [OnManagerPageAfterRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
70. [OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender)
71. [OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
72. [OnMODXInit](http://rtfm.modx.com/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmodxinit)
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
89. [OnResourceAutoPublish](developing-in-modx/basic-development/plugins/system-events/onresourceautopublish)
90. [OnResourceGroupBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
91. [OnResourceGroupBeforeSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
92. [OnResourceGroupRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
93. [OnResourceGroupSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
94. [OnRichTextBrowserInit](developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
95. [OnRichTextEditorInit](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
96. [OnRichTextEditorRegister](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
97. [OnSiteRefresh](developing-in-modx/basic-development/plugins/system-events/onsiterefresh)
98. [OnSiteSettingsRender](developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
99. [OnTemplateVarBeforeRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove)
100. [OnTemplateVarBeforeSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave)
101. [OnTemplateVarRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove)
102. [OnTemplateVarSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave)
103. [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate)
104. [OnUserBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
105. [OnUserBeforeSave](developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
106. [OnUserChangePassword](developing-in-modx/basic-development/plugins/system-events/onuserchangepassword)
107. [OnUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
108. [OnUserFormSave](developing-in-modx/basic-development/plugins/system-events/onuserformsave)
109. [OnUserNotFound](developing-in-modx/basic-development/plugins/system-events/onusernotfound)
110. [OnUserRemove](developing-in-modx/basic-development/plugins/system-events/onuserremove)
111. [OnUserSave](developing-in-modx/basic-development/plugins/system-events/onusersave)
112. [OnWebAuthentication](developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
113. [OnWebLogin](developing-in-modx/basic-development/plugins/system-events/onweblogin)
114. [OnWebLogout](developing-in-modx/basic-development/plugins/system-events/onweblogout)
115. [OnWebPageComplete](developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
116. [OnWebPageInit](developing-in-modx/basic-development/plugins/system-events/onwebpageinit)
117. [OnWebPagePrerender](developing-in-modx/basic-development/plugins/system-events/onwebpageprerender)

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
  63. [OnFileManagerBeforeUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload)
  64. [OnFileManagerUpload](developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload)
  65. [OnFileManagerDirCreate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdircreate)
  66. [OnFileManagerDirRemove](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirremove)
  67. [OnFileManagerDirRename](developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirrename)
  68. [OnFileManagerFileCreate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilecreate)
  69. [OnFileManagerFileRemove](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileremove)
  70. [OnFileManagerFileRename](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilerename)
  71. [OnFileManagerFileUpdate](developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileupdate)
  72. [OnFileManagerMoveObject](developing-in-modx/basic-development/plugins/system-events/onfilemanagermoveobject)
  73. [OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest)
  74. [OnInitCulture](developing-in-modx/basic-development/plugins/system-events/oninitculture)
  75. [OnLoadWebDocument](developing-in-modx/basic-development/plugins/system-events/onloadwebdocument)
  76. [OnManagerAuthentication](developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication)
  77. [OnManagerLoginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformprerender)
  78. [OnManagerLoginFormRender](developing-in-modx/basic-development/plugins/system-events/onmanagerloginformrender)
  79. [OnManagerPageAfterRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender)
  80. [OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit)
  81. [OnPageNotFound](developing-in-modx/basic-development/plugins/system-events/onpagenotfound)
  82. [OnPageUnauthorized](developing-in-modx/basic-development/plugins/system-events/onpageunauthorized)
  83. [OnParseDocument](developing-in-modx/basic-development/plugins/system-events/onparsedocument)
  84. [OnPluginBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpluginbeforeremove)
  85. [OnPluginBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave)
  86. [OnPluginEventRemove](developing-in-modx/basic-development/plugins/system-events/onplugineventremove)
  87. [OnPluginFormDelete](developing-in-modx/basic-development/plugins/system-events/onpluginformdelete)
  88. [OnPluginFormPrerender](developing-in-modx/basic-development/plugins/system-events/onpluginformprerender)
  89. [OnPluginFormRender](developing-in-modx/basic-development/plugins/system-events/onpluginformrender)
  90. [OnPluginFormSave](developing-in-modx/basic-development/plugins/system-events/onpluginformsave)
  91. [OnPluginRemove](developing-in-modx/basic-development/plugins/system-events/onpluginremove)
  92. [OnPluginSave](developing-in-modx/basic-development/plugins/system-events/onpluginsave)
  93. [OnPropertySetBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforeremove)
  94. [OnPropertySetBeforeSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave)
  95. [OnPropertySetRemove](developing-in-modx/basic-development/plugins/system-events/onpropertysetremove)
  96. [OnPropertySetSave](developing-in-modx/basic-development/plugins/system-events/onpropertysetsave)
  97. [OnResourceAutoPublish](developing-in-modx/basic-development/plugins/system-events/onresourceautopublish)
  98. [OnResourceGroupBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove)
  99. [OnResourceGroupBeforeSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave)
  100. [OnResourceGroupRemove](developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove)
  101. [OnResourceGroupSave](developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave)
  102. [OnRichTextBrowserInit](developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit)
  103. [OnRichTextEditorInit](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit)
  104. [OnRichTextEditorRegister](developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister)
  105. [OnSiteSettingsRender](developing-in-modx/basic-development/plugins/system-events/onsitesettingsrender)
  106. [OnUserActivate](developing-in-modx/basic-development/plugins/system-events/onuseractivate)
  107. [OnUserBeforeRemove](developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove)
  108. [OnUserBeforeSave](developing-in-modx/basic-development/plugins/system-events/onuserbeforesave)
  109. [OnUserFormDelete](developing-in-modx/basic-development/plugins/system-events/onuserformdelete)
  110. [OnUserFormSave](developing-in-modx/basic-development/plugins/system-events/onuserformsave)
  111. [OnUserNotFound](developing-in-modx/basic-development/plugins/system-events/onusernotfound)
  112. [OnUserRemove](developing-in-modx/basic-development/plugins/system-events/onuserremove)
  113. [OnUserSave](developing-in-modx/basic-development/plugins/system-events/onusersave)
  114. [OnWebAuthentication](developing-in-modx/basic-development/plugins/system-events/onwebauthentication)
  115. [OnWebPageComplete](developing-in-modx/basic-development/plugins/system-events/onwebpagecomplete)
  116. [OnWebPageInit](developing-in-modx/basic-development/plugins/system-events/onwebpageinit)