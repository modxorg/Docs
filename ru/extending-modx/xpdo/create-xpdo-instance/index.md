---
title: "Создание экземпляра xPDO"
translation: "extending-modx/xpdo/create-xpdo-instance"
---

При работе с xPDO внутри MODX класс `modX` (обычно доступен как `$modx` или `$this->modx`) уже является экземпляром xPDO, поэтому отдельный экземпляр создавать не нужно.

Если вы используете xPDO отдельно или хотите создать дополнительные экземпляры, используйте сведения на этой странице.

Сигнатура конструктора:

``` php
$xpdo= new xPDO($dsn, $username= '', $password= '', $options= array(), $driverOptions= null)
```

## Параметры

Как видно, у конструктора 5 параметров. Обязателен только первый:

### $dsn

Этот параметр задаёт значение DSN в таком формате:

> mysql:host=MYHOSTNAME;dbname=MYDBNAME;charset=MYCHARSET

Вам нужно подставить hostname, имя базы и charset. Подробнее на странице [PDO в PHP.net](http://php.net/manual/en/pdo.construct.php).

### $username и $password

Имя пользователя и пароль к базе данных. Укажите учётные данные, которые xPDO будет использовать для подключений.

### $options

Сюда вы передаёте массив опций, специфичных для xPDO.

Часть параметров xPDO использует пользовательские константы, в том числе (список неполный):

- `xPDO::OPT_BASE_CLASSES` : массив классов для загрузки при создании экземпляра.
- `xPDO::OPT_BASE_PACKAGES` : строка имён пакетов и путей через запятую (имя и путь разделены двоеточием) для загрузки при создании экземпляра.
- `xPDO::OPT_CACHE_COMPRESS` : если задано, экземпляры `xPDOCache` у провайдеров со сжатием данных по умолчанию используют эту опцию.
- `xPDO::OPT_CACHE_DB` : если задано, включается кэширование наборов результатов БД.
- `xPDO::OPT_CACHE_DB_COLLECTIONS` : если задано, кэш результатов БД пытается кэшировать целые коллекции.
- `xPDO::OPT_CACHE_DB_OBJECTS_BY_PK` : если задано, кэш результатов БД создаёт записи по первичному ключу в дополнение к сигнатуре запроса.
- `xPDO::OPT_CACHE_DB_EXPIRES` : если задано, задаёт число секунд жизни записи кэша результатов БД. 0 означает без срока.
- `xPDO::OPT_CACHE_DB_HANDLER` : если задано, задаёт производный класс `xPDOCache` для кэша результатов БД.
- `xPDO::OPT_CACHE_EXPIRES` : если задано, задаёт число секунд жизни записи кэша по умолчанию у любого провайдера. 0 означает без срока.
- `xPDO::OPT_CACHE_FORMAT` : если задано, задаёт формат файлов кэша при `xPDOFileCache`. По умолчанию PHP, также доступны JSON и serialized. _(только 2.1)_
- `xPDO::OPT_CACHE_KEY` : если задано, задаёт ключ экземпляра кэша по умолчанию. Значение по умолчанию: _default_.
- `xPDO::OPT_CACHE_PATH` : если задано, задаёт пользовательскую переменную класса cachePath у объекта xPDO для кэширования.
- `xPDO::OPT_CACHE_ATTEMPTS` : если задано, задаёт число попыток `xPDOFileCache` заблокировать существующую запись кэша для записи. По умолчанию 1. _(только 2.1)_
- `xPDO::OPT_CACHE_ATTEMPT_DELAY` : если задано, задаёт задержку в микросекундах между попытками блокировки существующих записей кэша для записи. По умолчанию 10000. _(только 2.1)_
- `xPDO::OPT_CONNECTIONS` : опционально задаёт пул [дополнительных подключений](extending-modx/xpdo/create-xpdo-instance/connections), из которых выбирать при создании xPDO. _(только 2.2)_
- `xPDO::OPT_CONN_INIT` : задаёт опции, которые соединение должно иметь, чтобы быть выбранным как начальное. Актуально при нескольких подключениях. _(только 2.2)_
- `xPDO::OPT_CONN_MUTABLE` : задаёт, можно ли изменять данные из соединения, то есть доступна ли запись. _(только 2.2)_
- `xPDO::OPT_HYDRATE_FIELDS` : если true, поля будут [гидратированы](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- `xPDO::OPT_HYDRATE_RELATED_OBJECTS` : если true, связанные объекты будут [гидратированы](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- `xPDO::OPT_HYDRATE_ADHOC_FIELDS` : если true, ad-hoc поля будут [гидратированы](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- `xPDO::OPT_LOADER_CLASSES` : может быть массивом имён классов для загрузки при создании объекта xPDO. _(устарело в 2.0.0-pl)_
- `xPDO::OPT_ON_SET_STRIPSLASHES` : если задано, к значениям при `set()` у экземпляров xPDOObject применяется stripslashes().
- `xPDO::OPT_TABLE_PREFIX` : если задано, ко всем ссылкам на классы БД добавляется этот префикс.
- `xPDO::OPT_VALIDATOR_CLASS` : если задано, используется указанный пользовательский класс, производный от xPDOValidator _(по умолчанию)_
- `xPDO::OPT_VALIDATE_ON_SAVE` : если true, перед сохранением `xPDOObjects` проверяются своими Validators.

### $driverOptions

Необязательный массив опций PDO, специфичных для драйвера. Подробнее [здесь](http://us.php.net/manual/en/pdo.drivers.php).

## Смотрите также

- [PDO::\_\_construct()](http://php.net/manual/en/pdo.construct.php)
- [Кэширование](extending-modx/xpdo/caching "Caching")
- [Подключения к базе данных и xPDO](extending-modx/xpdo/create-xpdo-instance/connections "Database Connections and xPDO")
- [Гидратация полей](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields")
- [Валидация объектов](extending-modx/xpdo/custom-models/validation "Object Validation")
- [Пользовательские загрузчики объектов](xpdo/extending-your-xpdo-model/overriding-derived-behavior/using-custom-object-loaders "Using Custom Object Loaders")

### Дополнительно об опциях

1. [Гидратация полей](extending-modx/xpdo/create-xpdo-instance/hydrating-fields)
