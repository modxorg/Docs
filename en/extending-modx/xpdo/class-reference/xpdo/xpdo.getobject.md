---
title: "xPDO.getObject"
_old_id: "1245"
_old_uri: "2.x/class-reference/xpdo/xpdo.getobject"
---

## xPDO::getObject

Retrieves a single object instance by the specified criteria.

The criteria can be a primary key value, an array of primary key values (for multiple primary key objects), an xPDOCriteria object or **raw SQL**. If no $criteria parameter is specified, no class is found, or an object cannot be located by the supplied criteria, null is returned.

> **Important:** do not pass untrusted input into the criteria parameter. **Always sanitize the value, cast the value to integer for a primary key, or provide it in array form** if it comes from any sort of user input to prevent potential SQL injections or returning data not supposed to be accessible. xPDO attempts to identify and prevent SQL injections, however as it also supports providing raw SQL criteria, not sanitizing the criteria may make your code vulnerable. 

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getObject()>

``` php
xPDOObject|null getObject (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

## Example

### Simplest Example (Built-in Objects)

You can use **getObject** to retrieve MODX resources (e.g. a page) by its page ID:

``` php
$page = $modx->getObject('modResource', ['id' => 555]);
$output = $page->get('pagetitle');
```

**xPDO vs. MODX**
The **$modx** object extends xPDO, so for many situations (e.g. inside your Snippets), you can use the **$modx** object, even though most examples on this page use the **$xpdo** object.

You can retrieve any MODX object this way, just by knowing its object name – usually that's simply a matter of prepending "mod" to the object's familiar name:

| Common Name | Object Name | Notes                                                                                                                        |
| ----------- | ----------- | ---------------------------------------------------------------------------------------------------------------------------- |
| Page        | modResource | Pages are just one manifestation of modResource – you can also use this to retrieve Weblinks, Symlinks, and Static Resources |
| Chunk       | modChunk    |                                                                                                                              |
| User        | modUser     |                                                                                                                              |
| Template    | modTemplate |                                                                                                                              |
| Snippet     | modSnippet  |                                                                                                                              |

See **core/model/schema/modx.mysql.schema.xml** file for a full definition of all MODX objects.

If you need to retrieve other attributes for these objects (e.g. TVs for a page), then you may need to look at [getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")

### Simplest Example (Custom Objects)

The simplest example is when you retrieve an object by its primary key.

E.g. get a Box object with ID 134, either by using array syntax or only the ID. 

``` php
$box = $xpdo->getObject('Box', ['id' => 134]);
$box = $xpdo->getObject('Box', 134); //
```

When using the syntax where you provide the primary key (id) directly, **always cast user input to an integer**, e.g. `(int)$property` to avoid user-provided SQL from being used in the query.

Back in your XML schema, if your object extends _xPDOSimpleObject_, the primary key column is assumed to be named "id".

``` xml
<object class="modPropertySet" table="property_set" extends="xPDOSimpleObject">
```

Otherwise, your XML schema will tell you which column is the primary key via the _index alias="PRIMARY"_ node, e.g.

``` xml
 <object class="MyObject" table="my_object" extends="xPDOObject">
  <field key="object_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
  <!-- ... stuff here ... -->
  <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
    <column key="object_id" collation="A" null="false" />
  </index>
 </object>
```

### Other Columns

You don't have to retrieve based on just the primary key, you can also search on other columns:

``` php
$box = $xpdo->getObject('Box', array('color'=>'blue'));
```

When querying based on other fields, make sure to add the appropriate index for performance. 

### Complex Criteria

You can specify more complex selection criteria using an [xPDO query](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery"):

``` php
$query = $modx->newQuery('MyObject');
$query->where([
    'wheels:>=' => 3
]);
$myobj = $xpdo->getObject('MyObject', $query);
```

## See Also

- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
- [xPDO.getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
- [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
- \[xPDO.load\]
- [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO](extending-modx/xpdo "xPDO")
