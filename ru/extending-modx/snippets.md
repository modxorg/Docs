---
title: "Написание сниппетов"
description: Как выполняются сниппеты MODX, как передавать в них свойства и чем они отличаются от чанков и статических сниппетов"
translation: "extending-modx/snippets"
---

## Что такое сниппет

Сниппет это переиспользуемый PHP, который возвращает значение. [Чанк](building-sites/elements/chunks) возвращает статическую разметку с плейсхолдерами. Сниппет вычисляет вывод при отрисовке страницы.

## Как выполняются сниппеты

MODX записывает тело сниппета в include-файл и выполняет его через `include`.

- Файл сниппета ядра: `cache/includes/elements/modx/revolution/modsnippet/{id}.include.cache.php`.
- Каталог берётся из класса сниппета. Обратные слэши и подчёркивания в имени класса становятся слэшами.
- Тело не оборачивается в функцию. Нет ни `eval()`, ни сгенерированной функции.
- Include выполняется внутри объекта сниппета. `$this` это этот объект. `$modx` тоже в области видимости. `makeUrl` и остальные методы MODX вызывайте у `$modx`.

Кэшируемость задаёт тег, а не свойство. `[[mySnippet]]` кэшируется. `[[!mySnippet]]` нет. Колонка `cache_type` у сниппетов объявлена устаревшей и никогда не читается.

После выполнения вывод разбирает парсер MODX, поэтому в нём могут быть теги элементов.

## Простой пример

```php
<?php
return 'Привет, мир!';
```

Назовите его *helloWorld* и вызывайте через `[[helloWorld]]` в ресурсах, шаблонах или чанках (см. [Синтаксис тегов](building-sites/tag-syntax "Tag Syntax")). Из другого сниппета вызывайте методом [runSnippet](extending-modx/modx-class/reference/modx.runsnippet "modX.runSnippet").

Возвращать значение принято. `echo` тоже работает. MODX запускает буфер вывода перед подключением файла и приклеивает напечатанное к возвращённому значению. `return` держит вывод в одном месте.

## Передача значений в сниппет

Значения передаются в нотации типа CGI, которая следует за именем сниппета. Для сниппета `mySnippet`:

```php
[[!mySnippet? &input=`Привет, мир`]]
```

Сниппет:

```php
<?php
return 'Мой ввод был: ' . $input;
?>
```

Имена параметров в вызове должны точно совпадать с переменными в сниппете, с учётом регистра: `input`, а не `INPUT`. Не забывайте `&` перед именами и **обратные кавычки** вокруг значений.

### Чтение значений

Аргументы приходят переменными с тем же именем: `&someParameter` в вызове становится `$someParameter` в коде PHP.

Весь массив доступен как `$scriptProperties`. Так удобно, когда имена заранее неизвестны.

Такой вызов:

```php
[[!mySnippet? &x=`x-ray` &y=`yellow`]]
```

заполняет **$scriptProperties** так:

```php
Array(
 'x' => 'x-ray',
 'y' => 'yellow'
)
```

Записи вкладки Properties и набор свойств из `[[mySnippet@setName]]` подставляются первыми, а параметры вызова переопределяют их по ключу.

## Взаимодействие с базой данных в сниппетах

MODX ходит в базу через [xPDO](extending-modx/xpdo "xPDO"), ORM поверх PDO. Берите данные через [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") и [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") вместо сырых запросов.

## Почему ORM?

1. **Абстракция SQL.** Те же вызовы xPDO в этом дистрибутиве идут на MySQL.
2. **Экранирование параметров.** xPDO передаёт значения через PDO, пути для SQL-инъекции нет.
3. **Короткий код.** Работа на 40 строк с вызовами `mysql_*` сжимается примерно до десяти.

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

$chunk это [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject") этого чанка.

Для настоящих запросов используйте `$modx->newQuery()`. Запрос ниже берёт первые 10 опубликованных ресурсов с родителями 23, 24 или 25, по полю menuindex:

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

`getCollection()` возвращает массив объектов. `getObject()` возвращает один объект.

## Дальнейшие подробности о работе с базой данных

- [xPDO](extending-modx/xpdo "xPDO")
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

Проверяйте файл из командной строки (*php -l my_script.php*) и читайте сообщения об ошибках. Переносите код в менеджер только после того, как он заработает.

> [!WARNING]
> PHP-файл внутри веб-корня доступен любому. Вынесите файлы сниппетов за пределы веб-корня или перенесите туда каталог `core/` до выкладки. Проверка «я внутри MODX» внутри файла слабее, чем его перенос.

## Не смешивайте PHP и HTML в сниппете

Сниппеты выполняют PHP-код, поэтому код сниппета сам по себе должен быть корректным PHP. Код ниже — нет:

```php
<p>Это ужасная смесь HTML и PHP кода</p>
<?php
return "<p>и PHP!  Не пытайтесь делать так! Это плохая архитектура и не сработает!</p>";
?>
```

MODX дописывает ровно один `<?php` в начало кода перед записью в кэш. Исполняемый файл начинается с `<?php`, за которым идёт посторонний HTML. Это синтаксическая ошибка, а не пара `<?php … ?>`, которую утверждали прежние версии этой страницы.

Положите HTML в чанк, а PHP оставьте в сниппете. Загрузите чанк функциями плейсхолдеров [modX](extending-modx/core-model/modx "modX") или обработкой чанка. Плейсхолдеры сниппета включите в чанк:

```php
$output = $modx->getChunk('myChunk',array(
  'placeholderOne' => 'test',
  'name' => 'Harry',
  'scar' => 'Lightning',
));
return $output;
```

## Не работайте с боевыми сниппетами

*Продублируйте* сниппет, прежде чем заменять его. MODX не хранит версии кода элементов, так что старая копия и есть резервная.

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
