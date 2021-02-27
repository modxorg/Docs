---
title: "Создание объектов"
translation: "extending-modx/xpdo/creating-objects"
---

## Что такое Объект?

«Объект» в xPDO - это просто абстрактное представление строки в таблице в базе данных на основе классов. Другими словами, строка в таблице 'cars' будет иметь определение модели xPDO для таблицы 'cars', и тогда вы будете получать Коллекции объектов каждого автомобиля.

xPDO определяет эти объекты с помощью класса `xPDOObject`.

## Создание объекта

Для создания объектов в xPDO используется метод xPDO `newObject`.

Допустим, у нас есть объект, определенный в нашей модели класса `Box`. Мы хотим создать новый объект этого:

```php
$myBox = $xpdo->newObject('Box');
```

Это просто. Мы также можем создать объект `Box` с некоторыми предварительно заполненными значениями полей:

```php
$myBox = $xpdo->newObject('Box',array(
   'width' => 5,
   'height' => 12,
   'color' => 'red',
));
```

Вы не можете установить значения первичного ключа при использовании второго параметра `newObject()`. Установите значения первичного ключа с помощью `fromArray()` после создания экземпляра с помощью `newObject()` и убедитесь, что вы установили параметр `setPrimaryKeys` равным `true`.

Это даст нам объект `Box` на основе `xPDOObject`, который можно [манипулировать и сохранять](extending-modx/xpdo/setting-object-fields "Установка полей объекта"). Обратите внимание, что этот объект еще не является постоянным, пока вы не сохраните его с помощью [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "save").

В версиях до xPDO 2.1.1-pl, если ваша таблица SQL не существует для созданного вами объекта, и класс объекта имеет определенную таблицу для этого класса, xPDO автоматически создаст таблицу в базе данных для вас. В 2.1.1-pl и более поздних версиях вы должны установить `xPDO::OPT_AUTO_CREATE_TABLES` в `true`, чтобы таблицы создавались автоматически. Рекомендуется создавать таблицы для вашей модели явно в сценарии установки, а не в зависимости от функций автоматического создания таблиц, которые не были обязательными в более ранних выпусках xPDO. Смотрите [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "xPDOManager.createObjectContainer") для получения информации о явном создании таблиц из модели.

## Смотрите также

-   [xPDO.newObject](extending-modx/xpdo/class-reference/xpdo/xpdo.newobject "xPDO.newObject")
-   [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "xPDOManager.createObjectContainer")
