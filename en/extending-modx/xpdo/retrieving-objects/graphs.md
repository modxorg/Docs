---
title: "getCollectionGraph"
_old_id: "1171"
_old_uri: "2.x/getting-started/using-your-xpdo-model/retrieving-objects/getcollectiongraph"
---

## What the method does

`getCollectionGraph` loads related objects along with the requested ones, so you read them as objects instead of walking JOIN results by hand. You name the relations to load in a JSON graph passed as the second argument, and xPDO turns the graph into one `LEFT JOIN` per relation.

``` php
$boxes = $xpdo->getCollectionGraph('Box', '{"Owner":{},"Wheels":{}}');
```

Each key is a relation alias from your schema, and each empty object is the list of relations to load below that node. The graph nests, so the related objects of related objects arrive too:

``` php
$tracks = $xpdo->getCollectionGraph('Track', '{"Boxes":{"Wheels":{}}}');
foreach ($tracks as $track) {
    foreach ($track->Boxes as $box) {
        foreach ($box->Wheels as $wheel) {
            echo $track->get('name').': '.$wheel->get('position')."\n";
        }
    }
}
```

The array form `array('Owner' => array(), 'Wheels' => array())` is equivalent to the JSON string.

> **Aliases, not class names.** Every key in the graph and in the criteria is the `alias` attribute of an `<aggregate>` or `<composite>` in your schema, not the related class name. A graph naming a class that no relation uses loads nothing for that node, and xPDO writes `No foreign key definition for parentClass: …` to the log.

## The schema behind the example

The examples on this page use a small model of boxes that belong to a track and carry wheels. The two relations used by the first example are declared on `Box`:

``` php
$xpdo->setPackage('track', MODX_BASE_PATH.'track/model/', 'track_');
```

``` xml
<model package="track" version="3.0" baseClass="xPDO\Om\xPDOObject" platform="mysql" defaultEngine="InnoDB">
    <object class="User" table="users" extends="xPDO\Om\xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="50" phptype="string" null="false"/>
    </object>

    <object class="Box" table="boxes" extends="xPDO\Om\xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="50" phptype="string" null="false"/>
        <field key="width" dbtype="int" precision="10" phptype="integer" null="false" default="0" index="index"/>
        <field key="owner_id" dbtype="int" precision="10" phptype="integer" null="true" index="index"/>
        <field key="track_id" dbtype="int" precision="10" phptype="integer" null="true" index="index"/>

        <aggregate alias="Owner" class="User" local="owner_id" foreign="id" cardinality="one" owner="foreign"/>
        <composite alias="Wheels" class="Wheel" local="id" foreign="box_id" cardinality="many" owner="local"/>
        <aggregate alias="Track" class="Track" local="track_id" foreign="id" cardinality="one" owner="foreign"/>
    </object>

    <object class="Wheel" table="wheels" extends="xPDO\Om\xPDOSimpleObject">
        <field key="position" dbtype="varchar" precision="20" phptype="string" null="false"/>
        <field key="width" dbtype="int" precision="10" phptype="integer" null="false" default="0"/>
        <field key="box_id" dbtype="int" precision="10" phptype="integer" null="false" index="index"/>
    </object>

    <object class="Track" table="tracks" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="50" phptype="string" null="false"/>

        <composite alias="Boxes" class="Box" local="id" foreign="track_id" cardinality="many" owner="local"/>
    </object>
</model>
```

A class that extends `xPDOSimpleObject` inherits an `id` field that is a native auto-increment primary key, so the schema does not declare one. The fields named here — `Box.name`, `Box.width`, `Box.owner_id`, `Box.track_id`, `User.name`, `Wheel.position`, `Wheel.width`, `Wheel.box_id`, `Track.name` — are the only fields the examples read.

## Reading the result

A `cardinality="one"` relation arrives as an object; a `cardinality="many"` relation arrives as an array you loop over. `toArray()` returns the fields of the object you asked for, without the relation data:

``` php
foreach ($boxes as $box) {
    print_r($box->toArray());
    echo $box->Owner->get('name')."\n";
    foreach ($box->Wheels as $wheel) {
        echo $wheel->get('position')."\n";
    }
}
```

`$box->Owner` is `null` when the `LEFT JOIN` found no matching row, so guard any dereference. The same is true of a relation whose foreign key on the parent row is empty.

## The generated SQL

`getCollectionGraph('Box', '{"Owner":{},"Wheels":{}}', array('width' => 14))` produces one statement. Every column is prefixed with its relation alias, so fields of the same name coming from different classes stay apart:

``` sql
SELECT `Box`.`id` AS `Box_id`, `Box`.`name` AS `Box_name`, `Box`.`width` AS `Box_width`,
    `Box`.`owner_id` AS `Box_owner_id`, `Box`.`track_id` AS `Box_track_id`,
    `Owner`.`id` AS `Owner_id`, `Owner`.`name` AS `Owner_name`,
    `Wheels`.`id` AS `Wheels_id`, `Wheels`.`position` AS `Wheels_position`,
    `Wheels`.`width` AS `Wheels_width`, `Wheels`.`box_id` AS `Wheels_box_id`
FROM `track_boxes` AS `Box`
LEFT JOIN `track_users` AS `Owner` ON `Box`.`owner_id` = `Owner`.`id`
LEFT JOIN `track_wheels` AS `Wheels` ON `Box`.`id` = `Wheels`.`box_id`
WHERE `Box`.`width` = 14
ORDER BY `Box`.`id` ASC
```

xPDO adds the `ORDER BY` on the primary key of the main class, so the parent objects come back in primary key order. The prefixes are removed when the rows are hydrated, which is why `$box->get('width')` and `$box->Wheels[0]->get('width')` are both plain field names.

## Filtering a graph

Pass an [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") as the third argument to filter the parents. Prefix a field with the relation alias when several loaded classes share the field name:

``` php
$criteria = $xpdo->newQuery('Box');
$criteria->where(array(
    'Box.width' => 14,
    'Wheels.position' => 'front',
));
$boxes = $xpdo->getCollectionGraph('Box', '{"Wheels":{}}', $criteria);
```

An unprefixed field always resolves against the main class.

::: warning
Do not call `limit()` on the criteria you pass to `getCollectionGraph`. The limit applies to the joined rows, and one parent with three wheels contributes three of them. A box then arrives with only some of its wheels, and the number of boxes you get depends on how many wheels each has. Filter instead of limiting, and page over the parents with a separate query.
:::

`getObjectGraph` takes the same three arguments and returns a single parent object instead of a collection. If the criteria matches more than one object, it returns the first one and writes `getObjectGraph criteria returned more than one instance.` to the log.

## A graph over the MODX model

Joining Resources with the TV values assigned to them is the same call against the classes MODX ships. The composite `TemplateVarResources` and the aggregate `TemplateVar` are declared in MODX's own schema:

``` php
$criteria = $modx->newQuery('modResource');
$criteria->where(array('TemplateVarResources.tmplvarid' => 5));

$pages = $modx->getCollectionGraph(
    'modResource',
    '{"TemplateVarResources":{"TemplateVar":{}}}',
    $criteria
);
foreach ($pages as $page) {
    print $page->get('pagetitle')."\n";
    foreach ($page->TemplateVarResources as $tv) {
        print $tv->TemplateVar->get('name').' is '.$tv->get('value')."\n";
    }
}
```

Stored TV values are not always what the manager shows: a value may be serialized, or hold a snippet name that only renders at output time. Filter on `value` with care.

## Criteria given as a string

`getCollectionGraph` skips the primary-key handling that `getObject` applies to its criteria, so a plain condition string reaches the query unchanged. The array form is still the safer habit, and both behave the same way here:

``` php
$boxes = $xpdo->getCollectionGraph('Box', '{"Wheels":{}}', array('width' => 14));
```

## When the graph comes back empty

| Symptom | Cause |
|---|---|
| Log: `No foreign key definition for parentClass: Box using relation alias: Wheels` | The graph names an alias that `Box` does not declare, or the schema was not loaded into the connection. |
| The relation is `null` or an empty array, no error logged | The `LEFT JOIN` matched nothing: the parent row's foreign key is empty, or no related row carries the referenced value. |
| A nested level is empty while its parent is not | The nested alias exists on the parent relation's class but not on the class you assumed it on. Check the `<aggregate>` and `<composite>` elements of each class in the chain. |
| Fewer parent objects than expected | A limit on the criteria truncated the joined rows. See the warning above. |

## Schema decisions that decide what a graph returns

- Cardinality must match the data. `hydrateGraphNode` reads `cardinality` to decide whether the relation is attached with `addMany` or `addOne`, and `remove()` walks only `<composite>` relations when deleting. An aggregate declared as `many` is never filled as a collection.
- Relations belong on the class that holds the foreign key. An aggregate with `owner="foreign"` reads the column on the owning row; a composite with `owner="local"` writes its value into the child rows on save.
- Build the chain on primary keys. Every aggregate and composite resolves through the `local` and `foreign` columns named in the schema, and those columns have to exist in the tables the classes map to.

## See Also

- [Creating an xPDO Instance](extending-modx/xpdo/create-xpdo-instance "Creating an xPDO Instance")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
- [Defining Relationships](extending-modx/xpdo/custom-models/defining-a-schema/relationships "Defining Relationships")
- [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
