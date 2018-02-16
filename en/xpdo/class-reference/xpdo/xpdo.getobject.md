---
title: "xPDO.getObject"
_old_id: "1245"
_old_uri: "2.x/class-reference/xpdo/xpdo.getobject"
---

xPDO::getObject
---------------

Retrieves a single object instance by the specified criteria.

The criteria can be a primary key value, an array of primary key values (for multiple primary key objects) or an xPDOCriteria object. If no $criteria parameter is specified, no class is found, or an object cannot be located by the supplied criteria, null is returned.

Syntax
------

API Docs: <http://api.modx.com/xpdo/xPDO.html#getObject>

```
<pre class="brush: php">
xPDOObject|null getObject (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])

```Example
-------

### Simplest Example (Built-in Objects)

You can use **getObject** to retrieve MODX resources (e.g. a page) by its page ID:

```
<pre class="brush: php">
$page = $modx->getObject('modResource', 555);
$output = $page->get('pagetitle');

```<div class="note">**xPDO vs. MODX**  
The **$modx** object extends xPDO, so for many situations (e.g. inside your Snippets), you can use the **$modx** object, even though most examples on this page use the **$xpdo** object.</div>You can retrieve any MODX object this way, just by knowing its object name – usually that's simply a matter of prepending "mod" to the object's familiar name:

<table><tbody><tr><th>Common Name</th><th>Object Name</th><th>Notes</th></tr><tr><td>Page</td><td>modResource</td><td>Pages are just one manifestation of modResource – you can also use this to retrieve Weblinks, Symlinks, and Static Resources</td></tr><tr><td>Chunk</td><td>modChunk</td><td> </td></tr><tr><td>User</td><td>modUser</td><td> </td></tr><tr><td>Template</td><td>modTemplate</td><td> </td></tr><tr><td>Snippet</td><td>modSnippet</td><td> </td></tr></tbody></table>See **core/model/schema/modx.mysql.schema.xml** file for a full definition of all MODX objects.

If you need to retrieve other attributes for these objects (e.g. TVs for a page), then you may need to look at [getObjectGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")

### Simplest Example (Custom Objects)

The simplest example is when you retrieve an object by its primary key.

E.g. get a Box object with ID 134.

```
<pre class="brush: php">
$box = $xpdo->getObject('Box', 134);

```Back in your XML schema, if your object extends _xPDOSimpleObject_, the primary key column is assumed to be named "id".

```
<pre class="brush: php">
<object class="modPropertySet" table="property_set" extends="xPDOSimpleObject">

```Otherwise, your XML schema will tell you which column is the primary key via the _index alias="PRIMARY"_ node, e.g.

```
<pre class="brush: php">
        <object class="MyObject" table="my_object" extends="xPDOObject">
                <field key="object_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
                <!-- ... stuff here ... -->
                <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                        <column key="object_id" collation="A" null="false" />
                </index>
        </object>

```### More Verbose Simple Example

You can also provide more verbose criteria to the 2nd parameter, e.g.

```
<pre class="brush: php">
$box = $xpdo->getObject('Box', array('id'=>134));

```### Other Columns

You don't have to retrieve based on just the primary key, you can also search on other columns:

```
<pre class="brush: php">
$box = $xpdo->getObject('Box', array('color'=>'blue'));

```### Complex Criteria

You can specify more complex selection criteria using an [xPDO query](/xpdo/2.x/class-reference/xpdo/xpdo.newquery "xPDO.newQuery"):

```
<pre class="brush: php">
$query = $modx->newQuery('MyObject');
$query->where( array('wheels:>=' => 3) );
$myobj = $xpdo->getObject('MyObject', $query);

```See Also
--------

- [Retrieving Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getObjectGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
- [xPDO.getCollection](/xpdo/2.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO.getCollectionGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.getIterator](/xpdo/2.x/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
- <span class="error">\[xPDO.load\]</span>
- [xPDO.query](/xpdo/2.x/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")