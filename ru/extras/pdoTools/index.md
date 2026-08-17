---
title: "pdoTools"
translation: "extras/pdoTools"
---

После чистой установки MODX часто ставят набор extras для функциональности сайта.

Обычный набор знаком:

* **getResources** для списков документов
* **getPage** для пагинации списков
* **Wayfinder** для меню
* **Breadcrumb(s)** для хлебных крошек
* **GoogleSitemap** для sitemap

Всё это можно заменить одним пакетом: **pdoTools**.

Ниже краткий обзор возможностей.

## 9 сниппетов

Серьёзно. В pdoTools 9 сниппетов, которых хватает почти для любого обычного сайта. Большинство из них можно поставить вместо популярных аналогов.

### pdoResources

pdoResources заменяет getResources.
Как и остальные сниппеты pdoTools, он не использует объекты xPDO для вывода ресурсов. Работает напрямую с таблицами БД.
Так быстрее. Не нужно переводить даты ресурсов в timestamps перед фильтром `date`.
TV подключаются только нужные, поэтому перечисляйте их в `&includeTVs` через запятую.

```php
[[!pdoResources?
    &parents=`0`
    &includeTVs=`my_tv1,my_tv2`
    &tvPrefix=`tv.`
    &processTVs=`1`
    &includeContent=`1`
    &showLog=`1`
]]
```

Одно из важных свойств pdoTools: `&showLog`.
По нему видно, насколько быстр сниппет. Тормозит SQL или слишком сложный чанк?
`&showLog` помогает это увидеть.

[![](https://file.modx.pro/files/d/9/3/d931de6c3c2f67be8879c1765e833bbcs.jpg)](https://file.modx.pro/files/d/9/3/d931de6c3c2f67be8879c1765e833bbc.png)

Вторая важная возможность: SQL joins. Через pdoTools собирают сложные запросы и выбирают только нужное.

```php
[[!pdoResources?
    &parents=`0`
    &class=`modResource`
    &leftJoin=`{
        "Parent": {
            "class": "modResource",
            "on": "modResource.parent = Parent.id"
        },
        "CreatedBy": {
            "class": "modUserProfile",
            "on": "modResource.createdby = CreatedBy.internalKey"
        }
    }`
    &select=`{
        "modResource": "modResource.id, modResource.pagetitle",
        "Parent": "Parent.pagetitle as parent",
        "CreatedBy": "CreatedBy.fullname as author"
    }`
    &showLog=`1`
]]
```

В примере выше не нужны отдельные сниппеты и output filters, чтобы получить родителя ресурса или имя автора.
Насколько быстро? Смотрите лог.

[![](https://file.modx.pro/files/0/4/5/04558020e2a34bd6e94fe734db1b6ae3s.jpg)](https://file.modx.pro/files/0/4/5/04558020e2a34bd6e94fe734db1b6ae3.png)

Есть и другие фичи, но эти две главные.

### pdoPage

pdoPage заменяет getPage. Отличия от getPage:

1. Пустые страницы не показывает. Нет результатов или пользователь вручную открыл неверную страницу: редирект на первую.
2. Есть `&maxLimit`, по умолчанию 100. Пользователь не сможет замедлить сайт через `&limit=100000` в URL. Если у вас getPage, попробуйте так на своём сайте.
3. В header страницы ставит metatags previous/next для краулеров.
4. Есть встроенная ajax-пагинация. Пример:

```php
<div id="pdopage">
    <div class="rows">
        [[!pdoPage?
            &parents=`0`
            &ajaxMode=`default`
        ]]
    </div>
    [[!+page.nav]]
</div>
```

Разметку можно менять дополнительными параметрами сниппета.

### pdoMenu

Этот сниппет может заменить Wayfinder. Работает похоже, но чуть быстрее.

Так как объекты xPDO обходятся, права пунктов меню проверяйте вручную специальным свойством:

```php
[[!pdoMenu?
    &parents=`0`
    &checkPermissions=`list`
]]
```

По умолчанию проверки прав выключены. Это свойство, кстати, есть у всех сниппетов pdoTools.

### pdoUsers

Сниппет выводит пользователей сайта. Фильтруйте по группам и ролям:

```php
[[!pdoUsers?
    &groups=`Authors`
    &sortdir=`asc`
]]
```

Можно совместить с **pdoPage** для списка с пагинацией:

```php
[[!pdoPage?
    &element=`pdoUsers`
    &groups=`Authors`
    &roles=`Member`
    &sortby=`id`
    &sortdir=`asc`
]]
[[!+page.nav]]
```

Плейсхолдеры: все поля объектов `modUser` и `modUserProfile`.
Чтобы увидеть их, задайте пустой `&tpl` (или не задавайте, если у сниппета нет tpl по умолчанию).

[![](https://file.modx.pro/files/0/a/d/0ad486c2c7412ad9a32c25f9027b3962s.jpg)](https://file.modx.pro/files/0/a/d/0ad486c2c7412ad9a32c25f9027b3962.png)

Пустой `&tpl` это ещё одна общая фича всех сниппетов pdoTools.

### pdoSitemap

pdoSitemap строит быстрый sitemap. Ресурс не обязан быть XML, если включено `&forceXML` (по умолчанию).

Данные кэшируются. Ключ кэша зависит от параметров сниппета, но можно задать свой.

Чтобы оценить скорость, отключите `&forceXML` и включите `&showLog`.
На моём сайте первый прогон около 30 секунд, второй около 0.03:

```php
[[!pdoSitemap?
    &forceXML=`0`
    &showLog=`1`
]]
```

В sitemap **6873** ресурса.

[![](https://file.modx.pro/files/0/d/3/0d3b7798fd8464ee2bb39fbb481e3902s.jpg)](https://file.modx.pro/files/0/d/3/0d3b7798fd8464ee2bb39fbb481e3902.png)

[![](https://file.modx.pro/files/1/9/1/1916b6d00e0c7e77e0119c29f1d3aba6s.jpg)](https://file.modx.pro/files/1/9/1/1916b6d00e0c7e77e0119c29f1d3aba6.png)

### pdoNeighbors

Сниппет для ссылок на предыдущую, следующую и родительскую страницы текущего документа.

```php
[[!pdoNeighbors?
    &sortby=`menuindex`
    &sortdirc=`desc`
]]
```

Просто соседи.

### pdoCrumbs

Мой вариант простого сниппета хлебных крошек. Ничего необычного, кроме ядра pdoTools с быстрыми чанками и выборкой данных.

```php
[[!pdoCrumbs]]
```

### pdoTitle

Сниппет собирает тег `title` страниц. Вызывает **pdoCrumbs** и показывает путь к текущему документу в title.

```php
<title>[[!pdoTitle]] / [[++site_name]]</title>
```

По умолчанию поддерживает **pdoPage**, поэтому в title видно номер страницы.

```php
<title>Questions / page 5 from 593 / Sections / mysite.com</title>
```

Краулеры это любят.

[![](https://file.modx.pro/files/a/e/f/aef145845f8c84ad6bc104fe31e6d796s.jpg)](https://file.modx.pro/files/a/e/f/aef145845f8c84ad6bc104fe31e6d796.png)

### pdoField

И наконец pdoField: любое поле любого ресурса.
Заменяет и **UltimateParent**, и **getResourceField**.

Пример: нужен `longtitle` ресурса с id = 15

```php
[[pdoField?
    &id=`15`
    &field=`longtitle`
]]
```

Или `pagetitle` «дедушки» текущего документа:

```php
[[pdoField?
    &id=`[[*id]]`
    &field=`pagetitle`
    &top=`2`
]]
```

### Заключение

Все сниппеты pdoTools используют одно ядро, и большинство параметров работает у всех.

Через `&showLog` смотрите, как работают сниппеты. Пустые чанки показывают доступные плейсхолдеры. Таблицы можно join-ить на лету.

pdoTools это библиотека, а не просто набор сниппетов. Многие extras MODX используют pdoTools для своих сниппетов: **miniShop2**, **Tickets**, **BannerY**, **AjaxForm** и другие.

Не забывайте: параметры описаны внутри сниппетов. Откройте сниппет в Менеджере и смотрите вкладку Properties.
