---
title: "MODx.Window"
translation: "extending-modx/custom-manager-pages/modext/modx.window"
---

## MODx.Window

**Расширяет:** Ext.Window

**Основные характеристики:** Функция перетаскивания; функциональность коннектора для сохранения.

![](/en/extending-modx/custom-manager-pages/modext/modx-window.png)

Окна MODExt - это удобный способ отображения данных записи из сетки или AJAX-запроса на редактирование. Окна автоматически включают FormPanel, в которую можно добавлять поля формы (и другие компоненты). Отправка/сохранение окна фактически отправляет FormPanel и инициирует запрос AJAX к вашему коннектору.

## Уникальные параметры

| Название      | Описание                                                                                                       | Значение по умолчанию |
| ------------- | -------------------------------------------------------------------------------------------------------------- | --------------------- |
| action        | Если baseParams не установлен, будет использовать это как действие для контроллера.                            |
| allowDrop     | Разрешить или нет перетаскивание элементов дерева на поля формы.                                               | 1                     |
| baseParams    | Объект параметров для отправки вместе с формой окна при сохранении.                                            | {}                    |
| blankValues   | Если true, будет сбрасывать значения формы каждый раз, когда она отображается.                                 | 0                     |
| cancelBtnText | Текст кнопки отмены для окна.                                                                                  | Close (лексикон `cancel`)  |
| fields        | Массив полей для формы, аналогичный определению полей Ext.form.FormPanel.                                      | []                    |
| fileUpload    | Если true, форма будет создана с возможностью приема файлов.                                                   | 0                     |
| formFrame     | Добавлять или нет рамку ext-style в окно.                                                                      | 1                     |
| labelAlign    | Выравнивание надписей на форме.                                                                                | top                   |
| labelWidth    | Ширина в пикселях надписей на форме.                                                                           | 100                   |
| record        | Объект JSON со значениями по умолчанию (в формате name: value) для установки в форму при первой загрузке окна. | {}                    |
| saveBtnText   | Текст кнопки сохранения для окна.                                                                              | Save                  |
| url           | URL-адрес коннектора для отправки формы окна.                                                                  |

## Пользовательские события

| Название     | Описание                                                                                  |
| ------------ | ----------------------------------------------------------------------------------------- |
| success      | Если отправка формы возвращает успешный ответ.                                            |
| failure      | Если отправка формы возвращает ответ об ошибке.                                           |
| beforeSubmit | Перед тем, как форма отправляет свои значения в коннектор, но после прохождения проверки. |
| updateWindow | Запускается после обновления значений формы окна из записи (setValues/reconfigure). |

## Уникальная функциональность

### Запуск метода отправки формы

Вы можете вручную запустить отправку формы окна, запустив метод submit(), который имеет необязательный параметр close (по умолчанию — true: окно закроется после успешного сохранения; передайте false, чтобы оставить окно открытым). Пример:

```javascript
var w = Ext.getCmp('my-window-id');
w.submit();      /* отправить и закрыть окно при успехе (по умолчанию) */
w.submit(false); /* отправить, но оставить окно открытым */
```

### setValues

Класс MODx.Window поставляется с методом setValues, который устанавливает значения формы окна:

```javascript
var w = Ext.getCmp('my-window-id');
w.setValues({
  name: 'Иван'
  ,email: 'my@email.com'
});
```

### reset

Вы можете запустить метод сброса, чтобы очистить (сбросить) все поля в форме:

```javascript
var w = Ext.getCmp('my-window-id');
w.reset();
```

### Скрытие и отображение полей

MODx.Window поставляется с несколькими вспомогательными методами для создания полей в своих формах видимыми или скрытыми. Эти методы принимают объекты полей (а не строки имён):

```javascript
var w = Ext.getCmp('my-window-id');
w.hideField(w.fp.getForm().findField('email'));
w.showField(w.fp.getForm().findField('comments'));
```

## Смотрите также

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [Учебник по MODExt](extending-modx/custom-manager-pages/modext/modext-tutorials)
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
