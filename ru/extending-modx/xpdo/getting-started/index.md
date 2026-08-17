---
title: "Начало работы с xPDO"
translation: "extending-modx/xpdo/getting-started"
---

## Паттерны проектирования

Разработку xPDO вдохновил ряд важных паттернов проектирования. Они хорошо описаны и входят в книгу Martin Fowler _Patterns of Enterprise Application Architecture (P of EAA)_. Среди них, в частности:

- Domain Model
- Active Record
- Data Mapper
- Lazy Load
- Identity Field
- Single Table Inheritance
- Metadata Mapping
- Query Object

Имеет смысл хотя бы ознакомиться с этими паттернами (и другими из каталога) до того, как вы начнёте писать код с xPDO. Понимание этих идей поможет остальному сложиться, когда вы будете изучать xPDO дальше.

## xPDO как обёртка PDO

PDO это стандартный слой доступа к данным в PHP, и его возможности лежат в основе xPDO. Экземпляр PDO по сути представляет соединение с БД. Обернув экземпляр PDO и сделав его сервисным объектом, xPDO даёт буфер между вашей объектной моделью и сервисами персистентности, которые отвечают за всю работу с БД.

xPDO не наследует PDO напрямую, но предоставляет те же методы, что и PDO, и так опосредует все вызовы к БД. Это позволяет использовать кэширование наборов результатов и другие техники оптимизации взаимодействия приложений с БД (например, кэшируя результаты БД в файл или память, вы можете вообще не открывать соединение с БД, если запрошенное уже найдено в кэше).

Расширив xPDO самостоятельно, вы можете дальше настроить класс под свои задачи. Например, добавить доменные методы или расширить базовые методы в производном классе и использовать экземпляры как центральный доменный объект для работы с моделью. Так построена система управления контентом MODX Revolution 2.0: центральный класс modX расширяет xPDO и добавляет методы домена приложения MODX.

Начните с расширения класса так:

``` php
class myClass extends xPDO
```

затем определите конструктор:

``` php
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
```

Здесь много деталей. Подробнее о конструкторе: [Конструктор xPDO](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor").

## xPDO как сервисный слой

Помимо PDO, xPDO может оборачивать другие объекты, с которыми вы работаете рядом с моделью.

Например, вы можете вручную загрузить Smarty как объект и вызывать его прямо из экземпляра xPDO:

``` php
if ($className= $xpdo->loadClass('Smarty','/path/to/smarty/smarty.class.php', false, true)) {
    $xpdo->smarty= & new $className ($xpdo);
}

$xpdo->smarty->someFunc();
```

Но xPDO даёт удобный метод, который делает это в одну строку:

``` php
if ($xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1, 'param2' => $param2)) {
    $xpdo->myService->doSomething();
}
```

Если экземпляр сервиса уже загружен в текущем запросе, он не загрузится снова, а просто вернётся. Так вы получаете переиспользуемые сервисные объекты для типовых задач.

## xPDO как ORM

Как обёртка PDO, xPDO легко использует свой PDO-сервис для работы с реляционной моделью. Когда вы определите объектную модель и сгенерируете scaffolding-классы и object/relational maps с данными, которые нужны xPDO, вы сможете взаимодействовать с объектами множеством способов.

Эти методы подробно разобраны в разделе [Произвольные модели](extending-modx/xpdo/custom-models).
