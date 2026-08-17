---
title: "Использование пользовательских таблиц базы данных"
translation: "extending-modx/tutorials/using-custom-database-tables"
---

В этом руководстве рассказывается, как использовать MODX для создания пользовательской таблицы базы данных и связывания её с объектной моделью xPDO. К концу вы научитесь писать простую XML-схему для таблицы, создавать PHP-классы и читать и записывать данные через MODX.

## Что изменилось в MODX 3?

MODX 3 приносит пространства имён PHP в XML-схему и файлы классов, а также новую функциональность bootstrap для загрузки зависимостей. Меняется и структура map-файлов MySQL в генерируемой модели. Пройдём простой пример как отправную точку. Дальше можно усложнять: конфигурационные файлы, вспомогательные функции. Сначала посмотрим минимум для создания пользовательской таблицы и покажем, что из неё можно читать и писать.

**ПРИМЕЧАНИЕ**: материал переработан из прежнего примера StoreFinder.

**ЕЩЁ ПРИМЕЧАНИЕ**: эта методология не обратно совместима с MODX 2.x. Руководство рассчитано на MODX 3. Эквивалент для 2.x: [Using Custom Database Tables](/2.x/en/extending-modx/tutorials/using-custom-database-tables "Using Custom Database Tables")

## Ключевые термины и стандарты

По итогам недавних обсуждений зафиксируем терминологию и то, к чему она относится. Это же стандартные практики для единообразия.

### Пространство имён PHP

   1. В MODX 3 модели и процессоры используют пространства имён PHP и автозагружаются.
   2. Например, в начале файлов классов Model MODX генерирует объявление namespace:

      ```php
	  <?php

	  namespace MyComponent\Model\MyClass
	  ```

### Пространство имён компонента

   1. В менеджере создаётся запись namespace: это не PHP namespace, имя должно быть в нижнем регистре. По нему определяются пути к компоненту: Core Path и Assets Path.
   2. Пункты меню указывают этот namespace в нижнем регистре. MODX направляет запрос менеджера на нужную страницу.

### Атрибут package в XML-схеме

   1. В MODX 3 атрибут package: это ваш PHP namespace. Значение попадает в начало PHP-файлов модели и должно быть в CamelCase/PascalCase.

### Структура каталогов и регистр

   1. Все каталоги в нижнем регистре, кроме тех, что внутри `src/`. В `src/` пути зеркалят регистр классов (camelCase или PascalCase).
      1. Пример пути: `{core_path}/components/mycomponent/src/Model/MyClass.php`
      2. Соответствующий PHP namespace: `MyComponent\Model\MyClass`
      3. Префикс `MyComponent` соответствует каталогу `mycomponent/src/`. Всё дальше повторяется и в структуре каталогов, и в регистре.

## Изменения в структуре каталогов

MODX 3 добавляет Composer, PHP namespace и каталоги исходников. Каталог `src/` MODX использует в собственной структуре и он готовит к Composer и другим возможностям, если компонент усложнится.

Структура в этом руководстве короче и функциональнее. Она чуть отличается от старых примеров. Раньше имя пакета часто повторялось в пути, например `doodles/core/components/doodles/model/doodles`. Для одного пути это лишнее.

Если вы уже работали с MODX, знаете: `/core/components/`: место установки пользовательских компонентов (Extras). Если не планируете публикацию как Extra, структуру можно упростить. Для публикации позже, возможно, придётся рефакторить код.

В примере создаём папку проекта в корне сайта и используем `/core/components/`, чтобы потом собрать пакет. Каталог `project1` лежит в корне веб-сайта:

```
project1/
  _build/
  core/
    components/
      todo/
        src/
          Model/
        schema/
        bootstrap.php
```

Создайте эти каталоги, кроме `Model/`. Каталог модели создаст скрипт `build.tables.php`.

---

Если бы мы делали Custom Manager Page (CMP), понадобилась бы папка assets. Здесь фокус на данных в части 1, поэтому CMP и assets пока опускаем.

Также в списке есть `bootstrap.php`. Подробности: в документации, ниже разберём на примере.

Файл даёт другой способ загрузки классов через `addPackage` для модели. Через него доступен автозагрузчик MODX и регистрация дополнительных PSR-4 namespace с каталогом `src/`.

Отсюда можно инициализировать сервисный класс и добавить его в DI-контейнер MODX. Сервис будет доступен по всей системе: плагины, события, сниппеты и т.д.

> Подробнее: [Namespaces and Bootstrapping Services](extending-modx/namespaces#bootstrapping-services "Namespaces | Bootstrapping Services")

## Данные и таблицы

Возьмём классический пример списка дел. Первое дело: «Собрать список дел в MODX 3!». Опишем таблицы и структуру.

Родительская таблица ***To-Do List*** и дочерняя ***To-Do Tasks***. От списка к задачам: связь один ко многим.

* Имя таблицы: `modx_td_list`, поля:
    * `name`
    * `description`
* Имя таблицы: `modx_td_task`, поля:
    * `short_description`
    * `due_date`
    * `completed` (boolean)

После определения структуры создадим файл схемы модели. Схема: XML-представление таблиц БД. xPDO разбирает его в PHP-карты: массивы схемы и связей.

## Определение XML-схемы

Структура схемы для MODX 3 существенно не менялась. Ключевое: как используется атрибут `package` и как он связан со сборкой. Расширяемые классы теперь с namespace: `xPDOSimpleObject` стал `xPDO\Om\xPDOSimpleObject`. Для объектов xPDO добавляйте `xPDO\Om\`, для MODX, например `modElement`,: `MODX\Revolution\`.

### Расположение файлов MODX и xPDO

Префикс `MODX` соответствует `core/src/` и дальше зеркалит структуру. Путь к modElement: `core/src/Revolution/modElement.php`. Если класс неочевиден, смотрите документацию и структуру каталогов.

xPDO лежит в `core/vendor/xpdo/src/xPDO/`, дальше: как у класса. Путь к `xPDOSimpleObject`: `core/vendor/xpdo/src/xPDO/Om/xPDOSimpleObject.php`.

### Содержимое файла схемы

Ниже две таблицы и связь родитель/потомок через composite/aggregate. Записи задают владельца и тип связи. При удалении списка с 20 задачами удалятся и список, и задачи.

> Подробнее о выборе `xPDOObject` и `xPDOSimpleObject`: [Comparing xPDOObject and xPDOSimpleObject](https://modx.com/blog/comparing-xpdoobject-and-xpdosimpleobject?utm_source=MODX+News&utm_campaign=df07d658fe-weekly_recap_21_12_10_&utm_medium=email&utm_term=0_27b5d94031-df07d658fe-34671909&goal=0_27b5d94031-df07d658fe-34671909&mc_cid=df07d658fe&mc_eid=21ae2973a7 "Comparing xPDOObject and xPDOSimpleObject"). Здесь используем `xPDOSimpleObject`, чтобы получить автоинкрементный первичный ключ `id`.

Создайте в каталоге schema файл `todo.mysql.schema.xml`. Полный путь от project1: `project1/core/components/todo/schema/todo.mysql.schema.xml`. Скопируйте XML ниже и сохраните.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="ToDo\Model" baseClass="xPDO\Om\xPDOObject" platform="mysql"  defaultEngine="InnoDB" version="3.0">
	
	<object class="tdList" table="td_list" extends="xPDO\Om\xPDOSimpleObject">
		<field key="name" dbtype="varchar" precision="128" phptype="string" default="" />
		<field key="short_description" dbtype="varchar" precision="255" phptype="string" default="" />

		<index alias="name" name="name" primary="false" unique="false" type="BTREE">
			<column key="name" length="" collation="A" null="false" />
		</index>

		<composite alias="Task" class="ToDo\Model\tdTask" local="id" foreign="list" cardinality="many" owner="local" />
	</object>

	<object class="tdTask" table="td_task" extends="xPDO\Om\xPDOSimpleObject">
		<field key="list" dbtype="int" precision="10" phptype="integer" null="false" default="" />
		<field key="task_description" dbtype="varchar" precision="255" phptype="string" default="" />
		<field key="due_date" dbtype="datetime" phptype="datetime" null="true" default="NULL" />

		<index alias="task_description" name="task_description" primary="false" unique="false" type="BTREE">
			<column key="task_description" length="" collation="A" null="false" />
		</index>

		<aggregate alias="List" class="ToDo\Model\tdList" local="list" foreign="id" cardinality="one" owner="foreign" />
	</object>

</model>
```

**Примечание**: в MODX 3 в aggregate и composite атрибут `class` ***должен содержать полное имя класса с namespace***.

Тег model и атрибуты задают свойства компонента/Extra:

*   **package**: PHP namespace пакета xPDO. Важное изменение MODX 3. Как уже сказано, *это значение попадает в PHP-файлы как **namespace***.
*   **baseClass**: базовый класс для всех определений. Если не планируете своё расширение `xPDOObject`, оставьте по умолчанию.
*   **platform**: MySQL (mysql).
*   **defaultEngine**: движок таблиц по умолчанию, обычно InnoDB или MyISAM. MODX рекомендует InnoDB.
*   **phpdoc-package**: MODX напрямую не использует, но можно в Documentation Blocks. Ожидается PHP namespace в MODX 3. Если не задать, MODX подставит сам. В docblock классов будет `@package MyComponent\Model`.
*   **phpdoc-subpackage**: по [phpDocumentor](https://docs.phpdoc.org/guide/references/phpdoc/tags/subpackage.html) устарело. Namespace уже объединяет package и subpackage.

---

> Подробнее о схемах MODX: [Defining a Schema | Database and Tables](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables#defining-tables)). Дополнительно про атрибуты Class, Table, Extends и примеры.
> 
> О путях: [Namespaces | Usage](extending-modx/namespaces#usage).

## Запись namespace компонента в менеджере

Данные записи namespace компонента те же, что в MODX 2. Не путайте с PHP namespace. Имя и пути: в нижнем регистре. MODX 3 добавляет ещё одно применение namespace компонента, об этом в следующем разделе.

Откройте Namespaces и создайте новую запись.

<img src="img/create-namespace-manager.png" 
alt="Create the Namespace Entry in the Manager"
width="400px" />

Заполните поля как на скриншоте и сохраните. *(Пути должны заканчиваться слэшем.)*

> **Name**: todo<br/>
> **Core Path**: {base_path}project1/core/components/todo/<br/>
> **Assets Path**: {base_path}project1/assets/components/todo/

**Что такое base_path?** `{base_path}` MODX подставляет базовый путь установки. Это корень сайта или подкаталог, если MODX установлен не в корень.

<img src="img/new-namespace-form.png" 
alt="Create the Namespace Entry in the Manager"
width="600" />

## Как MODX использует запись namespace компонента?

С MODX 3 core path в записи namespace: место, где MODX ищет `bootstrap.php`. Bootstrap подключает классы, автозагрузчик, сервисы и другие задачи при старте.

### Дополнительно для любознательных :)

В index вызывается initialize с контекстом «web»: `$modx->initialize('web')`. В `modX.php` initialize вызывает `_initNamespaces()`. Функция читает namespace из кеша, перебирает записи и подключает `bootstrap.php`, если файл есть и читается.

<img src="img/init-namespaces-function.png" 
alt="The initNamespaces function"
width="600" />

## Скрипт сборки схемы

Создайте `build.schema.php` в `_build/`. Содержимое ниже. В другой документации пишут, что «MODX_API_MODE» устарел. Похоже, это не так: константа есть в сборке 3.0.0-rc1. Значение true блокирует вызов `$modx->handleRequest()`.

```php
<?php

// Set API Mode to true
define('MODX_API_MODE', true);

// Include the main index.php file to load MODX in API Mode
@include(dirname(__FILE__, 3) . '/index.php');

/**
 * @var \MODX\Revolution\modX $modx
 * 
 */

// Get the manager and generator
$manager = $modx->getManager();
$generator = $manager->getGenerator();

// Define the paths needed
//{base_path}/project1/
$projectRootDir = MODX_BASE_PATH . 'project1/';

//{base_path}/project1/core/components/todo/
$corePath = $projectRootDir . 'core/components/todo/';

//{base_path}/project1/core/components/todo/schema/todo.mysql.schema.xml
$schemaFile = $corePath . "schema/todo.mysql.schema.xml";

if (is_file($schemaFile)) {
	echo("Parsing schema: $schemaFile".PHP_EOL);
	// Parse the schema to generate the class files
	$generator->parseSchema(
		$schemaFile, 
		$corePath . 'src/',
		[
			"compile" => 0,
			"update" => 0,
			"regenerate" => 1,
			"namespacePrefix" => "ToDo\\"
		]
	);
}
else {
	echo("Schema file path invalid: $schemaFile".PHP_EOL);
}
```

В примерах 2.x встречаются главный класс или блоки с getProperty. Здесь пути захардкожены для простоты. Если папка проекта не в корне сайта, подстройте пути.

Тайминги из скрипта убраны: для 5 и меньше таблиц сборка и так быстрая.

Шаги прокомментированы в скрипте. Подключаем index, а не класс MODX напрямую. В index есть проверка API Mode, которую мы включаем.

Запустите `php build.schema.php` из `_build`. Появится каталог `src/Model/` и другие файлы:

<img src="img/files-generated.png" 
alt="Files that were generated"
width="230" />

## Настройка bootstrap.php

Классы уже есть, объекты можно создавать через `xPDO::newObject`, но таблиц в БД ещё нет. Перед созданием таблиц настроим bootstrap, чтобы классы загружались при каждой инициализации MODX.

MODX 3 по-прежнему вызывает `addPackage`, формат чуть другой. Внутри `addPackage` namespace модели добавляется в PSR-4 автозагрузчик. Пока достаточно одной строки с `addPackage`.

Блок комментариев с переменными поможет редактору подсказывать функции и видеть `$modx`.

Создайте `bootstrap.php` в `components/todo/` и вставьте код ниже.

```php
<?php

/**
 * @var \MODX\Revolution\modX $modx
 * @var array $namespace
 */

// Load the classes
$modx->addPackage('ToDo\Model', $namespace['path'] . 'src/', null, 'ToDo\\');
```

**Предупреждение**: `bootstrap.php` легко «ломает» менеджер. Опечатка в PHP, неверное имя класса или echo в файле: менеджер перестанет загружаться. Уберите лишний вывод, и всё заработает снова.

## Скрипт создания таблиц

Похож на скрипт схемы, те же пути. Можно объединить в один build: сначала схема, потом таблицы. Иногда удобнее запускать отдельно и убедиться, что файлы схемы сгенерировались.

> За рамками руководства: xPDO CLI для записи и сборки, можно включить в composer.json.

Создайте `build.tables.php` в `_build/` и скопируйте код ниже.

```php
<?php

// Set API Mode
define('MODX_API_MODE', true);

// Include the index to load MODX in API Mode
@include(dirname(__FILE__, 3) . '/index.php');

/**
 * @var \MODX\Revolution\modX $modx
 * 
 */

// Classes to loop through
$classes = [
	'ToDo\Model\tdList',
	'ToDo\Model\tdTask'
];

// Get the manager
$manager = $modx->getManager();

// Loop through our classes
foreach ($classes as $class) {
	// Check if the class exists
	if (class_exists($class)  ) {
		// Create the table
		echo("Creating table for class: $class".PHP_EOL);
		$manager->createObjectContainer($class);
	}
	else {
		echo("Unable to load model class: $class".PHP_EOL);
	}
}
```

Запустите `php build.tables.php`.

Если вывод похож на ниже: готово!

![Tables Built Success Message](img/build-tables-success.png)

В phpMyAdmin или другом клиенте MySQL найдите таблицы с «td». Должно быть две новые.

![Database Tables Generated](img/database-tables-generated.png)

## Использование новой модели

Два примера. Первый: модели в сниппете и запись данных. Второй: чтение и вывод. Раздел про сниппеты для фронтенда.

В следующих руководствах можно развернуть это в полноценный Extra с Custom Manager Page.

Для проверки создайте или измените ресурс с HTML ниже. Обходим сложности с шаблоном и итерацией: вывод в `<pre>` как лог. Покажет все списки и задачи.

Я заменил содержимое домашней страницы MODX на вызов сниппета `ToDo`. `!`: без кеша.

```html
<pre>[[!ToDo]]</pre>
```

Создайте сниппет с именем `ToDo`. Вставьте скрипт ниже. Комментарии по ходу. Можно было разделить на два сниппета или CLI для генерации и отдельный для вывода.

Здесь всё в одном месте. Параметр `&action=generate` создаст списки и задачи из массива данных.

**ПРИМЕЧАНИЕ**: повторная загрузка с параметром action добавит дубликаты с новыми id.

Вторая половина читает данные и собирает строку. Подробнее о чтении и записи:

* [Creating Objects](https://docs.modx.com/3.x/en/extending-modx/xpdo/creating-objects "Creating Objects")
* [Retrieving Objects](https://docs.modx.com/3.x/en/extending-modx/xpdo/retrieving-objects "Retrieving Objects")
* [Add Many | Adding multiple child records with one "save"](https://docs.modx.com/3.x/en/extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "Adding multiple child records with one save")

```php
<?php
// Output
$output = "";

// Namespace
$namespace = "ToDo\\Model\\";

// Handle task generation
$action = $_GET['action'] ?: "Get Lists";
$output .= "Getting ToDo List Data: Action ($action)";

if ($action === 'generate') {
    // Define our todo list data as an array
    $data = [
        [   
            "name" => "Grocery List",
            "short_description" => "Things to buy at the store",
            "tasks" => [
                ["task_description" => "Eggs"],
                ["task_description" => "Cheese"],
                ["task_description" => "Kale Chips"]
            ]
        ],
        [
            "name" => "House Projects",
            "short_description" => "Items to complete around the house",
            "tasks" => [
                ["task_description" => "Fix the bathroom sink leak"],
                ["task_description" => "Figure out how to fix the front door"],
                ["task_description" => "Rake up the leaves? Maybe?"]
            ]
        ]
    ];
    
    // Now let's loop through and create our lists and tasks
    foreach ($data as $createList) {
        // Get a list object and set the values
        $newList = $modx->newObject($namespace.'tdList');
        $newList->set('name', $createList['name']);
        $newList->set('short_description', $createList['short_description']);
        
        // Now before we save the list, let's create an array of task objects
        $newTaskArr = [];
        foreach ($createList['tasks'] as $createTask) {
            // Get a task object and set the values
            $newTask = $modx->newObject($namespace.'tdTask');
            $newTask->set('task_description', $createTask['task_description']);
            
            // Add the task object to the array
            $newTaskArr[] = $newTask;
        }
        
        // Use the addMany function to associate all the tasks to the parent list
        $newList->addMany($newTaskArr);
        
        // And finally call the save function to persist the data to our tables
        $newList->save();
    }
}

// Query for any lists
$lists = $modx->getCollection($namespace.'tdList', []);
$listCount = 0;

// If our query returned results
if ($lists) {
    // Loop through them
    foreach ($lists as $list) {
        // Add the list to the output
        $output .= PHP_EOL.PHP_EOL.'(' . $list->get('id') . ') '.$list->get('name');
        
        // Add the description if we have one
        if ($list->get('short_description'))
            $output .= PHP_EOL.' - '.$list->get('short_description');
            
        // Now get any tasks
        $tasks = $modx->getCollection($namespace.'tdTask', ['list' => $list->get('id')]);
        $taskCount = 0;
        
        // If we have tasks
        if ($tasks) {
            // Loop through the tasks
            foreach ($tasks as $task) {
                // Add the task to the output
                $output .= PHP_EOL."    > " . $task->get('task_description');
            }
        }
    }
}

// Return output
return $output;
```

На корневой или тестовой странице вывод будет похож на скриншот:

<img src="img/todo-final-output.png" 
alt="ToDo List Output"
width="600" />

## Смотрите также

* [Generating the xPDO Model Code](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")
* [More Examples of xPDO XML Schema Files](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files")
*[Reverse Engineer xPDO Classes from Existing Database Table](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table")
* [Creating Objects](extending-modx/xpdo/creating-objects)
* [Retrieving Objects](extending-modx/xpdo/retrieving-objects)
* [Add Many | Adding multiple child records with one "save"](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany)
