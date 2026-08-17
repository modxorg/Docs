---
title: "Foreign Databases"
description: "CMPGenerator и работа с внешними базами данных MySQL"
translation: "extras/cmpgenerator/cmpgenerator.foreign-databases"
---

## Внешние базы данных

Добавлено в 1.1

Внешняя база это отдельная или сторонняя БД. Пример: modx как БД MODX и crm как БД CRM. crm будет внешней базой.

С версии 1.1 для генерации файлов внешняя БД должна быть на том же сервере, что и БД MODX, в MySQL. Пользователь БД MODX должен иметь права на внешнюю базу.

В CMPGenerator укажите имя базы и при необходимости префикс таблиц. В сниппете создайте новый экземпляр xPDO и работайте как обычно (с $foreignDB вместо $modx). Пример кода ниже.

### Базовый пример кода сниппета

### Пример кода

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

// Note for all HTML you should be using Chunks see: <a href="https://docs.modx.org/current/en/building-sites/elements/chunks"> https://docs.modx.org/current/en/building-sites/elements/chunks...</a>
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

Пример схемы и внешней БД от James Ehly
\- <http://devtrench.com/posts/first-impressions-of-xpdo-wordpress-to-modx-migration-tool>
\- <http://devtrench.com/posts/wordpress-to-modx-migration-part-2-schema-relationships-and-comments>
\- <http://devtrench.com/posts/wordpress-to-modx-migration-part-3-templates-categories-and-postmeta>

### Расширенный пример кода сниппета

Код выше создаёт новое подключение при каждом вызове сниппета. При 2-3 вызовах на странице это даёт задержку. Простой класс ниже сохраняет подключение, чтобы не переподключаться каждый раз.

> foreignconnect.class.php

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

Создайте config-файл для require в каждом вызове сниппета:

### Custom

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

Первые строки сниппета тогда выглядят так:

### Snippet

``` php
require $modx->getOption('core_path').'/config/foreign_config.inc.php';

$output = '';// this is what the snippet will return

$package_path = $modx->getOption('core_path').'components/foreigndb/model/';
require_once $package_path.'foreignconnect.class.php';

$foreignDB = ForeignConnect::getInstance($database_dsn, $database_user, $database_password); // returns an xPDO instance
```

## См. также

1. [CMPGenerator.5 minute example](extras/cmpgenerator/cmpgenerator.5-minute-example)
2. [CMPGenerator.Foreign Databases](extras/cmpgenerator/cmpgenerator.foreign-databases)
