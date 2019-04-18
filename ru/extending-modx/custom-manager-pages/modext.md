---
title: MODExt
_old_id: '198'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext
---

## What is MODExt?

MODExt является расширением [JavaScript-фреймворка ExtJS3](http://www.sencha.com/products/extjs), которое предоставляет дополнительные функции, настраиваемые для MODX. Данное расширение управляет интерфейсом менеджера MODX Revolution, и также доступно для разработчиков, желающих использовать его при разработке CMP. Разработчику просто необходимо использовать Ext.extend для класса MODX. *, чтобы мгновенно получить преимущество от пользовательских компонентов MODExt.

Why Ext JS? There are lots of Javascript libraries and frameworks out there, and all of them let you manipulate the DOM, but only a couple of them offer a mature UI library (the Yahoo User Interface and Ext JS are the biggest players in the field). Ext JS is well suited to creating a rich internet application such as the MODX manager.

## Commonly-Used Components

Есть несколько компонентов, которые используются в менеджере MODX, и, вероятно, будут использоваться в CMP

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [Учебники по MODExt](extending-modx/custom-manager-pages/modext/modext-tutorials)
    1. [Ext JS Tutorial - Message Boxes](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
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

### More MODExt Components

Конечно, в вашем распоряжении есть больше компонентов MODExt. Для получения полного списка (и исходного кода для изучения) перейдите в каталог **manager/assets/modext/widgets/core/** вашей установки MODX.

#### xcheckbox

Xcheckbox xtype является расширением обычного чекбокса ExtJS, добавленного в MODX 2.1, который, когда флажок не установлен, будет отправлять значение «0» вместо пустой строки по сравнению с исходным вводом формы флажка.

## Extending a MODExt Class

Расширение компонента MODExt на самом деле довольно простое. Давайте расширим класс MODx.grid.Grid, чтобы создать нашу собственную сетку, дополненную собственной панелью инструментов.

First, create a new JavaScript file and place the following code:

```php
MyComponent.grid.MyGrid = function( config ) {
    /* Конструктор родительского класса */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};
Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Члены класса будут здесь */
} );
/* Зарегистрировать "mycomponent-grid-mygrid" как тип xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Here, we've created our own class (MyComponent.grid.MyGrid) which extends MODx.grid.Grid. We have also registered "mycomponent-grid-mygrid" as an Ext xtype, which can be used to display this grid in a FormPanel or other component. It has no additional functionality -- yet!

Now, let's add some configuration options:

```javascript
MyComponent.grid.MyGrid = function( config ) {
    config = config || {};

    /* Опции конфигурации сетки */
    Ext.applyIf( config, {
        id : "mycomponent-grid-mygrid",
        title : _( "my_grid" ),
        url : MyComponent.config.connectors_url + "list.php",
        baseParams : {
            action : "getlist"
        },
        paging : true,
        autosave : true,
        remoteSort : true,
        /* Store field list */
        fields : [ {
            name : "id",
            type : "int"
        }, {
            name : "name",
            type : "string"
        }, {
            name : "menu"
        } ],
        /* Grid ColumnModel */
        columns : [ {
            header : _( "id" ),
            dataIndex : "id",
            sortable : true
        }, {
            header : _( "name" ),
            dataIndex : "name",
            sortable : true
        } ],
        /* Top toolbar */
        tbar : [ {
            xtype : "button",
            text : _( "create" ),
            handler : {
                xtype : "mycomponent-window-create",
                blankValues : true
            },
            scope : this
        } ]
    } );

    /* Конструктор родительского класса */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};

Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Члены класса будут здесь */
} );

/* Зарегистрировать "mycomponent-grid-mygrid" как тип xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Наша базовая конфигурация настраивает сетку для работы с соединителем «list», используя параметр действия «getlist». Она также настраивает разбиение по страницам, сортировку и включает функцию «автосохранения», чтобы при каждом изменении записи она автоматически обновлялась в базе данных.

Затем мы устанавливаем наши поля (id, name и menu) и нашу модель ColumnModel, которая ссылается на поля в нашем магазине.

Наконец, мы создаем верхнюю панель инструментов, состоящую из кнопки. Обработчик создает окно, используемое для создания записи при добавлении в нашу базу данных.

## See Also

- [ExtJS 3.4 API Documentation](http://docs.sencha.com/ext-js/3-4/#!/api)
- [Примеры по ExtJS 3.4](http://dev.sencha.com/deploy/ext-3.4.0/examples/)
