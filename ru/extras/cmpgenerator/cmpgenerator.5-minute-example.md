---
title: "5 minute example"
description: "Быстрый пример CMPGenerator: таблица, пакет и тестовый сниппет"
translation: "extras/cmpgenerator/cmpgenerator.5-minute-example"
---

Выполните шаги после установки CMPGenerator.

1. Создайте таблицу modx\_test в SQL GUI или из командной строки:

``` sql
CREATE TABLE `modx_test` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `description` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8
```

1. Откройте менеджер, CMPGenerator и Create Package.
   Заполните данные таблицы и имя пакета:
  ![](create-package2.2.png)
2. После сохранения файлы появятся в /your MODX/core/components/mytest/
  ![](created-folders-files.png)
3. Проверьте результат простым тестовым сниппетом.
   Имя сниппета: mytest, код:

Код сниппета mytest:

``` php
<?php
/**
 * mytest table
 */
$output = '';// this is what the snippet will return

// add package so xpdo can be used:
$package_path = $modx->getOption('core_path').'components/mytest/model/';
// see the scheme file and the xml model element and you will see the attribute package and that must match here
$modx->addPackage('mytest', $package_path);

// lets add some data!
// see the scheme file and the xml object element and you will see the attribute class and that must match here
// the class name is taken from table names without the prefixed, and is capitalized.
$myRow = $modx->newObject('Test');

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

// Note for all HTML you should be using Chunks see: <a href="https://docs.modx.com/current/en/building-sites/elements/chunks"> chunks</a>
/* build query */
$query = $modx->newQuery('Test');
$rows = $modx->getIterator('Test', $query);

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

1. Поместите сниппет в ресурс и выполните несколько раз.

``` php
[[!mytest]]
```

Вы увидите примерно следующее (на тестовой странице у меня задан CSS для таблиц):

![](snippet-output.png)
