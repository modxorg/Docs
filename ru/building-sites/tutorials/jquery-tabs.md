---
title: "Загрузка страниц с jQuery Tabs"
translation: "building-sites/tutorials/jquery-tabs"
---

## Проблема

Мы хотим на нашем сайте использовать [jQuery's tabs](http://jqueryui.com/demos/tabs/) загрузить наши ресурсы через AJAX. Как мы это делаем в MODX? Из этого туториала вы узнаете, насколько легко это сделать в MODX Revolution.

## Создание ресурсов

В ресурсах, которые вы хотите загрузить через вкладки, вам нужно просто создать все свои ресурсы с шаблоном **пустой** (или минимальным шаблоном, содержащим только то, что вы хотите внутри вкладок). Это гарантирует, что мы не загружаем ничего, кроме нужного материала - вы не захотите загружать верхний и нижний колонтитулы страницы в каждую вкладку!

## Выполнение фронтальной загрузки

Теперь мы будем использовать забавную команду jQuery `tabs()` для создания фронтальной загрузочной системы. Код будет выглядеть примерно так (извлечено из документации jquery UI):

``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">Ресурс с ID 92</a></li>
    <li><a href="[[~546]]">Ресурс с ID 546</a></li>
    <li><a href="[[~123]]">Ресурс с ID 123</a></li>
  </ul>
</div>ы
```

Великолепно! Это загружает страницы через Ajax.

## Подождите, я хочу, чтобы заголовки страниц были заголовками вкладок

Есть несколько способов сделать это: первый, вы можете использовать [getResources](/extras/getresources "getResources"), [Wayfinder](/extras/wayfinder "Wayfinder"), или использовать getField сниппет.

### Использование getResources

Для getResources убедитесь, что вы используете свойство 'tpl', в котором вы можете указать созданный чанк с именем 'myRowTpl' (или как вы хотите), который выглядит так:

``` php
<li id="[[+id]]"><a href="[[~[[+id]]]]" title="[[+longtitle]]">[[+pagetitle]]</a></li>
```

и на нашей странице вкладок:

``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    [[getResources? &parents=`123` &depth=`1` &tpl=`myRowTpl` &includeContent=`1` &includeTVs=`1`]]
  </ul>
</div>
```

### Использование Wayfinder

Для Wayfinder убедитесь, что вы используете свойство rowTpl, в котором вы можете указать созданный чанк с именем 'myRowTpl' (или как вы хотите), который выглядит так:

``` php
<li[[+wf.id]][[+wf.classes]]><a href="[[+wf.link]]" title="[[+wf.title]]">[[+wf.linktext]]</a></li>
```

и на нашей странице вкладок:

``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    [[Wayfinder? &startId=`123` &level=`1` &rowTpl=`myRowTpl`]]
  </ul>
</div>
```

### Использование снипета getField

Вы можете использовать такой код сниппета , как этот, чтобы получить заголовок страницы:

``` php
<?php
/**
 * Захватывает поле для указанного ресурса
 */

/* Установка некоторых свойств по умолчанию */
$id = $modx->getOption('id',$scriptProperties,false);
$field = $modx->getOption('field',$scriptProperties,'pagetitle');
if ($id) { /* Захват объекта ресурса */
  $resource = $modx->getObject('modResource',$id);
  if ($resource == null) return '';
} else { /* если идентификатор не указан, используйте текущий документ */
  $resource =& $modx->resource;
}
/* вернуть значение поля */
return $resource->get($field);
?>
```

Вызовите этот сниппет getField следующим образом на нашей странице вкладок:

``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">[[getField? &id=`92` &field=`pagetitle`]]</a></li>
    <li><a href="[[~546]]">[[getField? &id=`546` &field=`pagetitle`]]</a></li>
    <li><a href="[[~123]]">[[getField? &id=`123` &field=`pagetitle`]]</a></li>
  </ul>
</div>
```

Однако решение getField не такое быстрое и элегантное, как решение Wayfinder, поскольку оно должно выполнять запрос на каждой вкладке.

### Использование FastField или pdoTools

pdoTools включает расширенный парсер FastField для предоставления нового тега MODX для извлечения полей с использованием идентификатора "#", поэтому они оба работают одинаково.

``` php
<script type="text/javascript">
$(function() { $("#tabs").tabs(); });
</script>
<div id="tabs">
  <ul>
    <li><a href="[[~92]]">[[#92.pagetitle]]</a></li>
    <li><a href="[[~546]]">[[#546.pagetitle]]</a></li>
    <li><a href="[[~123]]">[[#123.pagetitle]]</a></li>
  </ul>
</div>
```

## Заключение

Обратите внимание, что все, что вы делаете, это указываете теги `href` на фактические идентификаторы документа, как обычная ссылка. Хитрость заключается в том, что вы делаете свой Шаблон для документов пустым (или минимальным), чтобы он загружал только проанализированный контент.

Это успешно загрузит ваши MODX ресурсы на вкладки jQuery.
