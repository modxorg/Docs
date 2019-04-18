---
title: MODx.msg
translation: extending-modx/custom-manager-pages/modext/modx.msg
---

## MODx.msg

**Расширяет:** Ext.Component

**Основные характеристики:** Особенности коннектора AJAX.

![](/download/attachments/18678080/confirm.png?version=1&modificationDate=1302195122000)

Класс MODx.msg обеспечивает функциональность класса Ext.MessageBox с дополнительным преимуществом использования функции обратного вызова AJAX (для диалогов подтверждения). Просто предоставьте URL и дополнительные параметры, и запрос коннектора будет отправлен после того, как пользователь подтвердит запрос. По умолчанию минимальная ширина составляет 200 пикселей.

## Методы

### alert

> MODx.msg.alert(title,text,fn,scope)

Используется для отображения диалогового окна предупреждения на странице. Пример:

```javascript
MODx.msg.alert('Предупреждение!','Недостаточно места! Мы должны очистить кэш.',function() {
  MODx.clearCache();
},MODx);
```

### confirm

> MODx.msg.confirm(config)

Загружает диалоговое окно подтверждения, которое запрашивает у пользователя ответ Да / Нет. Если выбрано «Да», AJAX-запрос запускается на определенный коннектор. Свойства для параметра config:

Название | Описание
--- | ---
title | Название окна подтверждения.
text | Текст в поле подтверждения.
url | URL-адрес для отправки запроса AJAX.
params | Параметры REQUEST для отправки вместе с запросом AJAX.
listeners | Любые обработчики, которые надо найти по запросу.

Пример:

```javascript
MODx.msg.confirm({
   title: 'Вы уверены?',
   text: 'Вы точно хотите уничтожить этот мир? Это необратимо.',
   url: 'http://rest.endofdays.com/armageddon/',
   params: {
      deleteWorld: true
   },
   listeners: {
        'success':{fn: function(r) {
             MODx.clearCache(); /* Очистить кэш после разрушения мира, чтобы у нас не было скрытых данных */
        },scope:true}
   }
});
```

#### MODx.msg.confirm Пользовательские события

MODx.msg.confirm добавляет несколько пользовательских событий, которые запускаются:

Название | Описание
--- | ---
success | Запускается при успешном ответе на отправку AJAX.
failure | Запускается при неудачном ответе на отправку AJAX.
cancel | Запускается, когда пользователь отменяет диалог подтверждения.

### status

```javascript
MODx.msg.status(opt)
```

Загружает временное сообщение о состоянии в правом верхнем углу экрана, которое затем исчезает. Свойства для параметра opt:

Название | Описание | Значение по умолчанию
--- | --- | ---
title | Необязательно. Название сообщения. | 
message | Текст сообщения о состоянии. | 
dontHide | Если true, не будет автоматически скрывать статусное сообщение. Останется, пока не будет нажата кнопка. | ложный
delay | Количество секунд, в течение которых будет отображаться сообщение. | 1,5

Вы можете использовать этот метод на пользовательских страницах менеджера, чтобы подтвердить, что ваш объект был сохранен. Вы можете добавить что-то вроде этого в определение FormPanel:

```javascript
        listeners: {
            'success': function (res) {
                MODx.msg.status({
                    title: _('save_successful'),
                    message: res.result['message'],
                    delay: 3
                });
            }
        }
```

Обработчик 'success' является частью modExt и поставляется с [MODx.FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel "MODx.FormPanel").

## Смотрите также

1. [MODExt MODx Object](extending-modx/custom-manager-pages/modext/modext-modx-object)
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
