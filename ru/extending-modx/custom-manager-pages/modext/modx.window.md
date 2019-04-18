---
title: MODx.Window
_old_id: '1114'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window
---

## MODx.Window

**Расширяет:** Ext.Window
**Основные характеристики:** Функция перетаскивания; функциональность коннектора для сохранения.

![](/download/attachments/18678082/modx-window.png?version=1&modificationDate=1303411582000)

Окна MODExt - это удобный способ отображения данных записи из сетки или AJAX-запроса на редактирование. Окна автоматически включают FormPanel, в которую можно добавлять поля формы (и другие компоненты). Отправка/сохранение окна фактически отправляет FormPanel и инициирует запрос AJAX к вашему коннектору.

## Unique Parameters

Название | Описание | Значение по умолчанию
--- | --- | ---
action | If baseParams is not set, will use this as the action to the controller. | 
allowDrop | Whether or not to allow dropping of tree items onto the form fields. | 1
baseParams | An object of parameters to send along with the window form on save. | {}
blankValues | If true, will reset the values of the form each time it is shown. | 0
cancelBtnText | The text of the cancel button for the window. | Cancel
fields | An array of fields for the form, similar to Ext.form.FormPanel's fields definition. | []
fileUpload | Если true, форма будет создана с возможностью приема файлов. | 0
formFrame | Whether or not to add a ext-style frame to the window. | 1
labelAlign | The alignment of the labels on the form. | right
labelWidth | The width, in pixels, of the labels on the form. | 100
record | A JSON object of default values (in name: value format) to set to the form when first loading the window. | {}
saveBtnText | The text of the save button for the window. | Save
url | URL-адрес коннектора для отправки формы окна. | 

## Custom Events

Название | Описание
--- | ---
success | If the form submission returns a success response.
failure | If the form submission returns a failure response.
beforeSubmit | Перед тем, как форма отправляет свои значения в коннектор, но после прохождения проверки.

## Unique Functionality

### Запуск метода отправки формы

Вы можете вручную запустить отправку формы окна, запустив метод submit(), который имеет необязательный параметр close (1/0; если 1, закроет окно в случае успеха). Пример:

```javascript
var w = Ext.getCmp('my-window-id');
w.submit(true); /* отправить и закрыть окно */
```

### setValues

The MODx.Window class comes with a setValues method, that will set the form values of the window:

```javascript
var w = Ext.getCmp('my-window-id');
w.setValues({
  name: 'Иван'
  ,email: 'my@email.com'
});
```

### reset

You can run the reset method to empty (reset) all the fields on the form:

```javascript
var w = Ext.getCmp('my-window-id');
w.reset();
```

### Hiding and Showing Fields

MODx.Window comes with a few assistance methods for making fields in its forms visible or hidden:

```javascript
var w = Ext.getCmp('my-window-id');
w.hideField('email');
w.showField('comments');
```

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
