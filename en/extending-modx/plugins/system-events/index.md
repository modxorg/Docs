---
title: "System Events"
_old_id: "298"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/"
---

## What are System Events?

 System Events are the events in MODX that [Plugins](extending-modx/plugins "Plugins") are registered to. They are 'fired' throughout the MODX code, allowing Plugins to interact with MODX code and add custom functionality without hacking core code.

## The Model of a System Event

 The system events table is found under {table\_prefix}\_system\_eventnames, and has the following fields:

- **id** - The unique ID of the event.
- **name** - The name of the event. This is how they are referenced in code, via the [modX.invokeEvent](extending-modx/modx-class/reference/modx.invokeevent "modX.invokeEvent") method.
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

## Available Events

 This is not an exhaustive list as events are still being documented. Thank you for your patience. The TV, Template and Snippet events are still to be documented. For a complete list, please either view a Plugin in the manager and see the System Events tab, or view [here](https://github.com/modxcms/revolution/blob/develop/_build/data/transport.core.events.php). Note also that all WUsr (web-user) events have been removed.

1. [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
2. [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
3. [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
4. [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
5. [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
6. [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
7. [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
8. [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
9. [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
10. [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
11. [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
12. [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
13. [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
14. [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
15. [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
16. [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
17. [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
18. [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
19. [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
20. [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
21. [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
22. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
23. [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
24. [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
25. [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
26. [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
27. [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
28. [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
29. [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
30. [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
31. [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
32. [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
33. [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
34. [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
35. [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
36. [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
37. [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
38. [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
39. [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
40. [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
41. [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
42. [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
43. [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
44. [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
45. [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
46. [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
47. [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
48. [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
49. [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
50. [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
51. [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
52. [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
53. [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
54. [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
55. [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
56. [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
57. [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
58. [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
59. [OnFileManagerMoveObject](extending-modx/plugins/system-events/onfilemanagermoveobject)
60. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
61. [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
62. [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
63. [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
64. [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
65. [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
66. [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
67. [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
68. [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
69. [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
70. [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
71. [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
72. [OnMODXInit](extending-modx/plugins/system-events/onmodxinit)
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
89. [OnResourceAutoPublish](extending-modx/plugins/system-events/onresourceautopublish)
90. [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
91. [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
92. [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
93. [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
94. [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
95. [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
96. [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
97. [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
98. [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
99. [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
100. [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
101. [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
102. [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
103. [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
104. [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
105. [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
106. [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
107. [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
108. [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
109. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
110. [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
111. [OnUserSave](extending-modx/plugins/system-events/onusersave)
112. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
113. [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
114. [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
115. [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
116. [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
117. [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)

## Custom Events

 You can create your own custom events, but there is currently no GUI available for this; instead you must use the API. Events have the following attributes:

- **name** - the unique event name.
- **service** - loose attempt to group events for particular areas. 1,2,4,5,6 are loaded inside the manager, whereas 1,3,4,5,6 are loaded outside the manager. (see getEventMap())
- **groupname** - Used for visually grouping the events in the MODX manager (visible as a Plugin tab).

 Creating an event using the MODX API would look something like this:

 ``` php
$Event = $modx->newObject('modEvent');
$Event->set('name', 'OnMyCustomEvent');
$Event->set('service',1);
$Event->set('groupname', 'Custom');
```

 Then your code could trigger that event by name:

 ``` php
$modx->invokeEvent('OnMyCustomEvent', $options);
```

 Finally, a plugin could be set to listen for that event. In this case, it can receive options passed to it.

 ``` php
//... TODO...
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
64. [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
65. [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
66. [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
67. [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
68. [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
69. [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
70. [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
71. [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
72. [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
73. [OnFileManagerMoveObject](extending-modx/plugins/system-events/onfilemanagermoveobject)
74. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
75. [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
76. [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
77. [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
78. [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
79. [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
80. [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
81. [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
82. [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
83. [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
84. [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
85. [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
86. [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
87. [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
88. [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
89. [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
90. [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
91. [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
92. [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
93. [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
94. [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
95. [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
96. [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
97. [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
98. [OnResourceAutoPublish](extending-modx/plugins/system-events/onresourceautopublish)
99. [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
100. [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
101. [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
102. [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
103. [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
104. [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
105. [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
106. [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
107. [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
108. [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
109. [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
110. [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
111. [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
112. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
113. [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
114. [OnUserSave](extending-modx/plugins/system-events/onusersave)
115. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
116. [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
117. [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
