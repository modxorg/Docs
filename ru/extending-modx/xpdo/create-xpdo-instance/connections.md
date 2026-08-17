---
title: "Подключения к базе данных"
translation: "extending-modx/xpdo/create-xpdo-instance/connections"
---

## Подключения xPDO к базе данных

Подключение к базе данных в xPDO задаётся в конструкторе. Один экземпляр xPDO держит одно подключение, но вы можете создать сколько угодно экземпляров xPDO. Сигнатура конструктора такая:

``` php
function xPDO($dsn, $username= '', $password= '', $options= array(), $driverOptions= null)
```

Допустим, вы хотите подключиться к локальной базе `test` на порту 3306 с кодировкой utf-8:

``` php
$dsn = 'mysql:host=localhost;dbname=test;port=3306;charset=utf8';
$xpdo = new xPDO($dsn,'username','password');
```

Готово.

При желании проверьте подключение, добавив после этого строку:

``` php
echo $o=($xpdo->connect()) ? 'Connected' : 'Not Connected';
```

xPDO создаёт объект PDO и подключается к базе только когда вызывается метод PDO и соединение действительно нужно. Такое подключение по требованию позволяет кэшированию xPDO работать без обязательного соединения с БД (если всё уже в кэше).

Подробнее о параметрах см. на странице [Конструктор xPDO](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor").

После подключения вам нужно [загрузить пакет](extending-modx/xpdo/custom-models/loading-package "Loading Packages").

### Пример подключения

Пример скрипта для подключения к внешней базе данных:

``` php
<?php

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
```

## Несколько подключений _(xPDO 2.2+)_

В xPDO 2.2 появилась возможность задавать несколько подключений и опции конфигурации для атрибутов только для чтения на каждое соединение. Так xPDO можно использовать в схемах master/slave. Функция не предназначена для выбора конкретного узла БД. Она настраивает master/slave, где один или несколько узлов только для чтения, а хотя бы один доступен для записи (mutable). Тогда вы можете запросить начальное подключение только для чтения, и xPDO автоматически переключится на writable-соединение, если над объектом БД выполнят операцию записи.

### xPDO::OPT\_CONNECTIONS

Чтобы задать дополнительные подключения для экземпляра xPDO, передайте массив массивов конфигурации соединений в параметре `$options` конструктора xPDO. Каждый массив соединения задаёт те же параметры, что и вызов конструктора xPDO. Пример вызова конструктора с несколькими подключениями только для чтения:

``` php
$xpdo = new xPDO('mysql:host=127.0.0.1:19570;dbname=xpdotest;charset=utf8', 'username', 'password' array(
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
```

### xPDO::OPT\_CONN\_MUTABLE

Эта опция задаёт изменяемость (mutability) определённого соединения: только чтение или запись разрешена. Её можно указать в массиве `$options` конструктора и в _options_ каждого дополнительного соединения.

### xPDO::OPT\_CONN\_INIT

Эта опция задаёт критерии, которым должно соответствовать соединение, чтобы xPDO выбрал его как начальное. В конфигурациях master/slave типичное значение (его задают один раз в основных опциях) означает инициализацию read-only или immutable-соединения.

``` php
xPDO::OPT_CONN_INIT => array(xPDO::_OPT_CONN_MUTABLE => false)
```

Так xPDO сначала выбирает соединение с этой опцией, равной false. Если после инициализации read-only соединения внутри xPDO выполнят запись, будет выбрано новое mutable-соединение и закэшировано для повторного использования другими операциями записи в том же цикле выполнения.

## Смотрите также

[Конструктор xPDO](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor")
[PDO::\_\_construct()](http://www.php.net/manual/en/pdo.construct.php)
