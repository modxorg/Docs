---
title: MODExt
translation: extending-modx/custom-manager-pages/modext
---

## Что такое MODExt?

MODExt является расширением [JavaScript-фреймворка ExtJS3](http://www.sencha.com/products/extjs), которое предоставляет дополнительные функции, настраиваемые для MODX. Данное расширение управляет интерфейсом менеджера MODX Revolution, и также доступно для разработчиков, желающих использовать его при разработке CMP. Разработчику просто необходимо использовать Ext.extend для класса MODX. *, чтобы мгновенно получить преимущество от пользовательских компонентов MODExt.

Почему Ext JS? Существует множество библиотек и сред Javascript, и все они позволяют вам манипулировать DOM, но только некоторые из них предлагают зрелую библиотеку пользовательского интерфейса (Yahoo User Interface и Ext JS являются крупнейшими игроками в этой области). Ext JS хорошо подходит для создания многофункционального интернет-приложения, такого как менеджер MODX.

## Часто используемые компоненты

Есть несколько компонентов, которые используются в менеджере MODX, и, вероятно, будут использоваться в CMP

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [Учебники по MODExt](extending-modx/custom-manager-pages/modext/modext-tutorials)
    1. [Ext JS Tutorial - Окна сообщений](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
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

### Больше компонентов MODExt

Конечно, в вашем распоряжении есть больше компонентов MODExt. Для получения полного списка (и исходного кода для изучения) перейдите в каталог **manager/assets/modext/widgets/core/** вашей установки MODX.

#### xcheckbox

Xcheckbox xtype является расширением обычного чекбокса ExtJS, добавленного в MODX 2.1, который, когда флажок не установлен, будет отправлять значение «0» вместо пустой строки по сравнению с исходным вводом формы флажка.

## Расширение класса MODExt

Расширение компонента MODExt на самом деле довольно простое. Давайте расширим класс MODx.grid.Grid, чтобы создать нашу собственную сетку, дополненную собственной панелью инструментов.

Сначала создайте новый файл JavaScript и поместите следующий код:

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

Здесь мы создали наш собственный класс (MyComponent.grid.MyGrid), который расширяет MODx.grid.Grid. Мы также зарегистрировали mycomponent-grid-mygrid как Ext xtype, который может использоваться для отображения этой сетки в FormPanel или другом компоненте. У него нет дополнительной функциональности - пока!

Теперь давайте добавим некоторые параметры конфигурации:

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

## Смотрите также

- [Документация по API ExtJS 3.4](http://docs.sencha.com/ext-js/3-4/#!/api)
- [Примеры по ExtJS 3.4](http://dev.sencha.com/deploy/ext-3.4.0/examples/)
