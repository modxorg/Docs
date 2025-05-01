---
title: "Создание CMP для вывода в админку"
translation: "extras/migxdb/migxdb.tutorials/creating-cmp"
---

В прошлой статье я рассказал, как можно создавать свой компонент с помощью MIGX. Теперь я покажу, как можно создавать и редактировать данные в админке.

Кто не знает о чем речь, ссылка на [первую статью](extras/migx/migx.tutorials/creating-tables-through-migx).

На самом деле создание своей странички по сути не отличается от создания обычного MIGX ТВ.

Переходим во вкладку MIGX:

![](creating-cmp-1.png)

Заполняем:

**Name**: electrica
**Add item replacement**: Создать строку
**unique MIGX ID**: electrica

Затем открываем вкладку CMP-Settings и заполняем:

![](creating-cmp-2.png)

Затем идем во вкладку **MIGXdb-Settings** и заполняем **package** (название пакета с XML разметки) и **Classname**:

![](creating-cmp-3.png)

Нажимаем **Save**.

Затем идем в настройки — Меню. Создаем нашел меню:

![](creating-cmp-4.png)

В параметрах пишем свой настройку вашего компонента, как вы его назвали.

Ну вот и все, мы теперь можем его открыть:

![](creating-cmp-5.png)

Продолжаем выводить все наши поля.

Редактируем нашу настройку MIGX, добавляем contextmenus:

![](creating-cmp-6.png)

Во вкладке **Columns** заполняем наши поля:

**ВАЖНО!!!** В колонках нужно создать поле id, иначе вы не сможете редактировать данные

![](creating-cmp-7.png)

Во вкладке Formtabs заполняем наши поля:

![](creating-cmp-8.png)

That's all!

![](creating-cmp-9.png)

Ну а вывод на фронте уже описывал в [предыдущей статье](extras/migx/migx.tutorials/creating-tables-through-migx). Создаем сниппет и делаем нужную нам выборку или вборку.

Ну или можно воспользовать **сниппетом**:

```php
[[!migxLoopCollection?
    &packageName=`electrica`
    &classname=`electricaItem`
    &tpl=`testTPL`
]]
```

**Чанк**:

```php
<h1>[[+title]]</h1>
<p>[[+description]]</p>
```

И вот что мы получили:

![](creating-cmp-10.png)
