---
title: "toArray"
translation: "extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray"
---

## xPDOObject::toArray()

Копирует поля объекта и соответствующие значения в ассоциативный массив.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#toArray>

```php
array toArray(
   [string $keyPrefix = ''],
   [boolean $rawValues = false],
   [boolean $excludeLazy = false],
   [boolean|integer|string|array $inludeRelated = false])
)
```

-   `keyPrefix`: необязательный префикс для добавления к ключам каждого поля.
-   `rawValues`: необязательный флаг для получения необработанного значения (true) или для использования `xPDOObject->get()`. Обычно захочет использовать `->get()`.
-   `excludeLazy`: флаг опции, указывающий, хотите ли вы исключить ленивые поля из результирующего массива. Поведение по умолчанию состоит в том, чтобы включить их, что означает, что объект будет запрашивать в базе данных ленивые поля перед предоставлением значения.
-   `includeRelated`: описывает, если и как включить загруженные поля связанных объектов.
    -   В качестве целого числа будут включены все загруженные связанные объекты на графике до этого уровня глубины.
    -   В качестве строки будут включены только загруженные связанные объекты, соответствующие представлению графа JSON.
    -   В качестве массива будут включены только загруженные связанные объекты, соответствующие массиву графа.
    -   Как логическое значение true, все загруженные в настоящий момент связанные объекты будут включены.

## Примеры

Получить значения объекта в формате массива:

```php
$object->set('name','John Lo');
$object->set('email','jlo@gmail.com');
$a = $object->toArray();
print_r($a);
// prints "Array ( [name] => John Lo [email] => jlo@gmail.com )"
```

Получить значения объекта, но с их ключами с префиксом `dev_`

```php
$object->set('name','Mark');
$object->set('version','1.0');
$a = $object->toArray('dev_');
print_r($a);
// prints "Array ( [dev_name] => Mark [dev_version] => 1.0 )"
```

## Смотрите также

-   [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
-   [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
-   [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
-   [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")
