---
title: "Database Connections and xPDO"
_old_id: "1157"
_old_uri: "2.x/getting-started/using-your-xpdo-model/database-connections-and-xpdo"
---

<div>- [xPDO Database Connections](#DatabaseConnectionsandxPDO-xPDODatabaseConnections)
  - [Example Connection](#DatabaseConnectionsandxPDO-ExampleConnection)
- [Defining Multiple Connections _(xPDO 2.2+)_](#DatabaseConnectionsandxPDO-DefiningMultipleConnections%28xPDO2.2%29)
  - [xPDO::OPT\_CONNECTIONS](#DatabaseConnectionsandxPDO-xPDO%3A%3AOPTCONNECTIONS)
  - [xPDO::OPT\_CONN\_MUTABLE](#DatabaseConnectionsandxPDO-xPDO%3A%3AOPTCONNMUTABLE)
  - [xPDO::OPT\_CONN\_INIT](#DatabaseConnectionsandxPDO-xPDO%3A%3AOPTCONNINIT)
- [See Also](#DatabaseConnectionsandxPDO-SeeAlso)

</div>xPDO Database Connections
-------------------------

Database connectivity in xPDO is done in the constructor. The xPDO object can only hold one database connection per instance, but you are free to instantiate as many xPDO instances as you need. The syntax of the constructor is such:

```
<pre class="brush: php">function xPDO($dsn, $username= '', $password= '', $options= array(), $driverOptions= null)

```So let's say we want to connect to a localhost database named 'test' on port 3306, with a utf-8 charset:

```
<pre class="brush: php">$dsn = 'mysql:host=localhost;dbname=test;port=3306;charset=utf8';
$xpdo = new xPDO($dsn,'username','password');

```And you're done!

Optionally verify the connection, by simply adding the following line afterward

```
<pre class="brush: php">echo $o=($xpdo->connect()) ? 'Connected' : 'Not Connected';

```<div class="note">xPDO creates a PDO object, and thus connects to the database, only when a PDO method is called and the connection is needed. This connect-on-demand feature allows xPDO caching to work without a database connection being required (assuming everything is cached).</div>More information on these parameters can be found on [The xPDO Constructor](/xpdo/2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor") page.

Once you're connected, you'll need to [load your package](/xpdo/2.x/getting-started/using-your-xpdo-model/loading-packages "Loading Packages").

### Example Connection

Here's an example script that can be used to connect to a foreign database:

```
<pre class="brush: php"><?php

define('MODX_CORE_PATH', '/path/to/revo/core/');
define('MODX_CONFIG_KEY','config');
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

// Criteria for foreign Database
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database';
$port = 3306;
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
$xpdo = new xPDO($dsn, $username, $password);

// Test your connection
echo $o = ($xpdo->connect()) ? 'Connected' : 'Not Connected';

// Issue queries against the foreign database:
$results = $xpdo->query("SELECT id FROM some_table"); 
$recordCount = $results->rowCount();
print $recordCount;

```Defining Multiple Connections _(xPDO 2.2+)_
-------------------------------------------

xPDO 2.2 introduces the ability to define multiple connections, and includes configuration options for specifying read-only attributes per connection. This allows the use of xPDO with various kinds of master/slave database configurations. The feature is not meant to allow connecting to a specific database node, it is for configuring master/slave configurations where one (or more) nodes are read-only and at least one is writable (aka mutable). In that case you can request the initial connection be read-only and xPDO will automatically switch to a writable connection if a write operation is performed on a database object.

### xPDO::OPT\_CONNECTIONS

To define additional connections for an xPDO instance, you can pass an array of connection configuration arrays in the `$options` parameter of the xPDO constructor. Each connection array defines the same parameters as an xPDO constructor call. Here is an example constructor call with multiple read-only connections specified:

```
<pre class="brush: php">$xpdo = new xPDO('mysql:host=127.0.0.1:19570;dbname=xpdotest;charset=utf8', 'username', 'password' array(
    xPDO::OPT_CONN_MUTABLE => true,
    xPDO::OPT_CONN_INIT => array(xPDO::OPT_CONN_MUTABLE => false),
    xPDO::OPT_CONNECTIONS => array(
            array(
                'dsn' => 'mysql:host=127.0.0.1:19571;dbname=xpdotest;charset=utf8',
                'username' => 'username',
                'password' => 'password',
                'options' => array(
                    xPDO::OPT_CONN_MUTABLE => false,
                ),
                'driverOptions' => array(),
            ),
            array(
                'dsn' => 'mysql:host=127.0.0.1:19572;dbname=xpdotest;charset=utf8',
                'username' => 'username',
                'password' => 'password',
                'options' => array(
                    xPDO::OPT_CONN_MUTABLE => false,
                ),
                'driverOptions' => array(),
            ),
        ),
));

```### xPDO::OPT\_CONN\_MUTABLE

This option defines the mutability of a defined connection, i.e. is it a read-only connection or can we write to it. It can be specified in the `$options` array of the constructor as well as in the _options_ for each additional connection.

### xPDO::OPT\_CONN\_INIT

This option defines criteria that a connection must meet to be considered for use as the initial connection created by xPDO. In master/slave configurations, a typical value for this option (which is specified only once in the main configuration options) would indicate to initialize a read-only or immutable connection.

```
<pre class="brush: php">xPDO::OPT_CONN_INIT => array(xPDO::_OPT_CONN_MUTABLE => false)

```This makes sure that xPDO selects a connection with that option set to false to start with. If a write operation is performed within xPDO after a read-only connection is initialized, a new mutable connection will be selected and cached for reuse by other write operations within the same execution cycle.

See Also
--------

[The xPDO Constructor](/xpdo/2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor")   
[PDO::\_\_construct()](http://www.php.net/manual/en/pdo.construct.php)