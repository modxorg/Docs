---
title: "xPDOQuery.sortby"
_old_id: "1299"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.sortby"
---

## xPDOQuery::sortby

 Add an ORDER BY clause to the query.

## Syntax

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::sortby()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::sortby())

 ``` php 

xPDOQuery sortby (string $column, [string $direction = 'ASC'])

```

## Example

 Get all the Box objects sorted by name.

 ``` php 

$query = $xpdo->newQuery('Box');
$query->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$query);

```

 You can sort by a random order by referencing 'RAND()':

 ``` php 

$query = $xpdo->newQuery('Box');
$query->sortby('RAND()');
$boxes = $xpdo->getCollection('Box',$query);

```

 Likewise, you can pass any valid database function to the sortby method, e.g. 'FIELD()' to dictate a specific order for your results:

 ``` php 

$query = $xpdo->newQuery('modResource');
$query->sortby('FIELD(modResource.id, 4,7,2,5,1 )');
$boxes = $xpdo->getCollection('modResource',$query);

```

## See Also

- [xPDOQuery](xpdo/class-reference/xpdoquery "xPDOQuery")