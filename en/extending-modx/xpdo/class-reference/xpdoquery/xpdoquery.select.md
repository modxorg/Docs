---
title: "xPDOQuery.select"
_old_id: "1297"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.select"
---

## xPDOQuery::select

 Specify columns to return from the SQL query.

## Syntax

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::select()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::select())

 ``` php
getSelectColumns($className, $tableAlias= '', $columnPrefix= '', $columns= array (), $exclude= false)
```

 ``` php
xPDOQuery select ([string $columns = '*'])
```

 When selecting fields, **always** make sure to at least include the Primary Key of the table; otherwise, xPDO will not be able to make an object from it and get lost in recursion with the error that the maximum number of nested functions of 100 has been exceeded. 

## Example

 Get a collection of Boxes, with only the ID and name fields.

 ``` php
$query = $xpdo->newQuery('Box');
$query->select($xpdo->getSelectColumns('Box','Box','',array('id','name')));
$boxes = $xpdo->getCollection('Box',$query);
```

## Use with toArray()

 It's important to point out that toArray() will by default lazy-load values, so it effectively overrides the values you've passed to the select() method. To have toArray() to follow along with what you've passed to select(), you set its third parameter to "true".

 ``` php
$query = $xpdo->newQuery('modUser');
$query->select('id,username');
$users = $xpdo->getCollection('modUser',$query);
foreach ($users as $u) {
    print_r($u->toArray()); // will print ALL fields.
    print_r($u->toArray('',false,true)); // will print ONLY the selected fields.
}
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")

The function works with either an array of field names or a comma-separated string:

 ``` php
xPDOQuery select ([string $columns = '*'])
xPDOQuery select ([array $columns =  array()])
```

 The example in the API docs passes select() the results of getSelectColumns(), which returns a comma-delimited list (a string).