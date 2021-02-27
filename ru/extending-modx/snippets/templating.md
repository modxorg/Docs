---
title: "Шаблонирование"
translation: "extending-modx/snippets/templating"
---

## Шаблонные сниппеты

Одна из лучших практик в дизайне сниппета - убедиться, что вы никогда не пишете HTML непосредственно в сниппете, а разбиваете HTML на куски. Из этого туториала вы узнаете, как это сделать в сниппете.

### Наш начальный сниппет

Давайте рассмотрим сценарий случая: допустим, вы хотите перебрать опубликованные не удаленные Ресурсы, которые являются потомками Ресурса с идентификатором 390, отсортированными по `menuindex`, а затем вывести их в виде тегов `li` с заголовком страницы и ссылкой для их щелчка.

Идем дальше и создаем сниппет под названием 'ResourceLister', и вставляем это внутрь:

``` php
/* во-первых, построить запрос */
$c = $modx->newQuery('modResource');
/* нам нужны только опубликованные и неопубликованные ресурсы */
$c->where(array(
  'published' => true,
  'deleted' => false,
));
/* получить всех детей с ID 390 */
$children = $modx->getChildIds(390);
if (count($children) > 0) {
    $c->where(array(
        'id:IN' => $children,
    ));
}
/* сортировать по menuindex по возрастанию */
$c->sortby('menuindex','ASC');
/* получить ресурсы как xPDOObjects */
$resources = $modx->getCollection('modResource',$c);
$output = '';
foreach ($resources as $resource) {
   $output .= '<li><a href="'.$modx->makeUrl($resource->get('id')).'">'.$resource->get('pagetitle').'</a></li>';
}
return $output;
```

Это делает то, что мы хотим, но вставляет HTML. Мы этого не хотим. Он не позволяет пользователю контролировать разметку или изменять ее, если он этого хочет. Мы хотим больше гибкости.

### Шаблонный сниппет

Прежде всего, давайте создадим чанк, который мы будем использовать для каждого элемента в наборе результатов. Назовите его «ResourceItem» и вставьте следующее содержимое:

``` php
<li><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

По сути, мы делаем тег `li` и помещаем некоторые плейсхолдеры, где был наш контент. У нас есть любое поле в Ресурсе, и здесь мы просто используем поля `ID` и `Pagetitle`. `[[~` говорит MODX сделать ссылку из идентификатора, переданного в свойстве `[[+id]]`. Теперь давайте добавим свойство по умолчанию к сниппету, называемое «tpl», в начало нашего сниппета кода:

``` php
$tpl = $modx->getOption('tpl',$scriptProperties,'ResourceItem');
```

Это возвращает нам свойство `&tpl =` из вызова сниппета, поскольку `$scriptProperties` просто содержит все свойства в вызове Сниппета. Если `tpl` не существует, `getOption` по умолчанию принимает значение `ResourceItem` (блок, который мы только что создали).

А затем измените цикл `foreach` в сниппете следующим образом:

``` php
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $output .= $modx->getChunk($tpl,$resourceArray);
}
```

Сначала код превращает объект `modResource` в массив пар `field=name` (т.е. `$resourceArray['pagetitle']` - это заголовок страницы) с помощью метода `toArray()`. Затем мы используем `$modx->getChunk()`, чтобы передать наш `tpl` чанка и массив ресурсов в него в качестве свойств. MODX анализирует блок, заменяет свойства и возвращает нам некоторый контент.

Альтернативный и немного более быстрый (особенно полезный при циклическом просмотре большого результата xPDO), но также более длинный способ сделать то же самое

``` php
// сначала получить шаблон чанка в переменной
$tpl = $this->modx->getParser()->getElement('modChunk', 'chunkName');
$tpl->setCacheable(false);

// Теперь перебрать коллекцию результатов
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $tpl->_processed = false; // Эта линия важна!
   $output .= $tpl->process($resourceArray);
}
```

Теперь пользователь может вызвать сниппет таким образом, чтобы переопределить блок для каждого ресурса с помощью этого вызова:

``` php
[[!ResourceLister? &tpl=`MyOwnChunk`]]
```

Это означает, что они могут шаблонировать свои результаты так, как они хотят - используя `li`, или строки таблицы, или что угодно! Вы создали гибкий и мощный сниппет. Доступные плейсхолдеры зависят от того, какой массив передается `$modx->getChunk()` или `$tpl->process()`. В этом примере доступными плейсхолдерами будут все поля по умолчанию (без TV!) ресурса, как, например, `[[+pagetitle]]`, `[[+id]]` или `[[+content]]`.

### Добавление класса строки

Что если мы хотим, чтобы пользователь мог указывать класс CSS для каждой строки `li`, но не должен создавать свой собственный сниппет? Проще говоря, мы просто добавляем свойство по умолчанию 'rowCls' в наш сниппет вверху, ниже нашего первого вызова `getOption`:

``` php
$rowCls = $modx->getOption('rowCls',$scriptProperties,'resource-item');
```

Это говорит MODX по умолчанию для свойства `&rowCls` для сниппета 'resource-item'. Давайте отредактируем наш чанк ResourceItem:

``` php
<li class="[[+rowCls]]"><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

И наконец, измените наш цикл foreach на это:

``` php
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $resourceArray['rowCls'] = $rowCls;
   $output .= $modx->getChunk($tpl,$resourceArray);
}
```

Обратите внимание, как мы явно устанавливаем переменную `rowCls` в наш массив свойств `$resourceArray`. Мы делаем это, потому что мы уже получили значение `rowCls` ранее в сниппете (с помощью вызова `getOption`), и мы знаем, что оно не будет изменяться для каждой строки.

### Передача пользовательского идентификатора

Что, если мы хотим, чтобы пользователь мог передать, от какого родителя захватывать ресурсы? 
Опять же, мы просто добавляем свойство `id` по умолчанию в наш сниппет кода вверху, ниже наших вызовов `getOption`:

``` php
$id = (int)$modx->getOption('id',$scriptProperties,390);
```

По сути, пользователь может переопределить родительский идентификатор для сниппета - скажем, Resource 123 со свойством &id = `123` - в своем вызове сниппета. Но мы хотим установить значение по умолчанию 390. И тогда мы изменим строку `getChildIds на` эту:

``` php
$children = $modx->getChildIds($id);
```

Очевидно, что вы можете добавить дополнительные опции к этому сниппету, такие как `firstRowCls` (только для первой строки в результатах), `lastRowCls`, `firstRowTpl`, `sortBy`, `sortDir`, `limit` или что-либо еще, что вы можете придумать. Мы могли бы даже сделать так, чтобы «опубликованный» фильтр также был свойством, или скрыть ресурсы, которые являются папками и т.д. Важной частью является то, что теперь у вас есть общее представление.

Для справки, наш окончательный код выглядит так:

``` php
$tpl = $modx->getOption('tpl',$scriptProperties,'ResourceItem');
$id = (int)$modx->getOption('id',$scriptProperties,390);
$rowCls = $modx->getOption('rowCls',$scriptProperties,'resource-item');
$c = $modx->newQuery('modResource');
$c->where(array(
  'published' => true,
  'deleted' => false,
));
$children = $modx->getChildIds($id);
if (count($children) > 0) {
    $c->where(array(
        'id:IN' => $children,
    ));
}
$c->sortby('menuindex','ASC');
$resources = $modx->getCollection('modResource',$c);
$output = '';
foreach ($resources as $resource) {
    $resourceArray = $resource->toArray();
    $resourceArray['cls'] = $rowCls;
    $output .= $modx->getChunk($tpl,$resourceArray);
}
return $output;
```

## Смотрите также

1. [Создание шаблонов сниппетов](extending-modx/snippets/templating)
2. [Добавление CSS и JS на ваши страницы через сниппеты](extending-modx/snippets/register-assets)
3. [Как написать хороший Сниппет](extending-modx/snippets/good-snippet)
4. [Как написать хороший чанк](extending-modx/snippets/good-chunk)
