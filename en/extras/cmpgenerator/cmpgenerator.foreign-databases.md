---
title: "Foreign Databases"
_old_id: "810"
_old_uri: "revo/cmpgenerator/cmpgenerator.foreign-databases"
---

## Using Foreign Databases

Added in 1.1

A foreign database means a another or third party database. Example: you probably have the database modx as your MODX db, and maybe you have crm for your CRM db. crm would be the foreign database.

As of version 1.1, to generate files, your foreign database needs to be on the same machine as your MODX DB and in MySQL. The database user that MODX is using must also have permissions to the foreign database.

When you run the CMPGenerator fill in the database name and if needed the table prefix. Now when you create a snippet you will need to create a new instance of xPDO and then you can code as normal (using your $foreignDB reference instead of $modx of course). See the example code below.

### Basic Snippet Code Example

**Example code** 
``` php 
<?php
require_once $modx->getOption('core_path').'config/foreigndb_config.php';

$output = '';// this is what the snippet will return

$foreignDB = new xPDO('mysql:host=' . $foreign_database_host.';dbname='.$foreign_database_name/*.';charset='.$foreign_database_charset*/,
        $foreign_database_username,
        $foreign_database_password );

$package_path = $modx->getOption('core_path').'components/foreigndb/model/';
// see the scheme file and the xml model element and you will see the attribute package and that must match here
// make sure you set the prefix as empty if you don't use it
if ( !$foreignDB->addPackage('foreigndb', $package_path, '') ) {
    return 'Can not load package';
}

// lets add some data!
// see the scheme file and the xml object element and you will see the attribute class and that must match here
$myRow = $foreignDB->newObject('EventName');
$data = array(
        'name' => 'MODX Revolution',
        'description' => 'A great CMS product...'
    );
$myRow->fromArray($data);

if ( !$myRow->save() ) {
    $output .= '<p>Could not create row</p>';
} else {
    $output .= '<p>Created row successfully</p>';
}
// now lets show the data in a quick and dirty table:
$output .= '
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
    </tr>';

// Note for all HTML you should be using Chunks see: <a href="http://rtfm.modx.com/display/revolution20/Chunks#Chunks-ProcessingChunkviatheAPI"> http://rtfm.modx.com/display/revolution20/Chunks#...</a>
/* build query */
$query = $foreignDB->newQuery('EventName');
$rows = $foreignDB->getIterator('EventName', $query);

/* iterate */
$list = array();
foreach ($rows as $row) {
    // from object to array you can also do $row->get('name');
    $row_array = $row->toArray();

    $output .= '
    <tr>
        <td>'.$row_array['id'].'</td>
        <td>'.$row_array['name'].'</td>
        <td>'.$row_array['description'].'</td>
    </tr>';
}
$output .= '
</table>';

return $output;
```

Example of schema and foreign DB from James Ehly 
\- <http://devtrench.com/posts/first-impressions-of-xpdo-wordpress-to-modx-migration-tool> 
\- <http://devtrench.com/posts/wordpress-to-modx-migration-part-2-schema-relationships-and-comments> 
\- <http://devtrench.com/posts/wordpress-to-modx-migration-part-3-templates-categories-and-postmeta>

### Advanced Snippet Code Example

The above code will create a new connection for each snippet call. So if you have 2 or 3 snippet calls to your snippet that is using a foreign db it will lag. So I wrote a simple class that will save you db connection so you don't have to reconnect each time.

**foreignconnect.class.php** 
``` php 
class ForeignConnect {
    /**
     * @var (Array) of db_dsn => (Object) the xPDO instance
     */
    private static $instance = array();
    
    /**
     * private constructor
     */
    private function __construct($database_dsn, $username, $password){
        
    }
    public function __destruct(){
        $this->close();
    }
    /**
     * This static method creates an instance of the class if no instance already exists.
     * @param (String) $database_dsn
     * @param (String) $username
     * @param (String) $password
    */
    static public function getInstance($database_dsn, $username, $password){
        //global $modx;
        //$modx->log(xPDO::LOG_LEVEL_ERROR, 'getInstance');
        //instance must be static in order to be referenced here
        if(!isset(self::$instance[$database_dsn]) ){
            // new connection
            //$modx->log(xPDO::LOG_LEVEL_ERROR, 'New Connection getInstance DB: '.$database_dsn);
            self::$instance[$database_dsn] = new xPDO($database_dsn,
                $username,
                $password );
            
        }
        //$modx->log(xPDO::LOG_LEVEL_ERROR, 'Return Connection');
        return self::$instance[$database_dsn];
    }
    /**
     * Close the instance
     */
    public function close(){
        self::$instance = array();
    }
}
```

Now create a config file that can be required for each snippet call:

**Custom** 
``` php 
$database_type = 'mysql';

$database_server = 'localhost';
$database_user = 'user';
$database_password = 'pass';
$database_connection_charset = 'utf8';

$dbase = 'foreign_db';
$table_prefix = '';
$database_dsn = $database_type.':host='.$database_server.';dbname='.$dbase.';charset='.$database_connection_charset;
```

Then the first few lines of the snippet will looks like this instead:

**Snippet** 
``` php 
require $modx->getOption('core_path').'/config/foreign_config.inc.php';

$output = '';// this is what the snippet will return

$package_path = $modx->getOption('core_path').'components/foreigndb/model/';
require_once $package_path.'foreignconnect.class.php';

$foreignDB = ForeignConnect::getInstance($database_dsn, $database_user, $database_password); // returns an xPDO instance
```

## See Also

1. [CMPGenerator.5 minute example](extras/cmpgenerator/cmpgenerator.5-minute-example)
2. [CMPGenerator.Foreign Databases](extras/cmpgenerator/cmpgenerator.foreign-databases)