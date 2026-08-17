---
title: "Создание таблиц через MIGX"
description: "Быстрое создание пользовательской таблицы и xPDO-модели через Package Manager MIGX"
translation: "extras/migxdb/migxdb.tutorials/creating-tables"
---

Новички часто спрашивают, как быстро создать таблицу и начать с ней работать по примеру из сниппета. Раньше я делал это через пакет modExtra, вырезая лишнее. Это долго и неудобно, если нужна одна-две таблицы. MIGX решает эту задачу.

Установите MIGX и откройте его. На вкладке Package Manager введите имя пакета:

![](creating-tables-through-migx-1.png)

Нажмите Create Package. В каталоге `core/components/youpackagename` появятся нужные файлы.
Теперь опишите схему будущей таблицы или таблиц. Подробно это разобрано в одном из курсов Basil. Есть и официальная документация.

Создадим простую таблицу-пример:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="electrica" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" phpdoc-package="" phpdoc-subpackage="" version="1.1">
    <object class="electricaItem" table="electrica_items" extends="xPDOSimpleObject">
        <field key="title" dbtype="varchar" phptype="string" precision="100" null="false" default="" />
        <field key="description" dbtype="text" phptype="string" null="false" default="" />
    </object>
</model>
```

Вставьте схему на вкладку Xml Scheme и нажмите Save Scheme:

![](creating-tables-through-migx-2.png)

Схема готова. Перейдите на вкладку Create Table и нажмите Create Tables. Таблица появится в базе данных:

![](creating-tables-through-migx-3.png)

Готово. Теперь можно работать с таблицей.

``` php
<?php
// Add a package
if(!$modx->addPackage('electrica', MODX_CORE_PATH . 'components/electrica/model/')){
    return 'false';
}
// Create a record
$table = $modx->newObject('electricaItem');
$array = [
    'title' => 'What is the title',
    'description' => 'What is the description'
    ];

$table->fromArray($array);
$table->save();

// Do a sample
$response = $modx->getIterator('electricaItem');

foreach($response as $res){
    print_r($res->toArray());
}
```

Так вы быстро создаёте свои таблицы и работаете с ними.
