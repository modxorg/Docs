---
title: "modX.runProcessor"
translation: "extending-modx/modx-class/reference/modx.runprocessor"
---

## modX::runProcessor

Загружает и запускает указанный процессор. В этом контексте процессор это экземпляр класса `\MODX\Revolution\Processors\Processor`, который можно загрузить по логике, описанной ниже.

MODX также использует этот метод для запросов, которые обрабатывает connector.

``` php
ProcessorResponse|mixed runProcessor(string $action = '', array $scriptProperties = array(), array $options = array())
```

Метод принимает 3 аргумента:

- `string $action`: действие, то есть какой процессор запустить. Это может быть полное имя класса процессора (например, `\MODX\Revolution\Processors\Resource\Create`), относительный путь в стиле 2.x (`resource/create`) или относительный квалифицированный путь (`Resource\Create`). Подробнее о том, как `$action` преобразуется в конкретный процессор, см. раздел _Логика загрузки процессора_ ниже.
- `array $scriptProperties`: массив свойств, передаваемых процессору. На работу `modX::runProcessor` это не влияет. Эти свойства использует сам процессор.
- `array $options`: опции, которые `modX::runProcessor` применяет при обработке запроса. Поддерживается только:
    - `processors_path`: переопределяет путь по умолчанию для поиска процессора. Если указано, MODX ищет процессоры не в стандартном каталоге. В основном это нужно сторонним дополнениям с собственным connector и пользовательскими процессорами.

## Логика загрузки процессора

Начиная с 3.0, `modX::runProcessor` выполняет следующие шаги в указанном порядке, чтобы найти класс процессора для выполнения. После совпадения он запускает процессор и прекращает поиск.

Во всех случаях проверяется, что найденный класс реализует `\MODX\Revolution\Processors\Processor`.

1. Проверяется, является ли переданный `$action` допустимым полным именем класса, который можно создать напрямую. Можно передать полное имя класса процессора, если оно загружено или доступно через autoload. Например, `\MODX\Revolution\Processors\Resource\Create` подхватывается autoload и его можно передать как `$action`.
2. `$action` преобразуется в имя класса в пространстве имён `\MODX\Revolution\Processors\`. Для этого строка делится по слэшу (`/`), первая буква каждой части приводится к верхнему регистру, части соединяются обратным слэшем (`\`). Если в сгенерированном пути есть `\Tv\`, он заменяется на `\TemplateVar\`, потому что в 3.0 этот путь переименовали. Например, при `$action` равном `resource/create` получается `Resource\Create`, а с корневым пространством имён класс `\MODX\Revolution\Processors\Resource\Create`.
3. MODX начинает сканировать файлы. По умолчанию он ищет в `core/src/Revolution/Processors/` файл `{$action}.class.php`. Например, для `$action` `something/cool` путь будет `core/src/Revolution/Processors/something/cool.class.php`. Это удобно для сторонних процессоров, если передать `$options['processors_path']` с пользовательским корневым каталогом. Например, `['processors_path' => '/absolute/path/to/core/components/doodles/processors/']` даёт поиск по `/absolute/path/to/core/components/doodles/processors/something/cool.class.php`.
4. Когда файл найден в ожидаемом месте, он подключается.
    a. Если подключение файла **возвращает** строку, эта строка считается именем класса.
    b. Если файл ничего не возвращает, `$action` преобразуется в стандартное имя файла процессора. Строка делится по слэшу, из каждой части удаляются точки, подчёркивания и дефисы (`._-`). Первая буква каждой части приводится к верхнему регистру. К результату добавляется префикс `mod` и суффикс `Processor`. Например, `my/custom/action` превращается в `modMyCustomActionProcessor`.

## Пример

Запуск процессора создания ResourceGroup:

``` php
// create new resource group programatically
$response = $modx->runProcessor('security/resourcegroup/create', array(
   'name' => 'Test', // the name of the new resource group
   'access_contexts' => 'mgr,web', // the context(s) the new resource group is restricting access in
   'access_admin' => 1, // adds access to this resource group for Administrators
   'access_parallel' => 1, // creates a new user group "Test" parallel to the resource group
   'access_usergroups' => 'Editors', // adds access to the new resource group for the user group "Editors"
));
```

Разные процессоры требуют разные параметры. Смотрите документацию или исходный код нужного процессора.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Using runProcessor](extending-modx/processors/using-runprocessor)
