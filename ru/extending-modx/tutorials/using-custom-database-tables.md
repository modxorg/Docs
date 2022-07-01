---
title: "Использование пользовательских таблиц базы данных"
translation: "extending-modx/tutorials/using-custom-database-tables"
---

В этом руководстве рассказывается, как использовать MODX для создания пользовательской таблицы базы данных и связывания ее с объектной моделью xPDO. В конце этого руководства вы должны были научиться писать простую XML-схему для своей таблицы, создавать файлы классов PHP, а также читать и записывать данные через MODX.

## Что изменилось в MODX 3?

MODX 3 принес пространства имен PHP в вашу XML-схему и файлы классов, а также новую функциональность загрузки любых зависимостей. Он также меняется структура файла карты MySQL в модели, которую он генерирует. Давайте рассмотрим простой пример в качестве отправной точки. Далее вы можете делать более сложные вещи, например, используя файлы конфигурации или вспомогательные функции. Но для начала давайте посмотрим на минимум, необходимый для создания пользовательской таблицы, и покажем, что мы можем писать и читать из таблицы.

**ПРИМЕЧАНИЕ.** Это было преобразовано из предыдущего примера «StoreFinder».

**ЕЩЕ ПРИМЕЧАНИЕ.** Эта методология не имеет обратной совместимости с MODX 2.x.
Это руководство предназначено для запуска и использования в MODX 3.
Вы можете увидеть эквивалентное руководство для 2.x здесь: [Использование пользовательских таблиц базы данных](https://docs.modx.com/2.x/en/extending-modx/tutorials/using-custom-database-tables).

## Ключевые термины и стандарты

Основываясь на недавних дискуссиях, мы должны уточнить в начале используемую терминологию и то, к чему она относится. Это также стандартные методы, которым следует следовать для обеспечения согласованности.

## Пространство имен PHP

1. В MODX 3 наши модели и процессоры используют пространства имен PHP и являются автозагружаемыми.
2. Например, в верхней части ваших файлов класса Model MODX генерирует объявление пространства имен php.

```php
<?php

namespace MyComponent\Model\MyClass
```

## Пространство имен компонентов

1. MODX имеет запись пространства имен, которую вы создаете в менеджере. Это отдельно от пространства имен PHP и должно быть в нижнем регистре. Оно значение используется для определения путей к конкретному пользовательскому компоненту. Основной путь и путь активов.
2. Пункты меню определяют пространство имен в нижнем регистре. MODX использует его для направления запроса менеджера на соответствующую страницу менеджера.

## Атрибут пакета схемы XML

1. Атрибут пакета в MODX 3 — это ваше пространство имен PHP. Это значение создается в верхней части ваших файлов классов модели PHP и должно быть CamelCase/PascalCase.

## Структура каталогов и капитализация

1. Все каталоги должны быть в нижнем регистре, кроме тех, которые расположены в вашем каталоге src/. Внутри src/ файлы должны отражать заглавные буквы (camelCase или PascalCase ваших классов с пространством имен)
    1. Пример расположения файла: `{core_path}/components/mycomponent/src/Model/MyClass.php`
    2. Соответствующее пространство имен PHP: `MyComponent\Model\MyClass`
    3. Префикс `MyComponent` соответствует `mycomponent/src/` каталогу. Всё последующее отражается как в структуре каталогов, так и в используемом регистре.

## Изменения в структуре каталогов

MODX 3 представляет Composer, пространство имен PHP и каталоги-источники.  Переход на каталог `src/` - результат того, что MODX3 использует его в своей собственной файловой структуре, и позволяет вам использовать Composer и другие необычные функции, если ваш компонент становится более сложным.

Структура, которую я выбрал для этого руководства, пытается сохранить функциональность и лаконичность соглашения об именах. Она немного отличается от предыдущих примеров и, надеюсь, будет менее запутанным.
В предыдущих примерах часто повторялось одно и то же имя пакета в структуре каталогов, например `doodles/core/components/doodles/model/doodles`. Для меня это было похоже на множество набросков для одного пути.

Если вы работали с MODX раньше, вы знаете, что структура `/core/components/` — это место, где устанавливаются пользовательские компоненты (дополнения). Если вы не планируете публиковать это как дополнение, вы можете упростить структуру каталогов, не используя эту часть. Но если вы хотите опубликовать его, вам, возможно, придется провести рефакторинг кода позже.
В этом примере мы будем использовать методологию, при которой мы создаем папку проекта в корневом каталоге веб-сайта и используем структуру `/core/components/`, чтобы позже мы могли собрать ее в пакет. Каталог `project1` находится в корневом каталоге нашего веб-сайта:

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

Создайте эти каталоги, кроме каталога `Model/`. Каталог модели будет создан автоматически скриптом build.tables.php
---

Если бы мы создавали пользовательскую страницу менеджера (CMP), у нас также была бы папка assets для активов. Но поскольку мы сосредоточились на аспекте данных в части 1, мы пока опустим CMP и каталог активов.

Кроме того, вы заметите в списке дополнительный файл PHP с именем `bootstrap.php`. Вы можете ознакомиться с документацией для получения дополнительной информации о том, как это работает, но мы также рассмотрим это здесь в рамках нашего примера.

Этот файл позволяет нам использовать другой метод для загрузки наших классов, вызывая `addPackage` для загрузки наших классов модели. Это также позволяет нам получить доступ к автозагрузчику MODX и зарегистрировать дополнительные пространства имен PSR-4 в соответствующем каталоге `src/`.

Отсюда мы также можем инициализировать сервисный класс и добавить его в новый контейнер внедрения зависимостей MODX. Затем мы можем получить доступ к этой службе через всю систему (плагины/события, фрагменты кода и т.д.).

> Подробнее о [пространствах имен и службах начальной загрузки](extending-modx/namespaces#bootstrapping-services "Namespaces | Bootstrapping Services")

## Данные и таблицы

В этом уроке давайте воспользуемся классическим примером списка дел. У вас никогда не может быть слишком много задач. И в качестве первого задания давайте добавим «Создать список дел в MODX 3!». Разложим таблицы и структуру.

Мы будем использовать родительскую таблицу ***To-Do List*** и дочернюю таблицу ***To-Do Tasks***. От Списка к Заданиям будет отношение один ко многим.

* Таблица: `modx_td_list`, поля:
  * `name`
  * `description`
* Таблица: `modx_td_task`, поля:
  * `short_description`
  * `due_date`
  * `completed` (boolean)

Теперь, когда мы определили начальную структуру нашей исходной таблицы, давайте создадим файл схемы, определяющий модель. Этот файл схемы представляет собой XML-представление таблиц нашей базы данных.
Затем он анализируется xPDO в «карты» в формате PHP, которые представляют собой массивы представлений схемы и ее взаимосвязей.

## Определение XML-схемы

Структура схемы существенно не изменилась для MODX 3. Ключевые изменения заключаются в том, как используется значение атрибута «пакет» и как оно связано с процессом сборки. Другое ключевое изменение заключается в том, что классы, которые вы расширяете, теперь имеют пространство имен. Например, `xPDOSimpleObject` теперь становится `xPDO\Om\xPDOSimpleObject`. Общее правило заключается в том, что для объектов xPDO добавьте пространство имен `xPDO\Om`, а для любых объектов MODX, таких, как `modElement`, используйте пространство имен `MODX\Revolution`.

### Расположение файлов MODX и xPDO

Префикс «MODX» соответствует «core/src/» и отражает структуру файла. Таким образом, путь к файлу modElement будет `core/src/Revolution/modElement.php`. Если вы не уверены, какой класс использовать, просмотрите документацию, а также используйте структуру каталогов для изучения доступных классов.

xPDO немного отличается и находится в `core/vendor/xpdo/src/xPDO/`, а затем следует за классом в структуру каталогов. Таким образом, путь к файлу `xPDOSimpleObject` будет `core/vendor/xpdo/src/xPDO/Om/xPDOSimpleObject.php`.

### Содержимое файла схемы

В приведенной ниже схеме мы определим две таблицы и добавим отношение родитель/потомок, определяемое составным/агрегированным атрибутом. Эти две записи определяют владельца и тип отношения. В нашем случае, если мы удалим список дел с 20 задачами, будут удалены и список, и задачи.

> Когда использовать `xPDOObject` vs. `xPDOSimpleObject`, Читайте пост Bob Ray: [Comparing xPDOObject and xPDOSimpleObject](https://modx.com/blog/comparing-xpdoobject-and-xpdosimpleobject?utm_source=MODX+News&utm_campaign=df07d658fe-weekly_recap_21_12_10_&utm_medium=email&utm_term=0_27b5d94031-df07d658fe-34671909&goal=0_27b5d94031-df07d658fe-34671909&mc_cid=df07d658fe&mc_eid=21ae2973a7 "Comparing xPDOObject and xPDOSimpleObject"). In our case, we'll use `xPDOSimpleObject` so that we have an "`id`" auto-incrementing primary key generated for us.

Создайте файл в каталоге вашей схемы с именем `todo.mysql.schema.xml`. Полный путь, начинающийся с project1, должен быть `project1/core/components/todo/schema/todo.mysql.schema.xml`. Скопируйте и вставьте приведенный ниже XML в свой файл и сохраните его.

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

**Примечание**: В MODX 3, любая агрегатная или составная, связь ***должна быть полным классом с пространством имен***.

Тег модели и его атрибуты определяют несколько разных вещей о вашем компоненте/дополнении:

* **package** - Пространство имен PHP пакета xPDO. Это существенное изменение в MODX 3. Как упоминалось ранее, *это значение генерируется для ваших файлов классов PHP как ваше **пространство имен**.*
* **baseClass** - Это базовый класс, от которого будут расширяться все ваши определения классов. Если вы не планируете создавать собственное расширение xPDOObject, лучше оставить значение по умолчанию.
* **platform** - MySQL (mysql).
* **defaultEngine** - Механизм таблиц базы данных по умолчанию, обычно это InnoDB или MyISAM. MODX рекомендует использовать InnoDB.
* **phpdoc-package** - Это значение напрямую не используется MODX, но может использоваться в блоках документации. Ожидаемое значение — это ваше пространство имен PHP в MODX 3, и если вы его не заполните, MODX сопоставит его автоматически. Вы увидите это в блоках документации ваших файлов классов как `@package MyComponent\Model`.
* **phpdoc-subpackage** - Согласно [phpDocumentor](https://docs.phpdoc.org/guide/references/phpdoc/tags/subpackage.html), это считается устаревшим. В этом нет необходимости, так как пространство имен представляет как пакет, так и подпакет в одном значении.

---

> Подробнее о схемах MODX см. [Определение схемы | База данных и таблицы](custom-models/defining-a-schema/database-and-tables#defining-tables). Это дает дополнительные сведения об атрибутах Class, Table и Extends, а также дополнительные примеры.
>
> Дополнительные сведения о том, как определяются и используются пути, см. [Пространства имен | Применение](extending-modx/namespaces#usage).

## Создайте запись пространства имен компонентов в админке

Данные, определенные в вашей записи пространства имен компонентов, остаются такими же, как в MODX 2, и их не следует путать с вашим пространством имен PHP. И «Имя», и пути должны быть строчными. MODX 3 добавляет одно дополнительное использование пространства имен компонентов, но это описано в следующем разделе.
Создайте новое пространство имен

<img src="img/create-namespace-manager.png"
alt="Создание записи пространства имен в админке"
width="400px" />

Fill in the fields as displayed and save the record. *(Make sure that your paths end with a trailing "slash")*.

> **Название**: todo<br/>
> **Путь к ядру**: {base_path}project1/core/components/todo/<br/>
> **Путь к активам**: {base_path}project1/assets/components/todo/

**Что такое base_path?**:  `{base_path}` это параметр, который MODX заменяет базовым путем установки для вашей текущей установки MODX. Это может быть корневой каталог вашего веб-сайта или подкаталог, если MODX был установлен в подкаталог.

<img src="img/new-namespace-form.png"
alt="Создание записи пространства имен в админке"
width="600" />

## Как MODX использует запись пространства имен компонентов?

Начиная с MODX 3, основной путь в вашей записи пространства имен — это место, где MODX ищет ваш файл `bootstrap.php`. Файл начальной загрузки позволит нам добавить наши файлы классов, подключиться к автозагрузчику, зарегистрировать службу или выполнить любые другие необходимые задачи запуска.

### Дополнительные подробности для отличников :)

Если вы посмотрите на индексный файл, то увидите, что он вызывает функцию инициализации и проходит в «web» контексте: `$modx->initialize('web')`. Если вы затем посмотрите на функцию инициализации в основном файле `modX.php`, вы увидите, что она вызывает `_initNamespaces()`. Эта функция загружает данные пространства имен из кеша, перебирает записи, затем проверяет и требует файл `bootstrap.php`, если он присутствует и доступен для чтения.
<img src="img/init-namespaces-function.png"
alt="Функция initNamespaces"
width="600" />

## Пишем наш скрипт схемы сборки

Создайте файл `build.schema.php` в вашем каталоге `_build/`.  Он должен содержать код PHP представленный ниже. В другой документации, вы можете встретить отсылки на то, что "*MODX_API_MODE*" устарел. Кажется, это не так. Он все еще присутствует в текущей версии 3.1.0-pl. Установка этой константы в true предотвращает выполнение последней функции `$modx->handleRequest()`.

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

В других примерах из версии 2.x вы увидите файл основного класса или блоки конфигурации с вызовами getProperty. Чтобы сделать этот первый шаг как можно более простым, я сделал пути понятными и жестко запрограммированными. Если у вас нет папки проекта в корневом каталоге веб-сайта, вам необходимо настроить ее в зависимости от местоположения вашей папки.
Я также удалил все тайминги в сценарии. Я никогда не видел особой необходимости включать время запуска и остановки в миллисекундах. Большинство проектов имеют 5 или менее пользовательских таблиц, и процесс сборки выполняется очень быстро.
Шаги в нашей сборке прокомментированы в самом скрипте. Я пошел по пути простого включения индексного файла, а не прямого вызова класса MODX. В индексе есть проверка для режима API, для которого мы установили здесь значение true.
Теперь давайте продолжим и создадим нашу схему для создания файлов классов. Для этого просто запустите файл в командной строке, используя `php build.schema.php` из вашего каталога `_build`. Теперь вы должны увидеть новый каталог `src/Model/` и еще несколько файлов:
<img src="img/files-generated.png"
alt="Файлы, которые были сгенерированы"
width="230" />

## Настройте наш файл Bootstrap.php

Теперь, когда у нас есть файлы классов, мы можем двигаться вперед и создавать объекты с помощью функции `xPDO::newObject`, как описано в документации, но у нас нет таблицы базы данных, в которую мы могли бы их сохранить. Прежде чем мы сможем построить таблицы, давайте создадим файл Bootstrap, чтобы наши классы загружались каждый раз при инициализации MODX.
MODX 3 по-прежнему использует вызов addPackage, но в немного другом формате. Внутри `addPackage` он также добавляет пространство имен нашей модели в автозагрузчик PSR-4. Просто используйте приведенный ниже скрипт. И поскольку у нас нет никаких сервисов для регистрации, все, что нам действительно нужно, это одна строка кода, которая вызывает функцию `addPackage` для загрузки файлов модели для нашей таблицы package/custom.
Добавление блока комментариев, определяющего ваши доступные переменные, позволит выбранному вами текстовому редактору показать вам подробности о функциях и распознать существование `$modx`.
Создайте файл `bootstrap.php` в каталоге `components/todo/` и скопируйте туда PHP код, представленный ниже

```php
<?php

/**
 * @var \MODX\Revolution\modX $modx
 * @var array $namespace
 */

// Load the classes
$modx->addPackage('ToDo\Model', $namespace['path'] . 'src/', null, 'ToDo\\');
```

**Предупреждение**: файл `bootstrap.php` кажется очень чувствительным к "взлому" админки. Если, например, если у вас есть опечатка в вашем PHP или неправильное имя класса, или вы попытаетесь повторить что-либо здесь, это приведет к поломке админки MODX  и неправильной загрузке. Удаление журнала или echo восстановит его рабочее состояние.

## Пишем наш скрипт построения таблиц

Это очень похоже на сценарий схемы и имеет все те же общие пути. Вы можете объединить файлы и иметь один файл сборки, который создает схему, а затем создает таблицы базы данных. Я обнаружил, что может быть полезно запускать их независимо и убедиться, что ваши файлы схемы успешно сгенерированы.
> Помимо этого руководства, вы также можете использовать новый интерфейс командной строки xPDO для записи файлов и сборки. Это также можно включить в настройки composer.json.

Создайте `build.tables.php` в вашем каталога `_build/`  и скопируйте туда PHP код, представленный ниже

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

Теперь запустите этот файл в командной строке с помощью `php build.tables.php`;

Если вы увидели что-то подобное в своем выводе, поздравляем!

![Сообщение об успешном построении таблиц](img/build-tables-success.png)

Проверьте phpMyAdmin или предпочитаемый вами редактор MySQL и найдите имя таблицы, содержащее «td». У вас должно получиться две новые таблицы.

![Сгенерированные таблицы базы данных](img/database-tables-generated.png)

## Использование нашей новой модели

В этом разделе мы рассмотрим два примера. В нашем первом мы покажем, как использовать наши модели в сниппете и создавать новые записи. Мы также рассмотрим, как мы можем читать из этих таблиц и отображать данные. Материал этого раздела будет из сниппетов для использования во фронтэнде.
Надеемся, что в следующих руководствах мы сможем расширить это до полноценного дополнения со страницей пользовательского менеджера.

Чтобы протестировать наши таблицы, мы создадим или изменим ресурс, чтобы включить приведенный ниже HTML. Мы избегаем некоторых сложностей при передаче шаблона в наш сниппет или итерации. Вместо этого мы обернем вывод в теги «pre» и будем использовать его как функциональность типа «log». Он выведет все списки дел и задачи.
Я изменил домашнюю страницу по умолчанию, которая поставляется с MODX, и заменил поле содержимого этим значением. Это говорит MODX вывести результат запуска сниппета с именем «ToDo». `!` говорит, что он должен работать без кэширования.

```html
<pre>[[!ToDo]]</pre>
```

Идем дальше и создаем новый сниппет. Дайте ему то же имя, «ToDo», чтобы соответствовать нашему содержимому HTML. Затем вставьте скрипт ниже. Это может показаться запутанным, но я добавил комментарии по всему сценарию, чтобы помочь. Это могло быть создано как два отдельных фрагмента или сценарий командной строки для генерации данных, а затем фрагмент для вывода данных.
Для этого примера я объединил его, чтобы все было в одном месте. Если вы загрузите страницу со своим фрагментом и добавите параметр `& action=generate`, он создаст списки дел и задачи, указанные в массиве данных.
**ПРИМЕЧАНИЕ**: Если вы загрузите страницу более одного раза с установленным параметром «действие», будут созданы дополнительные повторяющиеся записи в таблицах, но с новыми уникальными «идентификаторами».
Вторая половина скрипта просто считывает данные и выводит их в строку. Дополнительные сведения о получении и записи данных см. в следующих ресурсах:

* [Создание объектов](https://docs.modx.com/3.x/en/extending-modx/xpdo/creating-objects "Creating Objects")
* [Получение объектов](https://docs.modx.com/3.x/en/extending-modx/xpdo/retrieving-objects "Retrieving Objects")
* [Добавить  Many | Добавление нескольких дочерних записей одним «сохранением»](https://docs.modx.com/3.x/en/extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "Adding multiple child records with one save")

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

При переходе на корневую страницу сайта или на страницу, которую вы использовали в качестве тестовой, вы должны увидеть результат, аналогичный приведенному ниже:

<img src="img/todo-final-output.png"
alt="ToDo List Output"
width="600" />

## Смотрите также

* [Генерация кода модели xPDO](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")
* [Дополнительные примеры файлов XML-схемы xPDO](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files")
  *[Обратный инжиниринг классов xPDO из существующей таблицы базы данных](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table")
* [Создание объектов](https://docs.modx.com/3.x/en/extending-modx/xpdo/creating-objects "Creating Objects")
* [Получение объектов](https://docs.modx.com/3.x/en/extending-modx/xpdo/retrieving-objects "Retrieving Objects")
* [Добавление Many | Добавление нескольких дочерних записей одним «сохранением»](https://docs.modx.com/3.x/en/extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "Adding multiple child records with one save")
