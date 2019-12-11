---
title: "MODx.tree.Tree"
translation: "extending-modx/custom-manager-pages/modext/modx.tree.tree"
---

## MODx.tree.Tree

**Расширяет:** Ext.tree.TreePanel

**Основные характеристики:** Удаленно загруженные панели инструментов; перетаскивание для полей формы; функциональность коннектора для удаления и перетаскивания/сортировки.

![](/2.x/en/extending-modx/custom-manager-pages/modext/modext_tree.png)

Деревья предоставляют быстрый и простой способ отображения нескольких уровней объектов, которые имеют отношения родитель-ребенок, таких как пользователи или ресурсы.

## Уникальные параметры

MODx.tree.Tree имеет несколько дополнительных параметров, которых нет в объектах Ext.tree.TreePanel

| Название             | Описание                                                                                                                                                                                                                       | Значение по умолчанию |
| -------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | --------------------- |
| url                  | URL, на который указывает загрузчик дерева. Необязательно, если вы передаете в параметре данных.                                                                                                                               |
| rootName             | Текст корневого узла, если rootVisible имеет значение true.                                                                                                                                                                    |
| rootId               | Идентификатор корневого узла.                                                                                                                                                                                                  | root                  |
| data                 | Необязательно; если URL не задан, данные должны быть загружены сюда.                                                                                                                                                           | []                    |
| remoteToolbar        | Если true, загрузит панель инструментов дерева через данные, загруженные удаленно.                                                                                                                                             | false                 |
| remoteToolbarUrl*    | URL-адрес коннектора для загрузки панели инструментов. По умолчанию используется URL-адрес дерева.                                                                                                                             |
| remoteToolbarAction* | Действие процессора для загрузки панели инструментов.                                                                                                                                                                          | getToolbar            |
| useDefaultToolbar    | Если remoteToolbar имеет значение false, будет загружена панель инструментов по умолчанию, которая содержит пункты "развернуть все", "свернуть все" и "обновить". Элементы, переданные в свойство tbar, будут добавлены после. | false                 |
| menuConfig           | Объект config для передачи в контекстное меню, загруженное для этого дерева.                                                                                                                                                   |
| expandFirst          | Если true, развернет узлы первого уровня при рендеринге.                                                                                                                                                                       | true                  |
| removeAction*        | Действие процессора при удалении узла.                                                                                                                                                                                         | remove                |
| removeTitle*         | Заголовок для диалога удаления при удалении узла.                                                                                                                                                                              | Предупреждение!       |
| primaryKey           | Первичный ключ для узла. Обычно это идентификатор.                                                                                                                                                                             | id                    |
| sortAction           | Действие процессора при сортировке узлов с помощью перетаскивания.                                                                                                                                                             | sort                  |
| toolbarItemCls*      | Класс CSS, добавляемый к загруженным элементам remoteToolbar.                                                                                                                                                                  | x-btn-icon            |

- = Только для MODX Revolution версии 2.1 и выше

## Пользовательские события

Пользовательские события, запускаемые MODx.tree.Tree:

| Название   | Описание                                                                                                                             |
| ---------- | ------------------------------------------------------------------------------------------------------------------------------------ |
| beforeSort | Запускается до того, как дерево отправит отсортированные узлы процессору сортировки. Передаются отсортированные узлы, закодированно. |
| afterSort  | Запускается после сортировки узла дерева. Проходит: - событие - событие бросания                                                     |
| result     | Объект ответа от процессора сортировки.                                                                                              |

## Другие уникальные особенности

### Сортировка

Сортировка автоматически включается по умолчанию в объектах MODx.tree.Tree. Чтобы отключить, установите для enableDD значение false в вашей конфигурации. После перетаскивания дерево запустит закодированные узлы в процессор сортировки с тем же коннектором, что и у URL дерева.

### Загрузка удаленной панели инструментов

Панели инструментов могут быть загружены удаленно, используя параметр конфигурации remoteToolbar. Это загрузит данные из процессора, загруженного конфигурационной переменной remoteToolbarAction, которая по умолчанию имеет значение «getToolbar».

### Перетаскивание в поля MODx.FormPanel

Узлы можно перетаскивать в поля MODx.FormPanel, предполагая, что в конфигурационную переменную передается следующее

```javascript
,enableDD: true
,ddGroup: 'modx-treedrop-dd'
```

и что у узла есть атрибут 'type', который является одним из следующих значений: modResource, сниппет, chunk, tv, file.

## Смотрите также

1. [Объект MODExt MODx](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Учебники](extending-modx/custom-manager-pages/modext/modext-tutorials)
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
