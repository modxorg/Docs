---
title: MODx.combo.ComboBox
_old_id: '1055'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.combo.combobox
---

## MODx.combo.ComboBox

**Расширяет:** [Ext.form.ComboBox](http://extjs.cachefly.net/ext-3.3.0/docs/?class=Ext.form.ComboBox)
**Основные характеристики:** Удаленные и локальные хранилища данных; рендерер сетки.

![](/download/attachments/18678077/modext_combobox.png?version=1&modificationDate=1250517993000)

Класс MODExt ComboBox содержит все функциональные возможности обычного Ext ComboBox. Он может быть заполнен удаленно массивом объектов JSON из коннектора (по умолчанию) или локально (используя базовый массив JavaScript или Ext ArrayStore с параметром конфигурации «mode», установленным в «local»).

Уникальной особенностью класса MODx ComboBox является встроенный рендерер для сеток. Он позволяет разработчикам использовать ComboBox в качестве редактора сетки и автоматически обеспечивает правильное отображение displayValue в ячейке сетки:

![](/download/attachments/18678077/modext_combobox_grid.png?version=1&modificationDate=1250518045000)

## Уникальные параметры

Уникальные параметры для класса - это просто сквозные параметры к хранилищам данных для комбинации:

Название | Описание | По умолчанию
--- | --- | ---
url | URL к коннектору. | 
baseParams | Любые другие параметры всегда отправлять на коннектор. | {}
fields | Поля в формате массива ожидаются в ответе коннектора. | []

Класс также наследует все свойства [Ext.form.ComboBox](http://extjs.cachefly.net/ext-3.3.0/docs/?class=Ext.form.ComboBox).

## Использование Grid Renderer

MODx.combo.ComboBox также поставляется со встроенным средством визуализации для использования в сетках. Для использования в определении модели столбца вашей сетки просто укажите renderer: true в определении редактора, например:

```javascript
{
  header: _('usergroup')
  ,dataIndex: 'usergroup'
  ,width: 140
  ,editor: { xtype: 'modx-combo-usergroup' ,renderer: true}
}
```

Примером combo box со списком локальных данных будет:

### Combo Box со списком единиц

```javascript
Doodles.combo.Units = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.ArrayStore({
            id: 0
            ,fields: ['unit','display']
            ,data: [
                ['MB','Megabyte']
                ,['GB','Gigabyte']
                ,['TB','Terabyte']
                ,['PB','Petabyte']
                ,['EB','Exabyte']
                ,['ZB','Zettabyte']
                ,['YB','Yottabyte']
            ]
        })
        ,mode: 'local'
        ,displayField: 'display'
        ,valueField: 'unit'
    });
    Doodles.combo.Units.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.combo.Units,MODx.combo.ComboBox);
Ext.reg('doodle-combo-units',Doodles.combo.Units);
```

«store» используется для создания ваших «полей» и «данных», необязательный «mode» должен быть установлен в «local» для этого метода.

И чтобы просмотреть это поле со списком:

### Вызов Combo Box из сетки

```javascript
       {
            header: _('unit')
            ,dataIndex: 'unit'
            ,sortable: false
            ,width: 50
            ,editor: { xtype: 'doodle-combo-units', renderer: true }
        }
```

### Вызов Combo Box из окна

```javascript
       {
            xtype: 'doodle-combo-units'
            ,fieldLabel: _('unit')
            ,name: 'unit'
            ,hiddenName: 'unit'
            ,anchor: '100%'
        }
```

hiddenName должно быть установлено при вызове из окна создания или обновления, чтобы сохранить значение, но не требуется в виде сетки.
