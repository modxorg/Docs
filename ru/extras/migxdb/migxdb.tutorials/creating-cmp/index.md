---
title: "Создание CMP для вывода в админ-панель"
description: "Настройка Custom Manager Page в MIGX для редактирования данных пользовательской таблицы"
translation: "extras/migxdb/migxdb.tutorials/creating-cmp"
---

В прошлой статье я показал, как создать компонент через MIGX. Теперь покажу, как создавать и редактировать данные в админ-панели.

Если вы не в курсе, сначала прочитайте [первую статью](extras/migxdb/migxdb.tutorials/creating-tables).

Создание своей страницы по сути не отличается от настройки обычного MIGX TV.

Перейдите на вкладку MIGX:

![](creating-cmp-1.png)

Заполните:

**Name**: electrica
**Add item replacement**: Create string
**unique MIGX ID**: electrica

Откройте вкладку CMP-Settings и заполните:

![](creating-cmp-2.png)

Перейдите на вкладку **MIGXdb-Settings** и укажите **package** (имя пакета с XML-разметкой) и **Classname**:

![](creating-cmp-3.png)

Нажмите **Save**.

Затем откройте settings - Menu. Создайте пункт меню:

![](creating-cmp-4.png)

В parameters укажите имя вашей конфигурации компонента.

Готово, страницу можно открыть:

![](creating-cmp-5.png)

Дальше выводим все поля.

Редактируем конфигурацию MIGX и добавляем contextmenus:

![](creating-cmp-6.png)

На вкладке **Columns** укажите поля:

**ВАЖНО!!!** В columns нужно создать поле id, иначе данные не получится редактировать

![](creating-cmp-7.png)

На вкладке Formtabs укажите поля:

![](creating-cmp-8.png)

Готово!

![](creating-cmp-9.png)

Вывод на фронт уже описан в [предыдущей статье](extras/migxdb/migxdb.tutorials/creating-tables). Создайте сниппет и сделайте нужную выборку.

Или используйте **snippet**:

``` php
[[!migxLoopCollection?
    &packageName=`electrica`
    &classname=`electricaItem`
    &tpl=`testTPL`
]]
```

**Chunk**:

``` php
<h1>[[+title]]</h1>
<p>[[+description]]</p>
```

Результат:

![](creating-cmp-10.png)
