---
title: "MIGX: inline-редактирование в сетке"
translation: "extras/migx/migx.tutorials/using-grid-inline-editing"
description: "Настройка MIGX TV с редактируемыми ячейками сетки в MIGX 2.9 и новее"
---

Доступно в MIGX 2.9 и новее.

Черновая версия. Вы можете улучшить оформление.

Создайте MIGX TV с редактируемыми ячейками сетки:

Создайте новую MIGX TV.
В параметрах ввода укажите в поле:

configurations: editablegridcells

Назначьте TV вашему шаблону.

Перейдите в MIGX CMP на вкладку MIGX.
Создайте новую конфигурацию:

Вкладка «Settings» (Настройки):

name: editablegridcells
unique MIGX ID: editablegridcells
Отметьте флажок «add items directly» (добавлять элементы напрямую).

Вкладка «Columns» (Столбцы):
Создайте столбцы:

Header: Text
Field: text
Cell-Editor: this.textEditor

Header: Listbox
Field: listbox
Cell-Editor: this.listboxEditor

Header: Checkbox
Field: checkbox
Renderer: this.renderSwitchStatusOptions
onClicK: switchOption

Добавьте три RenderOptions:

name: checkbox\_inactive
value: 0
image: assets/components/migx/style/images/cb\_empty.png

name: checkbox\_active
value: 1
image: assets/components/migx/style/images/cb\_ticked.png

и как запасной вариант для других значений:

name: checkbox\_fallback
Отметьте флажок «use as fallback» (использовать как запасной вариант)
value:
image: assets/components/migx/style/images/cb\_empty.png

На вкладке «Handlers» отметьте «this.handleColumnSwitch».

На вкладке «Formtabs» (Вкладки формы):

Создайте вкладку с заголовком «Fields» (Поля).
Создайте три поля:

Fieldname: text
Caption: Text

Fieldname: listbox
Caption: Listbox
input TV type: listbox
Input Option Values: Value A||Value B||Value C||Value D

Fieldname: checkbox
Caption: Checkbox
input TV type: checkbox
Input Option Values: active==1
Default Value: 0

Inline-редактирование:
Дважды щёлкните по ячейке.
В TextEditor нужно нажать Enter, чтобы принять новое значение.

Редактирование или удаление нескольких элементов сразу:
Выберите несколько строк (используйте Shift или Ctrl + левый щелчок мыши).
Выполните inline-редактирование.
