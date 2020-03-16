---
title: "Генерация модели"
translation: "extending-modx/xpdo/custom-models/generating-the-model-code"
---

Чтобы использовать недавно созданную XML схему, вам необходимо создать PHP скрипт, который будет анализировать XML схему внутри xPDO PHP классов и карт.

## Загрузка xPDOManager и xPDOGenerator

Создайте файл PHP, где у вас будет доступ к xPDO инстансу. Затем давайте установим вывод логов в браузер через Log Target и немного расширим его, чтобы получить более подробную информацию.

``` php
$xpdo->setLogLevel(xPDO::LOG_LEVEL_INFO);
$xpdo->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
```

Теперь нам надо будет загрузить классы [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager") и [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator"), чтобы помочь нам с развертыванием модели.

``` php
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
```

## Настройка шаблонов класса и карты

Установка шаблонов совершенно необязательна. xPDO предоставляет вам несколько базовых шаблонов, которые будут работать нормально.

xPDO предоставляет вам шаблоны классов и карт по умолчанию. Однако для этого примера мы хотим создать файлы классов и карт с PHPDoc форматированием вверху, поэтому нам нужно переопределить шаблоны классов и карт по умолчанию.

Для этого мы просто переопределим переменные в объекте $generator:

``` php
$generator->classTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
class [+class+] extends [+extends+] {}
?>
EOD;
$generator->platformTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\\\', '/') . '/[+class-lowercase+].class.php');
class [+class+]_[+platform+] extends [+class+] {}
?>
EOD;
$generator->mapHeader= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
EOD;
```

Обратите внимание на тег phpdoc-package, который мы создали. Это взято из атрибута нашего тега "модель", который мы определили ранее в схеме. Эти шаблоны предоставят нам основу для наших файлов классов и карт с PHPDoc комментариями.

## Генерация файлов

Наконец, мы хотим разобрать это в файл:

``` php
$schema = '/path/to/storefinder.mysql.schema.xml';
$target = '/path/to/storefinder/model/';
$generator->parseSchema($schema,$target);
```

Этот код исполняет метод анализа схемы, а затем выводит общее время, затраченное скриптом на выполнение. Запустите его и вуаля! - наш model/ каталог теперь содержит подкаталог storefinder/, который заполнен всеми нашими файлами карт и классов.

## Заключение

С помощью [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator") преобразовывать файлы ваших XML схем в используемые PHP классы и карты очень просто. Теперь, когда у нас есть наш PHP код, мы перейдем к этапам [как его использовать](extending-modx/xpdo/creating-objects "Использование xPDO модели").

В качестве примера построения классов модели из существующей базы данных взгляните на следующую страницу: [Обратный инжиниринг xPDO классов из существующей таблицы базы данных](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Обратный инжиниринг xPDO классов из существующей таблицы базы данных")
