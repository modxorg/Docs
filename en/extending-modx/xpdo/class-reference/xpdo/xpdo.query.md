---
title: "xPDO.query"
_old_id: "1253"
_old_uri: "2.x/class-reference/xpdo/xpdo.query"
---

## xPDO::query

Executes an SQL statement, returning a result set as a PDOStatement object.

**Tip**
This can be a good way to issue reporting queries without having to worry about the complex syntax normally required by xPDO.

## Syntax

API Docs: see <http://php.net/manual/en/pdo.query.php>

```php
xPDOObject|false query (string $statement)
```

> \$statement

The SQL statement to prepare and execute. Data inside the query should be [properly escaped](http://php.net/manual/en/pdo.quote.php).

## Examples

### Select a Single Record

Here's a simple query to fetch one row from the database. Note that you would normally use [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") or [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") to fetch a data from built-in MODX tables.

`xPDOObject|false query (string $statement)`

> \$statement

The SQL statement to prepare and execute. Data inside the query should be [properly escaped](http://php.net/manual/en/pdo.quote.php).

```php
$result = $modx->query("SELECT * FROM modx_users WHERE id=1");
if (!is_object($result)) {
   return 'No result!';
}
else {
   $row = $result->fetch(PDO::FETCH_ASSOC);
   return 'Result:' .print_r($row,true);
}
```

Use the `PDO::FETCH_ASSOC` will force the result to be an associative array:

```php
Array
(
    [id] => 1
    [username] => my_user
    [password] => xxxxxxxxxxxxxxxxxxx
    // ...
)
```

Without it, the results are a mix of an associative and a regular array:

```php
Array
(
    [id] => 1
    [0] => 1
    [username] => my_user
    [1] => my_user
    [password] => xxxxxxxxxxxxxxxxxxxxxxx
    [2] => xxxxxxxxxxxxxxxxxxxxx
    // ...
)
```

**No One-Liners!**
The one-line method-chaining available to PDO is not possible with xPDO. The following **will not work**:

`$row = $modx->query("SELECT * FROM cms_users WHERE id=1")->fetch();`

### Selecting Multiple Records

PDO uses a lazy-loader, so you can't simply print out all of the results at once. Instead, you iterate over each result in the set using a loop, e.g.

```php
$results = $xpdo->query("SELECT * FROM some_table");
while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
        print_r($r); exit;
}
```

### Quoting Inputs

For single queries that rely on user input, you should [manually quote](http://php.net/manual/en/pdo.quote.php) the input strings.

```php
$username = $modx->quote($username);
$sql = "SELECT * FROM modx_users WHERE username = $username";
$result = $modx->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
return print_r($row,true);
```

The quote function can take a 2nd argument, which you can use to quote integers specifically

-   `PDO::PARAM_INT` for quoting integers
-   `PDO::PARAM_STR` for quoting strings (default)

```php
$id = $modx->quote(1, PDO::PARAM_INT);
$sql = "SELECT * FROM cms_users WHERE id = $id";
$result = $modx->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
return print_r($row, true);
```

### Select a Collection

Here's a simple query to fetch multiple rows from the database. Note that you would normally use [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") to retrive data from MODX tables.

```php
$output = '';
$sql = "SELECT * FROM modx_users";
foreach ($modx->query($sql) as $row) {
    $output .= $row['username'] .'<br/>';
}
return $output;
```

You can also use the `fetchAll()` method to return an array of arrays (i.e. a recordset):

```php
$output = '';
$sql = "SELECT * FROM modx_users";
$result = $modx->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
return $data;
```

### Fetch Style

From <http://php.net/manual/en/pdostatement.fetch.php>, these are the available constants that affect how your results are returned:

-   `PDO::FETCH_ASSOC`: returns an array indexed by column name as returned in your result set
-   `PDO::FETCH_BOTH` (default): returns an array indexed by both column name and 0-indexed column number as returned in your result set
-   `PDO::FETCH_BOUND`: returns TRUE and assigns the values of the columns in your result set to the PHP variables to which they were bound with the PDOStatement::bindColumn() method
-   `PDO::FETCH_CLASS`: returns a new instance of the requested class, mapping the columns of the result set to named properties in the class. If fetch_style includes `PDO::FETCH_CLASSTYPE` (e.g. `PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE`) then the name of the class is determined from a value of the first column.
-   `PDO::FETCH_INTO`: updates an existing instance of the requested class, mapping the columns of the result set to named properties in the class
-   `PDO::FETCH_LAZY`: combines `PDO::FETCH_BOTH` and `PDO::FETCH_OBJ`, creating the object variable names as they are accessed
-   `PDO::FETCH_NUM`: returns an array indexed by column number as returned in your result set, starting at column 0
-   `PDO::FETCH_OBJ`: returns an anonymous object with property names that correspond to the column names returned in your result set

### Prepared Statements

See

-   <http://php.net/manual/en/pdo.prepare.php>
-   <http://php.net/manual/en/pdostatement.execute.php>

## See Also

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO](extending-modx/xpdo "xPDO")
