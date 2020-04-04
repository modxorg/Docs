---
title: "Работа со связанными объектами"
translation: "extending-modx/xpdo/retrieving-objects/related-objects"
---

Доступ к связанным объектам в xPDO можно получить через `newQuery`, как показано ранее, или через вспомогательные функции `xPDOObject`, [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne") и [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany") (в зависимости от отношений).

## Получение объектов

Прежде всего, давайте посмотрим на методы поиска связанных объектов:

### [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")

Допустим, у нас есть объект Car, который имеет объект, связанный с владельцем. Каждый автомобиль может иметь только одного владельца, который представляет собой таблицу с идентификатором, именем и адресом электронной почты. Мы хотим захватить владельца, учитывая, что у нас есть объект Car:

```php
$car = $xpdo->getObject('Car',123);

$owner = $car->getOne('Owner');
echo 'The owner of this car is: '.$owner->get('name');
```

[getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne") также принимает `$criteria` и параметр `$cacheFlag`, аналогично `getObject` и `getCollection`. Это позволяет вам сделать немного больше фильтрации, если вы того пожелаете.

### [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")

Теперь скажите, что у нас есть объекты Wheel для нашего автомобиля - очевидно, может быть более одного Wheel на Машину, и мы хотим собрать всю их коллекцию. У объекта Wheel есть поля 'id' и 'position':

```php
$car = $xpdo->getObject('Car',123);

$wheels = $car->getMany('Wheel');
foreach ($wheels as $wheel) {
   echo 'Got the '.$wheel->get('position').' wheel!<br />';
}

/* This would echo:
Got the Front Left wheel!
Got the Front Right wheel!
Got the Back Left wheel!
Got the Back Right wheel! */
```

Как видите, это позволяет нам легко и быстро захватывать связанные объекты.

## Добавление связанных объектов

В xPDO также есть методы для добавления связанных объектов в существующий объект, чтобы упростить сохранение:

### [addOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone "addOne")

Итак, у нас есть объект Car, но, скажем, мы хотим назначить ему нового владельца, которого мы только что создали. Мы можем использовать[addOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone "addOne") легко добавить его в:

```php
$car = $xpdo->getObject('Car',123);
$owner = $xpdo->getObject('Owner',array('name' => 'Mark'));
$car->addOne($owner);
$car->save();
```

При сохранении объекта Car в поле `owner` в строке «Car» будет указан идентификатор владельца через определение отношения.

Вы также можете сделать это с новыми (несохраненными) объектами [save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "save") - функция будет каскадна и сохранить оба объекта. Допустим, у нас есть объект Car, но мы добавляем совершенно нового владельца:

```php
$car = $xpdo->getObject('Car',324);

$owner = $xpdo->newObject('Owner');
$owner->set('name','John');
$owner->set('email','john@doe.com');

$car->addOne($owner);
$car->save();
```

Это сохранит объект Car и Owner и свяжет их вместе.

И то и другое [addOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone "addOne") и [addMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "addMany") принимают второй параметр, называемый `alias`. Это следует использовать, когда объект имеет более одного отношения с одним классом. Например, добавив отношения Владелец и Продавец, которые оба являются объектами пользователя:

```php
$car->addOne($ownerUser,'Owner');
$car->addOne($sellerUser,'Seller');
```

Это помогает xPDO различать, какой объект принадлежит к какому отношению.

### [addMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "addMany")

Объекты с отношениями один-ко-многим также могут быть добавлены в пакетном режиме через [addMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "addMany") метод. Допустим, мы хотим добавить все объекты Wheel шириной 10 в нашу машину:

```php
$wheels = $xpdo->getCollection('Wheel',array(
   'width' => 10,
));

$car->addMany($wheels);
$car->save();
```

Это добавит все колеса шириной 10 и сохранит отношения.

## Смотрите также

-   [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")
-   [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
-   [addOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone "addOne")
-   [addMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "addMany")
-   [Defining Relationships](extending-modx/xpdo/custom-models/defining-a-schema/relationships "Defining Relationships")
