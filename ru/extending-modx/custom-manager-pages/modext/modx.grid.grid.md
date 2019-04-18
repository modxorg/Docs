---
title: MODx.grid.Grid
_old_id: '1080'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.grid
---

## MODx.grid.Grid

**Расширяет:** Ext.grid.EditorGridPanel
**Основные характеристики:** функциональность коннектора; позволяет легко интегрировать элементы панели инструментов и MODx.Window; встроенная функциональность контекстного меню.

When instantiating this into a tabbed interface, it's recommended to set preventRender: true in its config to prevent JS rendering issues.

![](/download/attachments/18678079/grid.png?version=1&modificationDate=1302187849000)

Сетки MODExt используются для отображения табличных данных в комплекте с ColumnModel, верхней панелью инструментов (tbar) и нижней панелью инструментов (bbar). Они также имеют встроенную поддержку постраничного разбиения. Сетки заполняются удаленно по запросу в коннектор, возвращающего объект JSON. Отображение контекстного меню правой кнопкой мыши для каждой строки может быть легко достигнуто включением ключа «menu» для каждой строки данных в вашем процессоре:

```php
foreach( $items as $item ) {
    $data[] = array(
        'id'    => $obj->get( 'id' ),
        'name'  => $obj->get( 'name' ),
        'menu'  => array(
            array(
                'text'      => $modx->lexicon( 'my_lexicon' ),
                'handler'   => 'this.myHandler'
            )
        )
    );
}
```

The above code would create a context menu for each item with the text being the lexicon key matching "my_lexicon," and the handler being the myHandler function registered to your Grid object.

Альтернативно (и предпочтительно) меню могут быть созданы путем расширения вашей сетки JS и добавления метода «getMenu»:

```javascript
getMenu: function() {
    var m = [];
    m.push({
        text: _('my_lexicon_key')
        ,handler: this.myHandler
    });
    return m;
}
```

Returning an array of items in the getMenu method will automatically add the items to the context menu.

Сетки Revolution 2.0.x не могут просто вернуть массив - им нужно будет вызвать «this.addContextMenuItem(m);» перед концом функции. Возвращающий массив был добавлен в версии 2.1.

## MODExt-Specific Parameters

Прежде всего, MODx.grid.Grid извлекает свои данные удаленно через параметр конфигурации "url". Он также загружает baseParams в вызов, который по умолчанию выглядит как:

```javascript
baseParams: { action: 'getList' }
```

You can override the baseParams in your config parameter.

MODx.grid.Grid adds a few unique parameters not found in typical Ext.grid.Grid objects:

Название | Описание | Значение по умолчанию
--- | --- | ---
url | URL-адрес коннектора для загрузки этой сетки. | 
paging | Если true, включит постраничное разделение и автоматически добавит PagingToolbar внизу сетки. | true
pageSize | The number of items to page by, if paging == true. Defaults to the System Setting of "default_per_page", which is 20. | 20
pageStart | Начальный индекс постраничного разбиения. | 0
showPerPage | Whether or not to show the "Per Page" textbox. Defaults to true. | true
pagingItems | Any items to add to the right of the "Per Page" textbox on the paging toolbar. Useful for adding extra buttons. | []
grouping | If true, will automatically enable grouping on this grid. | false
groupBy | The column to group by. Note that the column must be in the column model. | name
pluralText | Текст для множества элементов в сгруппированном столбце, например: «Строки» | Records
singleText | The text for a single amount of items in the grouped column, ie: "Row" | Record
sortBy | Столбец по умолчанию для сортировки при группировке и remoteSort установленном в true. | id
sortDir | Направление сортировки по умолчанию при группировке и remoteSort установленном в true | ASC
preventRender | Prevent the grid from rendering. Useful when putting the grid in panels or tabs. | 1
autosave | Если установлено значение true, будет автоматически запускаться процессор 'updateFromGrid' (или процессор в параметре конфигурации saveUrl) для этого коннектора при выполнении встроенного редактирования в сетке. | false
saveUrl | URL-адрес коннектора для вызова при встроенном редактировании с включенным автосохранением. | The value of config.url
save_action | The processor action to call when inline-editing with autosave on. | updateFromGrid
saveParams | A JS object of parameters to also send to the saveUrl when auto-saving or when using MODx.grid.Grid's remove method. | {}
save_callback | After auto-saving, run this method. | null
preventSaveRefresh | Если автосохранение имеет значение true, после сохранения будет препятствовать обновлению сетки. Используется для более плавного редактирования. | 1
primaryKey | If your grid items have a primary key that's not ID, set it here. | id
storeId | Пользовательский идентификатор для предоставления хранилища в данной сетке. По умолчанию будет использоваться уникальный Ext ID. | Ext.id()

Полный список всех параметров, не перечисленных здесь, см. в документации [ExtJS](http://sencha.com).

## Custom Events

MODx.grid.Grid adds a few extra events not found in Ext.grid.Grid objects:

Название | Описание
--- | ---
beforeRemoveRow | Запускается перед удалением строки при вызове метода remove() в сетке (обычно это делается в контекстном меню)
afterRemoveRow | Запускается после удаления строки при вызове метода remove() в сетке (обычно это делается в контекстном меню)
afterAutoSave | Fires after an inline-edit save is done, if autosave is set to true.

## Other Unique Functions

MODExt grids come with quite a few other features.

### Пользовательские сообщения об исключениях

Если возвращаемый JSON не является допустимой коллекцией хранилища данных и содержит параметр «message», для него будет задано значение emptyText для сетки и будет отображаться в качестве первой строки сетки. Обычно используется $modx->error->failure('Сообщение здесь') в ваших процессорах.

### loadWindow

Автоматически загружает и показывает окно любого данного xtype:

```javascript
grid.loadWindow({
  xtype: 'my-xtype-for-the-window'
  ,blankValues: true /* очищает значения окна, полезно для новых оконных объектов, установите в false для обновления окон */
});
```

Если blankValues не установлен в true, этот метод автоматически передаст данные текущей выбранной строки также в окно, установив его значения в форме (при условии, что ваше окно расширяет [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window "MODx.Window").)

### remove

MODx.grid.Grid поставляется с пользовательским методом под названием «remove», который автоматически запускает AJAX-запрос к вашему коннектору, установленному в config.url с действием «remove», и ID (или primaryKey, установленный в конфигурации) выбранной строки. Это полезно для контекстных меню.

The method takes one parameter - text - which is the text to display in the confirm dialog that prompts the user if they want to remove the row before actually doing so. The beforeRemoveRow event is fired before the confirm dialog is loaded.

```javascript
grid.remove("Вы уверены, что хотите удалить этот объект?");
```

### config

Это пользовательский метод, который позволяет открыть диалоговое окно подтверждения перед выполнением действия:

```javascript
grid.confirm("approve","Вы уверены, что хотите принять эту статью?");
```

Как и при удалении, метод принимает идентификатор или primaryKey выбранной в данный момент строки и отправит его на процессорное действие, указанное в первом параметре метода подтверждения. Когда выполнится, метод обновит сетку.

### refresh

A custom method that will refresh the grid whenever fired.

### encodeModified

Метод вернет объект JSON всех измененных (грязных) строк и полей. Полезно, если для автосохранения установлено значение false.

### encode

Метод вернет объект JSON для всех строк.

## See Also

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [Учебник по MODExt ](extending-modx/custom-manager-pages/modext/modext-tutorials)
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
