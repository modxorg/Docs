---
title: "Управление дочерними ресурсами в grid-TV с помощью MIGXdb"
description: "TV с сеткой дочерних ресурсов: добавление, редактирование, фильтры и TV на форме"
translation: "extras/migxdb/migxdb.tutorials/manage-child-resources-in-a-grid-tv-with-help-of-migxdb"
---

Когда в дереве ресурсов слишком много записей, управлять ими неудобно. Хочется постраничную сетку.

В этом учебнике вы создадите TV с сеткой дочерних ресурсов. В ней можно добавлять, удалять, редактировать, публиковать, снимать с публикации, фильтровать и массово обновлять дочерние ресурсы родительской папки.

Сначала настроите базовую конфигурацию: добавление дочерних ресурсов и редактирование pagetitle, longtitle и content.
Потом добавите TV на форму и фильтры для дочерних ресурсов.

## Требования

Установите [MIGX](extras/migx "MIGX") через Package Management, если ещё не установлен, и выполните [базовую настройку](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").
Минимальная версия MIGX: 2.2.3 (31.07.2012)
Также установите последний пакет [migxchildresources](https://github.com/Bruno17/migxchildresources/tree/master/packages) с GitHub

## Импорт конфигурации

Импортируйте пример конфигурации для MIGXdb-TV.

Откройте главную вкладку «MIGX»

Должна быть сетка с кнопками сверху.

Нажмите «Import from package»

В окне введите: «migxchildresources»

Нажмите «Ok»

В сетке появится импортированная запись.

Проверьте: правый клик -> «edit», пройдите по вкладкам и вложенным сеткам.

## Шаблоны для родителя и дочерних ресурсов

Все дочерние ресурсы должны использовать заданный шаблон. Значение шаблона нужно задать явно.

Создайте шаблон для дочерних ресурсов. Запомните его ID для конфигурации.

Это можно сделать скрытым полем в форме.
Шаги:

1. Правый клик по записи childstutorial в сетке конфигуратора MIGX -> «Edit»
2. Вкладка «formtabs»
3. Правый клик по «Resource» -> «Edit»
4. Правый клик по «template» -> «Edit»
5. Вкладка «Input Options», в Default-Value укажите ID шаблона дочерних ресурсов.
6. Нажмите done, done, done во всех трёх окнах.

Создайте отдельный шаблон для родительского ресурса. Он будет держать grid TV.

## Создание MIGXdb-TV

Создайте MIGXdb-TV.
Создайте новый TV.
Name: **childstutorial**

Вкладка: «Input Options»

Input Type: «migxdb»
В «Configurations» добавьте: «childstutorial»

MIGX будет искать конфигурации с именем «childstutorial». Это могут быть записи конфигурации или php-файлы, как в CMP конфигураций MIGX. CMP конфигураций MIGX сам по себе является MIGXdb-CMP.

Привяжите TV «childstutorial» к шаблону родительского ресурса.

Нажмите «Save».

## Создание и редактирование дочерних ресурсов

Создайте родительский ресурс в дереве с шаблоном родителя.

Откройте вкладку TV.
Нажмите «Load grid». Загрузится сетка, где можно добавлять, редактировать и удалять дочерние ресурсы.

Базовое управление дочерними ресурсами готово и покрывает минимальные задачи.

При использовании сетки на вкладке TV не включайте «autoload» (вкладка MIGXdb Settings конфигуратора MIGX). Сетка не займёт полную ширину, см. <https://github.com/Bruno17/MIGX/issues/75#issuecomment-15505640>

Часть следующих шагов уже выполнена при импорте конфигурации. Они оставлены в учебнике для документирования процесса.

## Добавление TV на форму

Добавьте три TV на форму:

- MIGX-TV для изображений дочернего ресурса
- Text-TV для поля Price
- Multiselect-TV для выбора одной или нескольких категорий

### MIGX-TV для изображений

Создайте TV:

- Name: **images**
- Type: **migx**
- Formtabs:

``` json
[
{"caption":"Image", "fields": [
    {"field":"title","caption":"Title","description":"Title for the image."},
    {"field":"image","caption":"Image","inputTVtype":"image"}
]}
]
```

Grid Columns:

``` json
[
{"header": "Title", "width": "160", "sortable": "true", "dataIndex": "title"},
{"header": "Image", "width": "50", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"}
]
```

"Add Item" Replacement: Add Image

### Text-TV для поля Price

Name: price
Type: text

### Multiselect-TV для категорий

- Name: **categories**
- Type: **listbox multiple**
- Input-option-values: `---==||categoryA||categoryB||categoryC||categoryD`

Добавьте эти TV в шаблон дочерних ресурсов, но не в шаблон родителя!

### Добавление TV на форму

Откройте компонент управления MIGX, вкладка «MIGX» -> правый клик по записи «childstutorial» -> «edit» -> «Formtabs» -> «Add Item»

- caption: **TVs**
- fields: -> Add three items

- fieldname: **price**
- caption: **Price**

- fieldname: **images**
- caption: **Images**
- iputTV: **images**

- fieldname: **categories**
- Caption: **Categories**
- inputTV: **categories**

Сохраните через ->Done

### Регистрация TV для процессоров (getlist, fields)

Зарегистрируйте TV для процессоров getlist и fields.
Создайте конфиг-файл в `/core/components/migx/configs/`

с тем же именем, что конфигурация MIGX: `childstutorial.config.inc.php` (обычно уже есть в пакете MIGX) с содержимым:

>/core/components/migx/configs/childstutorial.config.inc.php

``` php
<?php
$this->customconfigs['includeTVs'] = 1;
$this->customconfigs['includeTVList'] = 'price,images,categories';
```

Все TV, которые вы редактируете или показываете в сетке, должны быть в includeTVList.

Имена TV и полей не должны содержать точки «.». Точки зарезервированы для extended fields и дают неожиданное поведение в MIGXdb, см. <http://forums.modx.com/thread/83428/strange-issue-migxdb-childresources-tutorial-tvs-not-saved#dis-post-460312> Имена полей и TV должны совпадать.

## Сортируемая колонка price в сетке

Вкладка «Columns» -> «Add Item»

- Header: **Price**
- Field: **price**
- width: **20**
- sortable: **yes**

Теперь TV можно обновлять в окне редактора сетки.

## Добавление фильтров

Добавьте фильтры в сетку.

- Textbox для поиска по `pagetitle`, `longtitle` и `content`
- Dropdown для фильтра по категории

Откройте конфигурацию childstutorial в управлении MIGX, вкладка **DB-Filters**, **Add Item**.

### Textbox для поиска по полям

- filter Name: **search**
- label: **search**
- empty text: **search...**
- getlist-where:

``` json
{"pagetitle:LIKE":"%[[+search]]%","OR:longtitle:LIKE":"%[[+search]]%","OR:content:LIKE":"%[[+search]]%"}
```

### Dropdown для фильтра по категориям

- filter Name: **category**
- label: **category**
- empty text: **- category filter -**
- filter type: **combobox**
- getlist-where:

``` php
tvFilter::categories=inArray=[[+category]]
```

- getcombo processor: **getTVcombo**
- getcombo textfield: categories (процессор getTVcombo берёт input-options TV **categories** для dropdown)

Сохраните через **Done** во всех окнах

Теперь можно фильтровать дочерние ресурсы поиском и/или категорией

## Скрытие дочерних ресурсов в дереве

Скрыть дочерние ресурсы в дереве просто.

В конфигураторе MIGX добавьте поле на одну из formtabs:

- Fieldname: `show_in_tree`
- Caption: **Show in Tree**
- inputTVtype: **listbox**
- inputOptionValues: `no==0||yes==1`

Статус поля можно показать в сетке новой колонкой:

- Header: **Show in Tree**
- Field: `show_in_tree`
- width: `20`
- Renderer: `this.RenderCrossTick`
