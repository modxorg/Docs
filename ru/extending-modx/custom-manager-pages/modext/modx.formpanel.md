---
title: "MODx.FormPanel"
translation: "extending-modx/custom-manager-pages/modext/modx.formpanel"
---

## MODx.FormPanel

**Расширяет:** Ext.FormPanel

**xtype:** modx-formpanel

**Основные характеристики:** Функция перетаскивания; функция проверки полей на изменения ("dirty"); функциональность коннектора.

Панели FormPanels можно найти в менеджере MODX. Они могут содержать поля формы, сетки, деревья - практически любой доступный компонент.

Они автоматически передают заголовок modAuth и заголовок Powered-By во все отправки форм, которые используются для предотвращения атак XRSF.

Они также автоматически интегрируются в структуру коннекторов MODX. Все, что вам нужно сделать, это передать параметр url в конфигурацию объекта и параметр baseParams для отправки с отправкой формы, а FormPanel обработает все остальное. С процессорами на основе классов MODX версии 2.2+ и $this->addFieldError() MODx.FormPanel также будет правильно обрабатывать зарегистрированные ошибки.

## Уникальные параметры

MODx.FormPanel добавляет несколько уникальных параметров, которых нет в типичных объектах Ext.FormPanel:

| Название       | Описание                                                                                       | Значение по умолчанию |
| -------------- | ---------------------------------------------------------------------------------------------- | --------------------- |
| saveMsg        | Сообщение, отображаемое в диалоговом окне модального ожидания при сохранении.                  | Saving...             |
| allowDrop      | Разрешить бросать предметы из дерева в этой форме.                                             | true                  |
| useLoadingMask | Установите значение true, чтобы использовать маску загрузки при загрузке значений формы.       | false                 |
| onDirtyForm    | Идентификатор формы для проверки измененного состояния формы. По умолчанию используется форма. | this.getForm()        |

## Пользовательские события

События, добавляемые MODx.FormPanel (нет в Ext.FormPanel):

| Название     | Описание                                                                                                             |
| ------------ | -------------------------------------------------------------------------------------------------------------------- |
| beforeSubmit | Перед отправкой формы. Параметры: form (Ext.form.BasicForm), options (параметры submit()), config (конфиг FormPanel) |
| failure      | При ошибке формы или неудачном ответе процессора. Параметры: result (ответ процессора), form, options, config       |
| fieldChange  | При изменении любого поля. Параметры: field (Ext.Field), nv (новое значение), ov (старое), form (BasicForm)          |
| postReady    | После запуска обработчиков события «ready» (которые должны запускаться расширениями классов)                         |
| ready        | Не запускается; должен запускаться расширениями MODx.FormPanel, чтобы разрешились fieldChange/postReady              |
| setup        | В начале загрузки FormPanel и после успешной отправки                                                               |
| save         | После успешной отправки, когда ответ процессора уже обработан                                                       |
| actionNew    | Когда ответ процессора указывает действие «new» (создать ещё одну запись)                                           |
| actionContinue| Когда ответ процессора просит продолжить редактирование той же записи                                              |
| actionClose  | Когда ответ процессора просит закрыть окно после сохранения                                                         |
| failureSubmit| Когда проверка формы не прошла и отправка не была выполнена                                                         |
| success      | При успешном ответе процессора. Параметры: result, form, options, config (как у failure)                            |

## Другие уникальные функции

### Поля области перетаскивания

Все поля в экземплярах MODx.FormPanel автоматически могут содержать элементы, такие как узлы древа ресурсов слева. Вы можете отключить эту функцию с помощью параметра allowDrop.

### Автоматическая обработка измененных полей

Все поля будут вызывать событие fieldChange при их изменении. Вы также можете использовать следующие методы:

- isDirty - проверить общий статус измененного состояния
- clearDirty - очистить измененный статус для всех форм
- markDirty - пометить форму как измененную и запустить событие fieldChange

### Манипуляция с полями

Вы можете легко манипулировать полями и метками в объектах MODx.FormPanel:

- getField(name) - получает объект Ext.Field для указанного имени поля
- hideField(name) - скрывает поле с переданным именем
- showField(name) - показывает поле с переданным именем, если оно скрыто. Примечание: текущая реализация принимает только **массив** имён — передача одиночной строки вызывает TypeError ([#17049](https://github.com/modxcms/revolution/issues/17049)); оберните: `showField(['name'])`. (У [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window) showField/hideField принимают объекты полей.)
- setLabel(name, text) - установить метку поля для указанного текста.
- setMediaSources(name, sources) - привязать источники медиа к полю (используется TV-подобными полями).
- getTabIdsFromKeys(keys) - сопоставить ключи вкладок с их идентификаторами компонентов.
- showErroredTab() - переключиться на первую вкладку, содержащую поле с ошибкой, после неудачной проверки.

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
