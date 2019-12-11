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

MODx.FormPanel добавляет несколько дополнительных событий, которых нет в объектах Ext.FormPanel:

| Название     | Описание                                                                                                                                                       |
| ------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| beforeSubmit | Вызывается перед отправкой формы с 3 параметрами: - форма - объект Ext.form.BasicForm, прикрепленный к этой FormPanel                                          |
| options      | Любые параметры, переданные вызову submit()                                                                                                                    |
| config       | Объект конфигурации FormPanel                                                                                                                                  |
| failure      | Вызывается при ошибке формы или реакции на ошибку процессора с 4 параметрами: - результат - объект ответа, отправленный из процессора                          |
| form         | Объект Ext.form.BasicForm, прикрепленный к этому FormPanel                                                                                                     |
| options      | Любые параметры, переданные вызову submit()                                                                                                                    |
| config       | Объект конфигурации FormPanel                                                                                                                                  |
| fieldChange  | Запускается при изменении поля со следующими параметрами: - field - объект Ext.Field, который изменяется                                                       |
| nv           | Новое значение поля                                                                                                                                            |
| ov           | Старое значение поля                                                                                                                                           |
| form         | BasicForm, прикрепленный к этой панели формы                                                                                                                   |
| postReady    | Запускается после запуска обработчиков события «ready» (которые должны запускаться расширением классов)                                                        |
| ready        | Не запускается; должен запускаться расширенными объектами MODx.FormPanel, чтобы разрешить запуск событий fieldChange/postReady.                                |
| setup        | Срабатывает в начале загрузки FormPanel и после успешной отправки.                                                                                             |
| success      | Запускается при успешной отправки формы с ответом об успешной обработке от процессора с 4 параметрами: - результат - объект ответа, отправленный из процессора |
| form         | Объект Ext.form.BasicForm                                                                                                                                      |
| options      | Любые параметры, переданные вызову submit()                                                                                                                    |
| config       | Объект конфигурации FormPanel                                                                                                                                  |

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
- showField(name) - показывает поле с переданным именем, если оно скрыто
- setLabel(name, text) - установить метку поля для указанного текста.

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
