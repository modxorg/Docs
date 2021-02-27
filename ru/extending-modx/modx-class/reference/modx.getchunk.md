---
title: "modX.getChunk"
_old_id: "1062"
translation: "extending-modx/modx-class/reference/modx.getchunk"
---

## modX::getChunk

Обрабатывает и возвращает выходные данные из чанка HTML по имени.

**getChunk** фактически устанавливает свойства, которые вы передаете (и которые выбираются из свойств по умолчанию и/или набора свойств) в качестве плейсхолдера (сохраняя любые с тем же ключом и восстанавливая их после завершения обработки), и позволяет классу modChunk обрабатывать их (наряду с любыми другими тегами, фильтрами и т. д.).

**getChunk** будет выполняться парсер MODX, поэтому вы можете использовать выходные фильтры, а массив `$properties` может быть многомерным (т.е. больше, чем просто пары ключ/значение). Если это больше, чем вам нужно, используйте это [modX.parseChunk](extending-modx/modx-class/reference/modx.parsechunk "modX.parseChunk").

## Синтаксис

API Doc: [modX::getChunk()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getChunk())

``` php
string getChunk (string $chunkName, [array $properties = array ()])
```

`$properties` обычно это стандартный ассоциативный массив, например:

``` php
$properties = array('key' => 'value');
```

Что приведет к замене плейсхолдеров `[[+key]]` на `value`.

Однако `$properties` также может быть более глубоко вложенным массивом, таким как тип, который может быть возвращен из определенных запросов `getObject` или `getCollection`, например

``` php
$properties = array(
    'user' => array('id' => 1),
    'document' => array('id' => 27)
);
// или:
$properties['user']['id'] = 1;
$properties['document']['id'] = 27;

// Соответствует следующим плейсхолдерам:
// [[+user.id]]
// [[+document.id]]
```

В тех случаях, когда используется многомерный массив, синтаксис плейсхолдера изменяется, чтобы использовать точку для каждого узла в массиве, например `[[+user.id]]` и `[[+document.id]]`

## Примеры

### Простой пример

Давайте обработаем этот чанк и выведем его значение. У нас есть этот чанк, который называется "WelcomeChunk":

``` php
<p>Привет, [[+name]]!</p>
```

Мы поместим это в наш сниппет:

``` php
$output = $modx->getChunk('WelcomeChunk',array(
   'name' => 'John',
));
return $output;
```

Таким образом, каждый ключ в ассоциативном массиве, переданном методу `getChunk`, соответствует доступному плейсхолдеру внутри блока, например `[[+name]]`

Этот код выводит следующее:

``` php
<p>Привет, John!</p>
```

### Вложенные `$properties`

В нашем чанке:

``` php
<a href="http://site.com/profile?user_id=[[+user.id]]!">User Details</a>
```

В нашем сниппете:

``` php
$output = $modx->getChunk('UserLink',array(
   'user' => array('id' => 123)
);
return $output;
```

### Использование в сниппете

Часто чанки MODX используются в качестве [formatting string](http://php.net/manual/en/function.sprintf.php) для сниппетов. С этой целью вы можете хорошо использовать xPDO [toArray()](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray") method.

Представьте себе чанк с именем **single\_user**:

``` php
Имя пользователя: [[+username]]<br/>
Активный?:  [[+active]]<br/>
<hr/>
```

Затем в вашем сниппете:

``` php
$userlist = $modx->getCollection('modUser');

$output = '';
foreach ($userlist as $user) {
    $output .= $modx->getChunk('single_user', $user->toArray() );
}

return $output;
```

### Разбор строки

Иногда вам нужно разобрать строку с помощью парсера MODX – это не использует getChunk, но это связано. Использование парсера MODX немного медленнее, чем использование простой функции `str_replace`, но она позволяет использовать сложные плейсхолдеры (например, для включения другого чанка) и выходные фильтры и т.д. Фокус в том, чтобы создать временный объект Chunk, а затем запустить на нем метод `process`.

``` php
// Форматирование строки
$tpl = 'Здравствуйте, меня зовут [[+name]]';

// Свойства
$props = array('name' => 'Bob');

// Создание временного чанка
$uniqid = uniqid();
$chunk = $modx->newObject('modChunk', array('name' => "{tmp}-{$uniqid}"));
$chunk->setCacheable(false);

$output = $chunk->process($props, $tpl);
```

## Смотрите также

- [Chunks](building-sites/elements/chunks "Chunks")
- [modX.parseChunk](extending-modx/modx-class/reference/modx.parsechunk "modX.parseChunk")
