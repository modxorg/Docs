---
title: "Системные события"
translation: "extending-modx/plugins/system-events/"
description: "Системные события запускаются везде в MODX, позволяя плагинам взаимодействовать с кодом MODX и добавлять пользовательские функции без модификации основного кода системы"
---

## Что такое системные события?

Системные события - это события в MODX, которые зарегистрированы в [Plugins](extending-modx/plugins "Plugins"). Они «запускаются» по всему коду MODX, что позволяет плагинам взаимодействовать с кодом MODX и добавлять пользовательские функции без исправления основного кода.

## Модель системного события

Таблица системных событий находится в `{table_prefix}_system_eventnames`, и имеет следующие поля:

- **id** - Уникальный ID.
- **name** - Название события. Это то, как они вызываются в коде, через метод [modX.invokeEvent](extending-modx/modx-class/reference/modx.invokeevent "modX.invokeEvent").
- **service** - Тип системного события.
- **groupname** - Используется для пользовательских интерфейсов, прежде всего для фильтрации, группировки и сортировки событий. Не используется явно в модели modx.

### Service Types

Поле 'service' в системном событии является числом; числа указывают на различные типы системных событий. Они следующие:

- 1 - Parser Service Events
- 2 - Manager Access Events
- 3 - Web Access Service Events
- 4 - Cache Service Events
- 5 - Template Service Events
- 6 - User Defined Events

Тип 3 не запускается в контексте 'mgr', а тип 2 - не запускается ни в каком контексте, кроме 'mgr'.

## Доступные события

Это не исчерпывающий список, так как события все еще документируются, заранее благодарим за ваше терпение! События TV, шаблонов и сниппетов еще не задокументированы. 
Для получения полного списка, пожалуйста, либо посмотрите плагин в Менеджере и посмотрите вкладку Системные события, либо просмотрите [здесь](https://github.com/modxcms/revolution/blob/develop/_build/data/transport.core.events.php). Также обратите внимание, что все события WUsr (веб-пользователя) были удалены.

- [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
- [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
- [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
- [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
- [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
- [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
- [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
- [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
- [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
- [OnBeforeRegisterClientScripts](extending-modx/plugins/system-events/onbeforeregisterclientscripts)
- [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
- [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
- [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
- [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
- [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
- [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
- [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
- [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
- [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
- [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
- [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
- [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
- [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
- [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
- [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
- [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
- [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
- [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
- [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
- [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
- [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
- [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
- [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
- [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
- [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
- [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
- [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
- [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
- [OnElementNotFound](extending-modx/plugins/system-events/onelementnotfound)
- [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
- [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
- [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
- [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
- [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
- [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
- [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
- [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
- [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
- [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
- [OnFileManagerMoveObject](extending-modx/plugins/system-events/onfilemanagermoveobject)
- [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
- [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
- [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
- [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
- [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
- [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
- [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
- [OnMODXInit](extending-modx/plugins/system-events/onmodxinit)
- [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
- [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
- [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
- [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
- [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
- [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
- [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
- [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
- [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
- [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
- [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
- [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
- [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
- [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
- [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
- [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
- [OnResourceAutoPublish](extending-modx/plugins/system-events/onresourceautopublish)
- [OnResourceBeforeSort](extending-modx/plugins/system-events/onresourcebeforesort)
- [OnResourceDelete](extending-modx/plugins/system-events/onresourcedelete)
- [OnResourceDuplicate](extending-modx/plugins/system-events/onresourceduplicate)
- [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
- [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
- [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
- [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
- [OnResourceSort](extending-modx/plugins/system-events/onresourcesort)
- [OnResourceUndelete](extending-modx/plugins/system-events/onresourceundelete)
- [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
- [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
- [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
- [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
- [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
- [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
- [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
- [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
- [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
- [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
- [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
- [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
- [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
- [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
- [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)

## Кастомные события

Вы можете создавать свои собственные пользовательские события, но в настоящее время для этого нет графического интерфейса, вместо этого вы должны использовать API. События имеют следующие атрибуты:

- **name** - уникальное имя события.
- **service** - неудачная попытка сгруппировать события для определенных областей. 1,2,4,5,6 загружаются внутри менеджера, тогда как 1,3,4,5,6 загружаются вне менеджера. (см. `getEventMap()`)
- **groupname** - Используется для визуальной группировки событий в менеджере MODX (отображается как вкладка плагина).

### Создание события с использованием API MODX будет выглядеть примерно так

``` php
$Event = $modx->newObject('modEvent');
$Event->set('name', 'OnMyCustomEvent');
$Event->set('service',1);
$Event->set('groupname', 'Custom');
```

Тогда ваш код может вызвать событие по имени:

``` php
$modx->invokeEvent('OnMyCustomEvent', $options);
```

Наконец, можно установить плагин для прослушивания этого события. В этом случае он может получать параметры, переданные ему.

``` php
//... TODO...
```

## Смотрите также

- [System Events](extending-modx/plugins/system-events)
- [OnBeforeCacheUpdate](extending-modx/plugins/system-events/onbeforecacheupdate)
- [OnBeforeChunkFormDelete](extending-modx/plugins/system-events/onbeforechunkformdelete)
- [OnBeforeChunkFormSave](extending-modx/plugins/system-events/onbeforechunkformsave)
- [OnBeforeDocFormDelete](extending-modx/plugins/system-events/onbeforedocformdelete)
- [OnBeforeDocFormSave](extending-modx/plugins/system-events/onbeforedocformsave)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnBeforeSaveWebPageCache](extending-modx/plugins/system-events/onbeforesavewebpagecache)
- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnCacheUpdate](extending-modx/plugins/system-events/oncacheupdate)
- [OnChunkFormDelete](extending-modx/plugins/system-events/onchunkformdelete)
- [OnChunkFormPrerender](extending-modx/plugins/system-events/onchunkformprerender)
- [OnChunkFormRender](extending-modx/plugins/system-events/onchunkformrender)
- [OnChunkFormSave](extending-modx/plugins/system-events/onchunkformsave)
- [OnDocFormDelete](extending-modx/plugins/system-events/ondocformdelete)
- [OnDocFormPrerender](extending-modx/plugins/system-events/ondocformprerender)
- [OnDocFormRender](extending-modx/plugins/system-events/ondocformrender)
- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [OnDocPublished](extending-modx/plugins/system-events/ondocpublished)
- [OnDocUnPublished](extending-modx/plugins/system-events/ondocunpublished)
- [OnLoadWebPageCache](extending-modx/plugins/system-events/onloadwebpagecache)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnSiteRefresh](extending-modx/plugins/system-events/onsiterefresh)
- [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [OnWebLogout](extending-modx/plugins/system-events/onweblogout)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
- [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender)
- [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave)
- [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave)
- [OnTemplateVarBeforeRemove](extending-modx/plugins/system-events/ontemplatevarbeforeremove)
- [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove)
- [OnBeforeEmptyTrash](extending-modx/plugins/system-events/onbeforeemptytrash)
- [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)
- [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit)
- [OnBeforePluginFormDelete](extending-modx/plugins/system-events/onbeforepluginformdelete)
- [OnBeforePluginFormSave](extending-modx/plugins/system-events/onbeforepluginformsave)
- [OnBeforeSnipFormDelete](extending-modx/plugins/system-events/onbeforesnipformdelete)
- [OnBeforeSnipFormSave](extending-modx/plugins/system-events/onbeforesnipformsave)
- [OnBeforeTempFormDelete](extending-modx/plugins/system-events/onbeforetempformdelete)
- [OnBeforeTempFormSave](extending-modx/plugins/system-events/onbeforetempformsave)
- [OnBeforeTVFormDelete](extending-modx/plugins/system-events/onbeforetvformdelete)
- [OnBeforeTVFormSave](extending-modx/plugins/system-events/onbeforetvformsave)
- [OnBeforeUserActivate](extending-modx/plugins/system-events/onbeforeuseractivate)
- [OnBeforeUserFormDelete](extending-modx/plugins/system-events/onbeforeuserformdelete)
- [OnBeforeUserFormSave](extending-modx/plugins/system-events/onbeforeuserformsave)
- [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin)
- [OnCategoryBeforeRemove](extending-modx/plugins/system-events/oncategorybeforeremove)
- [OnCategoryBeforeSave](extending-modx/plugins/system-events/oncategorybeforesave)
- [OnCategoryRemove](extending-modx/plugins/system-events/oncategoryremove)
- [OnCategorySave](extending-modx/plugins/system-events/oncategorysave)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
- [OnContextBeforeRemove](extending-modx/plugins/system-events/oncontextbeforeremove)
- [OnContextBeforeSave](extending-modx/plugins/system-events/oncontextbeforesave)
- [OnContextFormPrerender](extending-modx/plugins/system-events/oncontextformprerender)
- [OnContextFormRender](extending-modx/plugins/system-events/oncontextformrender)
- [OnContextRemove](extending-modx/plugins/system-events/oncontextremove)
- [OnContextSave](extending-modx/plugins/system-events/oncontextsave)
- [OnEmptyTrash](extending-modx/plugins/system-events/onemptytrash)
- [OnFileManagerBeforeUpload](extending-modx/plugins/system-events/onfilemanagerbeforeupload)
- [OnFileManagerUpload](extending-modx/plugins/system-events/onfilemanagerupload)
- [OnFileManagerDirCreate](extending-modx/plugins/system-events/onfilemanagerdircreate)
- [OnFileManagerDirRemove](extending-modx/plugins/system-events/onfilemanagerdirremove)
- [OnFileManagerDirRename](extending-modx/plugins/system-events/onfilemanagerdirrename)
- [OnFileManagerFileCreate](extending-modx/plugins/system-events/onfilemanagerfilecreate)
- [OnFileManagerFileRemove](extending-modx/plugins/system-events/onfilemanagerfileremove)
- [OnFileManagerFileRename](extending-modx/plugins/system-events/onfilemanagerfilerename)
- [OnFileManagerFileUpdate](extending-modx/plugins/system-events/onfilemanagerfileupdate)
- [OnFileManagerMoveObject](extending-modx/plugins/system-events/onfilemanagermoveobject)
- [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
- [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)
- [OnManagerLoginFormPrerender](extending-modx/plugins/system-events/onmanagerloginformprerender)
- [OnManagerLoginFormRender](extending-modx/plugins/system-events/onmanagerloginformrender)
- [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender)
- [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit)
- [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound)
- [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized)
- [OnParseDocument](extending-modx/plugins/system-events/onparsedocument)
- [OnPluginBeforeRemove](extending-modx/plugins/system-events/onpluginbeforeremove)
- [OnPluginBeforeSave](extending-modx/plugins/system-events/onpluginbeforesave)
- [OnPluginEventRemove](extending-modx/plugins/system-events/onplugineventremove)
- [OnPluginFormDelete](extending-modx/plugins/system-events/onpluginformdelete)
- [OnPluginFormPrerender](extending-modx/plugins/system-events/onpluginformprerender)
- [OnPluginFormRender](extending-modx/plugins/system-events/onpluginformrender)
- [OnPluginFormSave](extending-modx/plugins/system-events/onpluginformsave)
- [OnPluginRemove](extending-modx/plugins/system-events/onpluginremove)
- [OnPluginSave](extending-modx/plugins/system-events/onpluginsave)
- [OnPropertySetBeforeRemove](extending-modx/plugins/system-events/onpropertysetbeforeremove)
- [OnPropertySetBeforeSave](extending-modx/plugins/system-events/onpropertysetbeforesave)
- [OnPropertySetRemove](extending-modx/plugins/system-events/onpropertysetremove)
- [OnPropertySetSave](extending-modx/plugins/system-events/onpropertysetsave)
- [OnResourceAutoPublish](extending-modx/plugins/system-events/onresourceautopublish)
- [OnResourceGroupBeforeRemove](extending-modx/plugins/system-events/onresourcegroupbeforeremove)
- [OnResourceGroupBeforeSave](extending-modx/plugins/system-events/onresourcegroupbeforesave)
- [OnResourceGroupRemove](extending-modx/plugins/system-events/onresourcegroupremove)
- [OnResourceGroupSave](extending-modx/plugins/system-events/onresourcegroupsave)
- [OnRichTextBrowserInit](extending-modx/plugins/system-events/onrichtextbrowserinit)
- [OnRichTextEditorInit](extending-modx/plugins/system-events/onrichtexteditorinit)
- [OnRichTextEditorRegister](extending-modx/plugins/system-events/onrichtexteditorregister)
- [OnSiteSettingsRender](extending-modx/plugins/system-events/onsitesettingsrender)
- [OnUserActivate](extending-modx/plugins/system-events/onuseractivate)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserFormDelete](extending-modx/plugins/system-events/onuserformdelete)
- [OnUserFormSave](extending-modx/plugins/system-events/onuserformsave)
- [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
- [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)
- [OnWebPageComplete](extending-modx/plugins/system-events/onwebpagecomplete)
- [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit)