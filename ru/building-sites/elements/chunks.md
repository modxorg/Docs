---
title: "Чанки"
sortorder: "3"
translation: "building-sites/elements/chunks"
---

Чанки - это кусочки статического текста, которые вы можете повторно использовать на своем сайте. По функциям они похожи на файлы или «блоки» в других системах управления контентом. Типичными примерами чанков могут быть ваша контактная информация или уведомление об авторских правах. Хотя чанки не могут содержать никакой логики напрямую, они могут содержать вызовы [Сниппетов](extending-modx/snippets "Сниппеты"), которые являются исполняемыми битами кода PHP, которые производят динамический вывод.

## Создание

Прежде чем вы сможете использовать чанк, вы должны сначала создать и назвать его, вставив текст в менеджер MODX (Элементы --> Чанки --> Новый чанк):

![](chunk_example.jpg)

## Использование

Чтобы использовать Чанк, вы ссылаетесь на него по имени в ваших шаблонах или в содержимом вашей страницы.

``` php
[[$chunkName]]
```

Эта ссылка затем заменяется содержимым Чанка.

Вы также можете передать свойства в чанк. Скажем, у вас был чанк с именем intro и содержимым:

> Привет, `[[+name]]`. У тебя есть `[[+messageCount]]` сообщений.

Вы можете заполнить эти значения с:

``` php
[[$intro? &name=`George` &messageCount=`12`]]
```

Который будет выводить:

> Привет, George. У тебя есть 12 сообщений.

Вы могли бы сделать еще один шаг, добавив [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона") что позволяет пользователю указать свое имя для каждого ресурса:

``` php
[[!$intro? &name=`[[*usersName]]` &messageCount=`[[*messageCount]]`]]
```

или в самом чанке:

``` php
Привет, [[*usersName]]. У тебя есть [[*messageCount]] сообщений.
```

## Обработка чанка через API

Чанки также часто используются для форматирования вывода сниппетоы. Чанк может быть обработан из сниппета с помощью функции `process();`  например, с учетом следующего чанка с именем rowTpl:

``` php
<tr class="[[+rowCls]]" id="row[[+id]]">
<td>[[+pagetitle]]</td>
<td>[[+introtext]]</td>
</tr>
```

следующий сниппет кода извлекает его и обрабатывает его с массивом свойств для всех опубликованных ресурсов и возвращает отформатированные результаты в виде таблицы, устанавливая класс «alt» для четных строк:

``` php
$resources = $modx->getCollection('modResource',array('published' => true));
$i = 0;
$output = '';
foreach ($resources as $resource) {
  $properties = $resource->toArray();
  $properties['rowCls'] = $i % 2 ? '' : 'alt';

  $output .= $modx->getChunk('rowTpl',$properties);
  $i++;
}
return '<table><tbody>'.$output.'</tbody></table>';
```

### Модификация чанка через API

Чанками также можно манипулировать с помощью MODX API:

``` php
<?php
/* create a new chunk, give it some content and save it to the database */
$chunk = $modx->newObject('modChunk');
$chunk->set('name','NewChunkName');
$chunk->setContent('<p>This is my new chunk!</p>');
$chunk->save();

/* get an existing chunk, modify the content and save changes to the database */
$chunk = $modx->getObject('modChunk', array('name' => 'MyExistingChunk'));
if ($chunk) {
    $chunk->setContent('<p>This is my existing chunks new content!</p>');
    $chunk->save();
}

/* get an existing chunk and delete it from the database */
$chunk = $modx->getObject('modChunk', array('name' => 'MyObsoleteChunk'));
if ($chunk) $chunk->remove();
?>
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk "modChunk")
