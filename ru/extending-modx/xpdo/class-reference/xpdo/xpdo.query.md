---
title: "xPDO.query"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.query"
---

## xPDO::query

Выполняет инструкцию SQL, возвращая набор результатов в виде объекта PDOStatement.

**Совет**
Это может быть хорошим способом создания отчетов, не беспокоясь о сложном синтаксисе, обычно требуемом xPDO.

## Синтаксис

API Docs: see <http://php.net/manual/en/pdo.query.php>

```php
xPDOObject|false query (string $statement)
```

> \$statement

Оператор SQL для подготовки и выполнения. Данные внутри запроса должны быть [правильно экранированы](http://php.net/manual/en/pdo.quote.php).

## Примеры

### Выберите одну запись

Вот простой запрос для извлечения одной строки из базы данных. Обратите внимание, что вы обычно используете [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") или [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") извлечения данных из встроенных таблиц MODX.

`xPDOObject|false query (string $statement)`

> \$statement

Оператор SQL для подготовки и выполнения. Данные внутри запроса должны быть [правильно экранированы](http://php.net/manual/en/pdo.quote.php).

```php
$result = $modx->query("SELECT * FROM modx_users WHERE id=1");
if (!is_object($result)) {
   return 'No result!';
}
else {
   $row = $result->fetch(PDO::FETCH_ASSOC);
   return 'Result:' .print_r($row,true);
}
```

Использование `PDO::FETCH_ASSOC` заставит результат быть ассоциативным массивом:

```php
Array
(
    [id] => 1
    [username] => my_user
    [password] => xxxxxxxxxxxxxxxxxxx
    // ...
)
```

Без этого результаты представляют собой смесь ассоциативного и регулярного массивов:

```php
Array
(
    [id] => 1
    [0] => 1
    [username] => my_user
    [1] => my_user
    [password] => xxxxxxxxxxxxxxxxxxxxxxx
    [2] => xxxxxxxxxxxxxxxxxxxxx
    // ...
)
```

**Нет однострочников!**
Доступное для PDO объединение методов в одну строку невозможно с xPDO. Следующее **не будет работать**:

`$row = $modx->query("SELECT * FROM cms_users WHERE id=1")->fetch();`

### Выбор нескольких записей

PDO использует ленивый загрузчик, поэтому вы не можете просто распечатать все результаты сразу. Вместо этого вы перебираете каждый результат в наборе, используя цикл, например

```php
$results = $xpdo->query("SELECT * FROM some_table");
while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
        print_r($r); exit;
}
```

### Цитирование входов

Для отдельных запросов, основанных на пользовательском вводе, вы должны [вручную указывать](http://php.net/manual/en/pdo.quote.php) входные строки.

```php
$username = $modx->quote($username);
$sql = "SELECT * FROM modx_users WHERE username = $username";
$result = $modx->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
return print_r($row,true);
```

Функция цитаты может принимать 2-й аргумент, который вы можете использовать для точного цитирования целых чисел.

-   `PDO::PARAM_INT` для цитирования целых чисел
-   `PDO::PARAM_STR` для цитирования строк (по умолчанию)

```php
$id = $modx->quote(1, PDO::PARAM_INT);
$sql = "SELECT * FROM cms_users WHERE id = $id";
$result = $modx->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
return print_r($row, true);
```

### Выбор коллекции

Вот простой запрос для извлечения нескольких строк из базы данных. Обратите внимание, что вы обычно используете [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") для извлечения данные из таблиц MODX.

```php
$output = '';
$sql = "SELECT * FROM modx_users";
foreach ($modx->query($sql) as $row) {
    $output .= $row['username'] .'<br/>';
}
return $output;
```

Вы также можете использовать метод `fetchAll()` для возврата массива массивов (то есть набора записей):

```php
$output = '';
$sql = "SELECT * FROM modx_users";
$result = $modx->query($sql);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
return $data;
```

### Fetch Style

В <http://php.net/manual/en/pdostatement.fetch.php> перечислены доступные константы, которые влияют на способ возврата ваших результатов:

-   `PDO::FETCH_ASSOC`: возвращает массив, проиндексированный по имени столбца, как возвращено в вашем наборе результатов
-   `PDO::FETCH_BOTH` (по умолчанию): возвращает массив, проиндексированный как по имени столбца, так и по номеру столбца с 0 индексами, как возвращено в вашем наборе результатов
-   `PDO::FETCH_BOUND`: возвращает TRUE и присваивает значения столбцов в вашем наборе результатов переменным PHP, к которым они были привязаны с помощью метода PDOStatement :: bindColumn ()
-   `PDO::FETCH_CLASS`: возвращает новый экземпляр запрошенного класса, сопоставляя столбцы результирующего набора с именованными свойствами в классе. Если fetch_style включает в себя `PDO::FETCH_CLASSTYPE` (например,`PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE`), тогда имя класса определяется по значению первого столбца.
-   `PDO::FETCH_INTO`: обновляет существующий экземпляр запрошенного класса, сопоставляя столбцы результирующего набора с именованными свойствами в классе
-   `PDO::FETCH_LAZY`: объединяет `PDO::FETCH_BOTH` и `PDO: FETCH_OBJ`, создавая имена переменных объекта по мере их доступа
-   `PDO::FETCH_NUM`: возвращает массив, проиндексированный по номеру столбца, как возвращено в вашем наборе результатов, начиная с столбца 0
-   `PDO::FETCH_OBJ`: возвращает анонимный объект с именами свойств, которые соответствуют именам столбцов, возвращаемых в вашем наборе результатов.

### Подготовленные заявления

Видеть

-   <http://php.net/manual/en/pdo.prepare.php>
-   <http://php.net/manual/en/pdostatement.execute.php>

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO](extending-modx/xpdo "xPDO")
