---
title: "Getting started with PHP in MODX"
_old_id: "1116"
_old_uri: "2.x/case-studies-and-tutorials/php-coding-in-modx-revolution,-pt.-i"
description: "Working with xPDO: objects, collections and the database schema in MODX"
---

Revolution's data layer is [xPDO](http://www.xpdo.org/ "xPDO Homepage"), an object relational bridge by Jason Coward. Every database table is a PHP object: Chunks are `modChunk`, Snippets are `modSnippet`, and so on.

## The Simple How

The current API is a handful of methods. MODX 1.x and earlier needed a separate function per case:

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

This block is history, kept for reading old code: `$modx->getDocument()` and `$modx->db` do not exist in MODX 3. `$modx->getChunk()` still works, but the modern API is `getObject()`/`getCollection()` below.

The same jobs with the current API:

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

## The Model

The class-to-table map lives in `core/model/schema/modx.mysql.schema.xml`, which lists every MODX table as XML. For example, modChunk:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="MODX\Revolution\modElement">
    <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
    <field key="description" dbtype="varchar" precision="255" phptype="string" null="false" default="Chunk" />
    <field key="editor_type" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
    <field key="category" dbtype="int" precision="11" phptype="integer" null="false" default="0" index="fk" />
    <field key="cache_type" dbtype="tinyint" precision="1" phptype="integer" null="false" default="0" />
    <field key="snippet" dbtype="mediumtext" phptype="string" />
    <field key="locked" dbtype="tinyint" precision="1" attributes="unsigned" phptype="boolean" null="false" default="0" index="index" />
    <field key="properties" dbtype="text" phptype="array" null="true" />
    <field key="static" dbtype="tinyint" precision="1" attributes="unsigned" phptype="boolean" null="false" default="0" index="index" />
    <field key="static_file" dbtype="varchar" precision="255" phptype="string" null="false" default="" />

    <alias key="content" field="snippet" />

    <aggregate alias="Category" class="MODX\Revolution\modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
</object>
```

An Extra defines a schema of its own and registers it as a package. The `<object>` tag maps one class to one table:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="MODX\Revolution\modElement">
```

`class` is the PHP class name, `table` the MySQL table, `extends` the parent class (`MODX\Revolution\modElement` in 3.x — the base class of all Elements: Snippets, Chunks, Templates and the rest).

``` xml
<field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
```

Each `<field>` tag maps one table column: `key` is the column, `dbtype` and `precision` the database type, `phptype` the PHP type, `index` the index to build.

``` xml
<aggregate alias="Category" class="MODX\Revolution\modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
```

Relations between objects come in two kinds:

- **Aggregate** — the related object outlives this one: deleting the Chunk does not delete the Category.
- **Composite** — the related objects are owned and, when the relation is dependent, deleted with this one.

As an aggregate example, all ContextSettings of a Context:

``` php
$context = $modx->getObject('modContext','web');
$settings = $context->getMany('ContextSetting');
foreach ($settings as $setting) {
    echo 'Setting name: '.$setting->get('key').' <br />';
    echo 'Setting value: '.$setting->get('value').' <br />';
}
```

Creating and removing objects, joins, limits and sorting are covered in [the next article](extending-modx/getting-started/tutorial/part-2).

## See Also

- [xPDO: Defining a Schema](extending-modx/xpdo/custom-models/defining-a-schema "Defining a Schema")
- [xPDO: Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
