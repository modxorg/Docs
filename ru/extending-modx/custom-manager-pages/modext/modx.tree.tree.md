---
title: MODx.tree.Tree
_old_id: '1111'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree
---

## MODx.tree.Tree

**Расширяет:** Ext.tree.TreePanel
**Основные характеристики:** Удаленно загруженные панели инструментов; перетаскивание для полей формы; функциональность коннектора для удаления и перетаскивания/сортировки.

![](/download/attachments/18678081/modext_tree.png?version=1&modificationDate=1250518279000)

Trees provide a quick and easy way to display multiple levels of objects which have a parent-child relationship, such as users or resources.

## Unique Parameters

MODx.tree.Tree has a few extra parameters not found in Ext.tree.TreePanel objects:

Название | Описание | Значение по умолчанию
--- | --- | ---
url | URL, на который указывает загрузчик дерева. Необязательно, если вы передаете в параметре данных. | 
rootName | The text of the root node, if rootVisible is set to true. | 
rootId | The ID of the root node. | root
data | Необязательно; если URL не задан, данные должны быть загружены сюда. | []
remoteToolbar | Если true, загрузит панель инструментов дерева через данные, загруженные удаленно. | false
remoteToolbarUrl* | URL-адрес коннектора для загрузки панели инструментов. По умолчанию используется URL-адрес дерева. | 
remoteToolbarAction* | The processor action to load the toolbar from. | getToolbar
useDefaultToolbar | Если remoteToolbar имеет значение false, будет загружена панель инструментов по умолчанию, которая содержит пункты "развернуть все", "свернуть все" и "обновить". Элементы, переданные в свойство tbar, будут добавлены после. | false
menuConfig | The config object to pass to the context menu loaded for this tree. | 
expandFirst | If true, will expand the first level nodes on render. | true
removeAction* | The processor action to take when removing a node. | remove
removeTitle* | Заголовок для диалога удаления при удалении узла. | Warning!
primaryKey | The primary key for the node. Usually is id. | id
sortAction | The processor action to take when sorting nodes via drag/drop. | sort
toolbarItemCls* | The CSS class to add to remoteToolbar loaded items. | x-btn-icon

- = Только для MODX Revolution версии 2.1 и выше

## Custom Events

The custom events fired by MODx.tree.Tree are:

Название | Описание
--- | ---
beforeSort | Запускается до того, как дерево отправит отсортированные узлы процессору сортировки. Передаются отсортированные узлы, закодированно.
afterSort | Запускается после сортировки узла дерева. Проходит: - событие - событие бросания
- result - The response object from the sort processor. | 

## Other Unique Features

### Sorting

Сортировка автоматически включается по умолчанию в объектах MODx.tree.Tree. Чтобы отключить, установите для enableDD значение false в вашей конфигурации. После перетаскивания дерево запустит закодированные узлы в процессор сортировки с тем же коннектором, что и у URL дерева.

### Remote Toolbar Loading

Панели инструментов могут быть загружены удаленно, используя параметр конфигурации remoteToolbar. Это загрузит данные из процессора, загруженного конфигурационной переменной remoteToolbarAction, которая по умолчанию имеет значение «getToolbar».

### Drag/Drop to MODx.FormPanel Fields

Узлы можно перетаскивать в поля MODx.FormPanel, предполагая, что в конфигурационную переменную передается следующее

```javascript
,enableDD: true
,ddGroup: 'modx-treedrop-dd'
```

and that the node has an attribute of 'type', which is one of the following values: modResource,snippet,chunk,tv,file.

## See Also

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Tutorials](extending-modx/custom-manager-pages/modext/modext-tutorials)
    1. [Ext JS - Окна сообщений](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
    2. [Ext JS - Ajax](extending-modx/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
    3. [Ext JS - Анимация](extending-modx/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
    4. [Ext JS - Управление узлами](extending-modx/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
    5. [Ext JS - Панели](extending-modx/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
    6. [Ext JS - Расширенная сетка](extending-modx/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
    7. [Ext JS - Внутри CMP](extending-modx/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
3. [MODx.combo.ComboBox](extending-modx/custom-manager-pages/modext/modx.combo.combobox)
4. [MODx.Console](extending-modx/custom-manager-pages/modext/modx.console)
5. [MODx.FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel)
6. [MODx.grid.Grid](extending-modx/custom-manager-pages/modext/modx.grid.grid)
7. [MODx.grid.LocalGrid](extending-modx/custom-manager-pages/modext/modx.grid.localgrid)
8. [MODx.msg](extending-modx/custom-manager-pages/modext/modx.msg)
9. [MODx.tree.Tree](extending-modx/custom-manager-pages/modext/modx.tree.tree)
10. [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window)
