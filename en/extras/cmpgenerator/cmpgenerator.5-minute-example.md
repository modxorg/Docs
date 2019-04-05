---
title: "5 minute example"
_old_id: "809"
_old_uri: "revo/cmpgenerator/cmpgenerator.5-minute-example"
---

Complete these steps after you have installed CMPGenerator.

1. Created table modx\_test with your favorite SQL GUI or command prompt:

``` sql 
CREATE TABLE `modx_test` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `description` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8


```

1. Go to the Manager then CMPGenerator and click on Create Package 
   Fill in the table info we just created and pick a package name: 
  ![](/download/attachments/37683291/create-package2.2.png?version=2&modificationDate=1331827781000)
2. Once you hit save all the files are created in /your MODX/core/components/mytest/ 
  ![](/download/attachments/37683291/created-folders-files.png?version=1&modificationDate=1325784884000)
3. Now go lets see if this worked and create a simple snippet to test out our newly created table. 
   Name the Snippet: mytest and insert the following code:

**mytest Snippet Code** ``` javascript 
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

// Note for all HTML you should be using Chunks see: <a href="display/revolution20/Chunks#Chunks-ProcessingChunkviatheAPI"> display/revolution20/Chunks#...</a>
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

1. Now put the snippet in a resource and run it a few times.

``` php 
[[!mytest]]

```

You should see something like this (note my test page has CSS assigned to tables): 
![](/download/attachments/37683291/snippet-output.png?version=1&modificationDate=1325784884000)