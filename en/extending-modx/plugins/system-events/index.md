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
