---
title: "As PDO Wrapper"
_old_id: "1149"
_old_uri: "2.x/getting-started/fundamentals/xpdo,-the-class/as-pdo-wrapper"
---

What is it?
-----------

PDO is the new standard data access layer for PHP, and it's capabilities are at the core of what xPDO is all about. An instance of PDO essentially represents a connection to a database, and by wrapping a PDO instance, essentially making it a "service" object, xPDO can provide a rich buffer between your object model and the persistence services responsible for handling all database communication.

And though it doesn't extend PDO directly, it does provide the same methods as PDO, which allows xPDO to mediate all database calls. This makes it possible to use result set caching and other advanced techniques to optimize how your applications interact with the database (i.e. by caching db results to file or memory, you can avoid even making the database connection if everything requested is found in the cache).

Finally, by simply extending xPDO yourself, you can further customize the class to serve the purposes you need it to. For instance, you can add domain-specific methods or extend core methods in your derivative and use instances as a central domain object for interacting with your model. This is how the MODx Revolution 2.0 Content Management System was built; the central class: modX, extends xPDO and adds the methods that form the MODx application domain.

You'll start off by extending the class like so:

```
<pre class="brush: php">
class myClass extends xPDO

```and then define a constructor method:

```
<pre class="brush: php">
function __construct($options = array()) {
    $options = array(
        xPDO::OPT_CACHE_PATH => '/path/to/my/cache/dir',
        xPDO::OPT_TABLE_PREFIX => 'myprefix_',
        xPDO::OPT_HYDRATE_FIELDS => true,
        xPDO::OPT_HYDRATE_RELATED_OBJECTS => true,
        xPDO::OPT_HYDRATE_ADHOC_FIELDS => true,
        xPDO::OPT_VALIDATE_ON_SAVE => true,
    );
    parent :: __construct(
        'mysql:host=localhost;dbname=myxpdodb;charset=utf8',
        'username',
        'password',
        $options,
        array (
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
            PDO::ATTR_PERSISTENT => false,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
        )
    );
    $this->setPackage('mypackage', 'path/to/my/model/');
}

```There's a lot in there. You can find more information on the constructor here: [The xPDO Constructor](/xpdo/2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor").