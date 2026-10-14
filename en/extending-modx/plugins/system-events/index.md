---
title: "System Events"
description: "Events fired throughout the MODX code that Plugins subscribe to in order to add custom functionality without editing the core"
---

## What are System Events?

System Events are points in the MODX code where [Plugins](extending-modx/plugins "Plugins") run. MODX fires them throughout its code, so a Plugin can hook into any step without editing the core.

## The Model of a System Event

The system events table is `{table_prefix}_system_eventnames` with these fields:

| Field     | Description                                                                                                                     |
| --------- | ------------------------------------------------------------------------------------------------------------------------------- |
| id        | Unique ID of the event.                                                                                                         |
| name      | Event name, referenced in code via [modX.invokeEvent](extending-modx/modx-class/reference/modx.invokeevent "modX.invokeEvent"). |
| service   | Type of system event.                                                                                                           |
| groupname | Used by user interfaces to filter, group, and sort events. The MODX model does not use it.                                      |

### Service Types

The `service` field holds a number that identifies the type of event:

| Value | Service                   |
| ----- | ------------------------- |
| 1     | Parser Service Events     |
| 2     | Manager Access Events     |
| 3     | Web Access Service Events |
| 4     | Cache Service Events      |
| 5     | Template Service Events   |
| 6     | User Defined Events       |

Service 3 does not fire in the `mgr` Context; Service 2 fires only there.

## Available Events

The events below are grouped by the `groupname` shown in the Manager's event list. For the full list of registered events, see [transport.core.events.php](https://github.com/modxcms/revolution/blob/3.x/_build/data/transport.core.events.php).

### Categories

- [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
- [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
- [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
- [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)

### Chunks

- [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
- [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
- [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
- [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
- [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)

### Contexts

- [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
- [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
- [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
- [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
- [OnContextInit](extending-modx/plugins/system-events/oncontextinit)
- [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
- [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
- [OnContextUpdate](extending-modx/plugins/system-events/oncontextupdate)

### Internationalization

- [OnInitCulture](extending-modx/plugins/system-events/oninitculture)

### Media Sources

- [OnMediaSourceBeforeFormDelete](extending-modx/plugins/system-events/onmediasourcebeforeformdelete)
- [OnMediaSourceBeforeFormSave](extending-modx/plugins/system-events/onmediasourcebeforeformsave)
- [OnMediaSourceDuplicate](extending-modx/plugins/system-events/onmediasourceduplicate)
- [OnMediaSourceFormDelete](extending-modx/plugins/system-events/onmediasourceformdelete)
- [OnMediaSourceFormSave](extending-modx/plugins/system-events/onmediasourceformsave)
- [OnMediaSourceGetProperties](extending-modx/plugins/system-events/onmediasourcegetproperties)

### Package Manager

- [OnPackageInstall](extending-modx/plugins/system-events/onpackageinstall)
- [OnPackageRemove](extending-modx/plugins/system-events/onpackageremove)
- [OnPackageUninstall](extending-modx/plugins/system-events/onpackageuninstall)

### Plugin Events

- [OnPluginEventBeforeRemove](extending-modx/plugins/system-events/onplugineventbeforeremove)
- [OnPluginEventBeforeSave](extending-modx/plugins/system-events/onplugineventbeforesave)
- [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
- [OnPluginEventSave](extending-modx/plugins/system-events/onplugineventsave)

### Plugins

- [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
- [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
- [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
- [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
- [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
- [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
- [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
- [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
- [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
- [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)

### Property Sets

- [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
- [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
- [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
- [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)

### Resources

- [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
- [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
- [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
- [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
- [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
- [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
- [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
- [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
- [OnResourceAddToResourceGroup](extending-modx/plugins/system-events/onresourceaddtoresourcegroup)
- [OnResourceAutoPublish](extending-modx/plugins/system-events/onresourceautopublish)
- [OnResourceBeforeSort](extending-modx/plugins/system-events/onresourcebeforesort)
- [OnResourceCacheUpdate](extending-modx/plugins/system-events/onresourcecacheupdate)
- [OnResourceDelete](extending-modx/plugins/system-events/onresourcedelete)
- [OnResourceDuplicate](extending-modx/plugins/system-events/onresourceduplicate)
- [OnResourceRemoveFromResourceGroup](extending-modx/plugins/system-events/onresourceremovefromresourcegroup)
- [OnResourceSort](extending-modx/plugins/system-events/onresourcesort)
- [OnResourceTVFormPrerender](extending-modx/plugins/system-events/onresourcetvformprerender)
- [OnResourceTVFormRender](extending-modx/plugins/system-events/onresourcetvformrender)
- [OnResourceToolbarLoad](extending-modx/plugins/system-events/onresourcetoolbarload)
- [OnResourceUndelete](extending-modx/plugins/system-events/onresourceundelete)

### RichText Editor

- [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
- [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
- [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)

### Security

- [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onbeforeresourcegroupremove)
- [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
- [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
- [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
- [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
- [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
- [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
- [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
- [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [OnWebLogout](extending-modx/plugins/system-events/onweblogout)

### Settings

- [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)

### Snippets

- [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
- [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
- [OnSnipFormDelete](extending-modx/plugins/system-events/onsnipformdelete)
- [OnSnipFormPrerender](extending-modx/plugins/system-events/onsnipformprerender)
- [OnSnipFormRender](extending-modx/plugins/system-events/onsnipformrender)
- [OnSnipFormSave](extending-modx/plugins/system-events/onsnipformsave)
- [OnSnippetBeforeRemove](extending-modx/plugins/system-events/onsnippetbeforeremove)
- [OnSnippetBeforeSave](extending-modx/plugins/system-events/onsnippetbeforesave)
- [OnSnippetRemove](extending-modx/plugins/system-events/onsnippetremove)
- [OnSnippetSave](extending-modx/plugins/system-events/onsnippetsave)

### System

- [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
- [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
- [OnBeforeRegisterClientScripts](extending-modx/plugins/system-events/onbeforeregisterclientscripts)
- [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
- [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
- [OnElementNotFound](extending-modx/plugins/system-events/onelementnotfound)
- [OnFileCreateFormPrerender](extending-modx/plugins/system-events/onfilecreateformprerender)
- [OnFileEditFormPrerender](extending-modx/plugins/system-events/onfileeditformprerender)
- [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
- [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
- [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
- [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
- [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
- [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
- [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
- [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
- [OnFileManagerMoveObject](extending-modx/plugins/system-events/onfilemanagermoveobject)
- [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
- [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
- [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
- [OnMODXInit](extending-modx/plugins/system-events/onmodxinit)
- [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
- [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
- [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
- [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
- [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
- [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
- [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)

### Template Variables

- [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
- [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
- [OnTVFormDelete](extending-modx/plugins/system-events/ontvformdelete)
- [OnTVFormPrerender](extending-modx/plugins/system-events/ontvformprerender)
- [OnTVFormRender](extending-modx/plugins/system-events/ontvformrender)
- [OnTVFormSave](extending-modx/plugins/system-events/ontvformsave)
- [OnTVInputPropertiesList](extending-modx/plugins/system-events/ontvinputpropertieslist)
- [OnTVInputRenderList](extending-modx/plugins/system-events/ontvinputrenderlist)
- [OnTVOutputRenderList](extending-modx/plugins/system-events/ontvoutputrenderlist)
- [OnTVOutputRenderPropertiesList](extending-modx/plugins/system-events/ontvoutputrenderpropertieslist)
- [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
- [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
- [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
- [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)

### Templates

- [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
- [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
- [OnTempFormDelete](extending-modx/plugins/system-events/ontempformdelete)
- [OnTempFormPrerender](extending-modx/plugins/system-events/ontempformprerender)
- [OnTempFormRender](extending-modx/plugins/system-events/ontempformrender)
- [OnTempFormSave](extending-modx/plugins/system-events/ontempformsave)
- [OnTemplateBeforeRemove](extending-modx/plugins/system-events/ontemplatebeforeremove)
- [OnTemplateBeforeSave](extending-modx/plugins/system-events/ontemplatebeforesave)
- [OnTemplateRemove](extending-modx/plugins/system-events/ontemplateremove)
- [OnTemplateSave](extending-modx/plugins/system-events/ontemplatesave)

### User Groups

- [OnUserAddToGroup](extending-modx/plugins/system-events/onuseraddtogroup)
- [OnUserBeforeAddToGroup](extending-modx/plugins/system-events/onuserbeforeaddtogroup)
- [OnUserBeforeRemoveFromGroup](extending-modx/plugins/system-events/onuserbeforeremovefromgroup)
- [OnUserGroupBeforeFormRemove](extending-modx/plugins/system-events/onusergroupbeforeformremove)
- [OnUserGroupBeforeFormSave](extending-modx/plugins/system-events/onusergroupbeforeformsave)
- [OnUserGroupBeforeRemove](extending-modx/plugins/system-events/onusergroupbeforeremove)
- [OnUserGroupBeforeSave](extending-modx/plugins/system-events/onusergroupbeforesave)
- [OnUserGroupFormRemove](extending-modx/plugins/system-events/onusergroupformremove)
- [OnUserGroupFormSave](extending-modx/plugins/system-events/onusergroupformsave)
- [OnUserGroupRemove](extending-modx/plugins/system-events/onusergroupremove)
- [OnUserGroupSave](extending-modx/plugins/system-events/onusergroupsave)
- [OnUserRemoveFromGroup](extending-modx/plugins/system-events/onuserremovefromgroup)

### User Profiles

- [OnUserProfileBeforeRemove](extending-modx/plugins/system-events/onuserprofilebeforeremove)
- [OnUserProfileBeforeSave](extending-modx/plugins/system-events/onuserprofilebeforesave)
- [OnUserProfileRemove](extending-modx/plugins/system-events/onuserprofileremove)
- [OnUserProfileSave](extending-modx/plugins/system-events/onuserprofilesave)

### Users

- [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
- [OnBeforeUserDeactivate](extending-modx/plugins/system-events/onbeforeuserdeactivate)
- [OnBeforeUserDuplicate](extending-modx/plugins/system-events/onbeforeuserduplicate)
- [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
- [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
- [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
- [OnUserDeactivate](extending-modx/plugins/system-events/onuserdeactivate)
- [OnUserDuplicate](extending-modx/plugins/system-events/onuserduplicate)
- [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
- [OnUserFormPrerender](extending-modx/plugins/system-events/onuserformprerender)
- [OnUserFormRender](extending-modx/plugins/system-events/onuserformrender)
- [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
- [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)

## Custom Events

No GUI exists for custom events yet — create them through the API. Events have these attributes:

| Attribute | Description                                                                                                                                             |
| --------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- |
| name      | The unique event name.                                                                                                                                  |
| service   | A loose grouping of events by area. Services 1, 2, 4, 5 and 6 load inside the Manager; services 1, 3, 4, 5 and 6 load outside it (see `getEventMap()`). |
| groupname | Groups the events visually in the MODX Manager, where it appears as a Plugin tab.                                                                       |

Create an event through the MODX API:

``` php
$Event = $modx->newObject('modEvent');
$Event->set('name', 'OnMyCustomEvent');
$Event->set('service',1);
$Event->set('groupname', 'Custom');
```

Fire the event by name:

``` php
$modx->invokeEvent('OnMyCustomEvent', $options);
```

Then register a [Plugin](extending-modx/plugins "Plugins") for the event. It receives the options passed to `invokeEvent()`.
