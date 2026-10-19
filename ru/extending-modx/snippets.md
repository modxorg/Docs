---
title: "Написание сниппетов"
description: Как выполняются сниппеты MODX, как передавать в них свойства и чем они отличаются от чанков и статических сниппетов"
translation: "extending-modx/snippets"
---

## Что такое сниппет

Сниппеты — это способ запускать динамический PHP внутри страниц.

Сниппет — короткий переиспользуемый кусок PHP, который возвращает значение. [Чанк](building-sites/elements/chunks) возвращает статическую разметку с плейсхолдерами, а сниппет вычисляет вывод в момент отрисовки.

## Как выполняются сниппеты

Кэшируемый сниппет компилируется в обычный include-файл в `cache/includes/elements/modsnippet/` и выполняется через `include`. Тело не оборачивается в функцию — нет ни `eval()`, ни сгенерированной функции, поэтому внутри сниппета не существует `$this`, а `$modx` — единственный объект в области видимости.

Кэшируемость определяется тегом, а не свойством: `[[mySnippet]]` кэшируется, `[[!mySnippet]]` — нет. Колонка `cache_type` у сниппетов объявлена устаревшей и никогда не читается.

После выполнения вывод разбирается парсером MODX, поэтому в нём могут быть теги элементов.

## Простой пример

Вот базовый пример того, как может выглядеть код сниппета:

```php
<?php
return 'Привет, мир!';
```

Если вы назвали этот сниппет *"helloWorld"*, вы можете вызвать его, используя [[helloWorld]] в ваших документах, шаблонах или чанках (см. [Синтаксис тегов](building-sites/tag-syntax "Tag Syntax")). Вы также можете вызвать сниппет из другого сниппета, используя метод API [runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet").

Возврат значения — соглашение. `echo` тоже работает: MODX запускает буфер вывода перед подключением файла и приклеивает напечатанное к возвращённому значению, но `return` держит вывод в одном месте.

## Передача значений в сниппет

Значения передаются в нотации типа CGI, которая следует за именем сниппета. Для сниппета `mySnippet`:

```php
[[!mySnippet? &input=`Привет, мир`]]
```

И код вашего сниппета может выглядеть примерно так:

```php
<?php
return 'Мой ввод был: ' . $input;
?>
```

Имена параметров в вызове должны точно совпадать с переменными в сниппете, с учётом регистра: `input`, а не `INPUT`. Не забывайте `&` перед именами и **обратные кавычки** вокруг значений.

### Чтение значений

Аргументы приходят переменными с тем же именем: `&someParameter` в вызове становится `$someParameter` в коде PHP.

Весь массив доступен как `$scriptProperties` — удобно, когда имена заранее неизвестны.

Например, если вы вызываете свой сниппет следующим образом:

```php
[[!mySnippet? &x=`x-ray` &y=`yellow`]]
```

Тогда массив **$scriptProperties** будет содержать следующее:

```php
Array(
 'x' => 'x-ray',
 'y' => 'yellow'
)
```

Записи вкладки Properties и набор свойств из `[[mySnippet@setName]]` подставляются первыми, а параметры вызова переопределяют их по ключу.

## Взаимодействие с базой данных в сниппетах

MODX ходит в базу через [xPDO](extending-modx/xpdo "xPDO") — ORM поверх PDO. Берите данные через [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") и [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection"), а не пишите сырые запросы.

## Почему ORM?

1. **Абстракция SQL** — один и тот же код работает на MySQL, SQLite и PostgreSQL.
2. **Экранирование параметров** — xPDO передаёт значения через PDO, пути для SQL-инъекции нет.
3. **Короткий код** — работа на 40 строк с вызовами `mysql_*` сжимается примерно до десяти.

## Пример кода БД

Возьмём чанк с названием `LineItem` и заменим его плейсхолдеры `[[+placeholderName]]` значениями:

```php
$chunk = $modx->getObject('modChunk',array(
   'name' => 'LineItem',
));
if (!$chunk) return 'Нет такого чанка с названием LineItem!';
return $chunk->process(array(
   'name' => 'G.I. Joe',
   'grenades' => 42,
));
```

$chunk — это [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject"), объектное представление чанка с уже обработанными плейсхолдерами.

Для настоящих запросов используйте `$modx->newQuery()` — здесь так берутся первые 10 опубликованных ресурсов с родителями 23, 24 или 25, отсортированные по menuindex:

```php
$c = $modx->newQuery('modResource');
$c->where(array(
   'parent:IN' => array(23,24,25),
   'deleted' => false,
   'hidemenu' => false,
   'published' => true,
));
$c->sortby('menuindex','ASC');
$c->limit(10);
$resources = $modx->getCollection('modResource',$c);
```

`newQuery()` принимает имя класса, `where()` добавляет ограничения, затем `sortby()` и `limit()` оформляют результат.

`getCollection()` возвращает массив объектов, а `getObject()` — один объект.

## Дальнейшие подробности о работе с базой данных

Чтобы узнать больше о xPDO, прочитайте следующее:

- xPDO в пространстве [xPDO](extending-modx/xpdo "xPDO")
- [Получение объектов](extending-modx/xpdo/retrieving-objects "Retrieving Objects") в xPDO
- Объект [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")

## Разработка сниппетов вне менеджера

Направьте [статический сниппет](building-sites/elements/static-elements) на файл на диске вместо вставки кода в менеджер:

```php
[[!include? &file=`/absolute/path/to/my/snippet.php`]]
```

Тело самого сниппета остаётся тонким:

```php
if (file_exists($file)) {
   $o = include $file;
} else { $o = 'Файл не найден по адресу: '.$file; }
return $o;
```

Так файл можно проверять линтером из командной строки (*php -l my_script.php*) и получать настоящие сообщения об ошибках. Переносите код в менеджер только после того, как он заработает.

::: warning
PHP-файл внутри веб-корня доступен любому. Вынесите файлы сниппетов за пределы веб-корня или перенесите туда каталог `core/` до деплоя. Проверка «я внутри MODX» внутри файла слабее, чем его перенос.
:::

## Не смешивайте PHP и HTML в сниппете

Сниппеты выполняют PHP-код, поэтому код сниппета сам по себе должен быть корректным PHP. Код ниже — нет:

```php
<p>Это ужасная смесь HTML и PHP кода</p>
<?php
return "<p>и PHP!  Не пытайтесь делать так! Это плохая архитектура и не сработает!</p>";
?>
```

MODX дописывает ровно один `<?php` в начало кода перед записью в кэш, поэтому исполняемый файл начинается с `<?php`, за которым идёт посторонний HTML. Это синтаксическая ошибка, а не пара `<?php … ?>`, которую утверждали прежние версии этой страницы.

Если вам нужно сделать что-то вроде этого, **используйте чанк** - выделите PHP в сниппет, загрузите его вывод в плейсхолдер с помощью функций-плейсхолдеров [MODX API](extending-modx/core-model/modx "modX") или обработайте сниппетом, и включите плейсхолдеры сниппета в чанк:

```php
$output = $modx->getChunk('myChunk',array(
  'placeholderOne' => 'test',
  'name' => 'Harry',
  'scar' => 'Lightning',
));
return $output;
```

## Не работайте с боевыми сниппетами

Если вы пишете новые версии сниппетов, *продублируйте* старую версию! Таким образом, вы можете вернуться к старой версии кода, если что-то работает неправильно! MODX по своей сути не управляет версиями, поэтому вы должны сделать резервную копию кода самостоятельно.

## Используйте свойства по умолчанию

Попробуйте добавить свойства по умолчанию для вашего сниппета на вкладку «Свойства», чтобы другой разработчик мог добавить пользовательские [наборы свойств](building-sites/properties-and-property-sets "Properties and Property Sets") для их переопределения.

## Смотрите также

- [Сниппеты в контенте](building-sites/elements/snippets): кэшируемые и некэшируемые вызовы, наборы свойств
- [Статические сниппеты](building-sites/elements/static-elements): прямой вызов файла сниппета
- [Парсинг MODX тегов](extending-modx/parsing-tags): повторный разбор вывода сниппета
- [log_snippet_not_found](building-sites/settings/log_snippet_not_found)
- [Шаблонизируйте свои сниппеты](extending-modx/snippets/templating)
- [Добавление CSS и JS на ваши страницы с помощью сниппетов](extending-modx/snippets/register-assets)
- [Как написать хороший сниппет](extending-modx/snippets/good-snippet)
- [Как написать хороший чанк](extending-modx/snippets/good-chunk)

- [modX.runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
