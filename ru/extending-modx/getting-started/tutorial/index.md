---
title: "Начало работы с PHP в MODX"
translation: "extending-modx/getting-started/tutorial"
---

Многие спрашивают о новой кодовой базе. Удобна ли она для разработчиков? Сильно ли отличается от 0.9.6/Evolution? Поддерживает ли OOP-проекты? Быстрее ли она? Легко ли её освоить?

В этих руководствах мы ответим на эти вопросы: **да**.

Кодовая база Revolution перешла на [xPDO](http://www.xpdo.org/ "xPDO Homepage"), инструмент ORM, созданный Jason Coward. Проще говоря, все таблицы БД теперь представлены объектами PHP (как принято в ORM). Чанки представлены объектами `modChunk`, сниппеты объектами `modSnippet` и т.д.

## Простой способ

Как получить объект в новом MODX? Раньше приходилось опираться на набор разных функций:

``` php
// The old way of doing things in MODx 1.x and earlier
$doc = $modx->getDocument(23);
$doc = $modx->getDocument(45,'pagetitle,introtext');
$chunk = $modx->getChunk('chunkName');

// or even more convoluted
$res = $modx->db->select('id,username',$table_prefix.'.modx_manager_users');
$users = array();
if ($modx->db->getRecordCount($res))
{
   while ($row = $modx->db->getRow($res)) {
       array_push($users,$row);
   }
}
return $users;
```

Больше нет. Всё проще. Вам понадобится всего несколько функций. Примеры:

``` php
// getting a chunk with ID 43
$chunk = $modx->getObject('modChunk',43);

// getting a chunk with name 'TestChunk'
$chunk = $modx->getObject('modChunk',array(
    'name' => 'TestChunk'
));

// getting a collection of chunk objects, then outputting their names
$chunks = $modx->getCollection('modChunk');
foreach ($chunks as $chunk) {
    echo $chunk->get('name')."<br />\n";
}

// getting a resource (i.e. a page) that is published, with a alias of 'test'
$document = $modx->getObject('modResource',array(
    'published' => 1,
    'alias' => 'test',
));
```

## Модель

Где найти соответствие имён таблиц и объектов? В файле `core/model/schema/modx.mysql.schema.xml`. (Обратите внимание на `mysql`: MODX в перспективе будет поддерживать и другие СУБД.) Там XML-представление всех таблиц MODX.

Например, `modChunk`:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
    <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
    <field key="description" dbtype="varchar" precision="255" phptype="string" null="false" default="Chunk" />
    <field key="editor_type" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
    <field key="category" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
    <field key="cache_type" dbtype="tinyint" precision="1" phptype="integer" null="false" default="0" />
    <field key="snippet" dbtype="mediumtext" phptype="string" />
    <field key="locked" dbtype="tinyint" precision="1" attributes="unsigned" phptype="boolean" null="false" default="0" />
    <aggregate alias="Category" class="modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
</object>
```

Вы также можете определить собственные схемы для компонентов и добавить их как пакеты. Об этом в следующей статье. Разберём схему:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
```

Свойство _class_ задаёт имя класса. _table_ показывает таблицу MySQL. _extends_ указывает родительский класс. `modElement` это базовый класс для всех элементов MODX: сниппетов, модулей, чанков, шаблонов и т.д.

``` xml
<field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
```

Этот тег описывает столбец БД. Большинство атрибутов очевидны.

``` xml
<aggregate alias="modCategory" class="modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
```

Здесь начинаются связи БД. **Aggregate** это связь, при которой удаление чанка не удаляет связанную категорию. При **Composite** связи удаление затронуло бы связанный объект. В Composite есть зависимость от другого объекта. Пример: получить все `modContextSettings` для `modContext`:

``` php
$context = $modx->getObject('modContext','web');
$settings = $context->getMany('ContextSetting');
foreach ($settings as $setting) {
    echo 'Setting name: '.$setting->get('key').' <br />';
    echo 'Setting value: '.$setting->get('value').' <br />';
}
```

Просто, правда? Создание и удаление объектов, более сложные запросы (inner join, limit, сортировка и др.) разберём в [следующей статье](extending-modx/getting-started/tutorial/part-2).

## Смотрите также

- [xPDO: Defining a Schema](extending-modx/xpdo/custom-models/defining-a-schema "Defining a Schema")
- [xPDO: Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
