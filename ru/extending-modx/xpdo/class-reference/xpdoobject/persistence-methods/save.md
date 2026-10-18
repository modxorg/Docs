---
title: "save"
description: "Сохраняет новые или измененные объекты в контейнере базы данных."
translation: "extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save"
---

## xPDOObject::save()

Сохраняет новые или измененные объекты в контейнере базы данных. Также будет каскадно и сохранять любые объекты, которые были добавлены к нему с помощью методов добавления связанных объектов (addOne, addMany).

## Синтаксис

```php
boolean save ([boolean|integer $cacheFlag = null])
```

## Примеры

Спасите палочку вместе с ее владельцем и запчастями.

```php
$owner = $xpdo->newObject('Wizard');
$owner->set('name','Harry Potter');
$parts = array();
$parts[1] = $xpdo->newObject('WandPart');
$parts[1]->set('name','Phoenix Feather');
$parts[2] = $xpdo->newObject('WandPart');
$parts[2]->set('name','Holly Branch');
$wand = $xpdo->newObject('Wand');
$wand->addOne($owner);
$wand->addMany($parts);
if ($wand->save() == false) {
   echo 'Oh no, the wand failed to save!';
}
```

Это может быть немного сложнее при работе со связанными объектами, но вы можете пропустить несколько шагов (при условии, что вы правильно определили свое отношение). Например, обычно при работе с таблицами объединения вам необходимо знать первичный ключ из связанных таблиц, прежде чем вы сможете добавить туда строку. Однако с xPDO вы можете опустить первичный ключ из одной таблицы, когда ссылаетесь на связанную таблицу с помощью `addMany()` или `addOne()`.

```php
$Product = $modx->newObject('Product');
$ProductImage = $modx->newObject('ProductImage');
$ProductImage->set('image_id', 123);
//$ProductImage->set('product_id', $lastInsertId); // You can skip this
$related = array();
$related[] = $ProductImage;
$Product->addMany($related);
$Product->save();
```

Если операция создала новую запись (вместо обновления существующей), вы можете связать методом [PDO::lastInsertId()](http://php.net/manual/en/pdo.lastinsertid.php):

```php
$modx->lastInsertId();
// OR
$object->getPrimaryKey();
// OR
$object->get('id'); // <-- или как называется основное поле
```

_Успех может варьироваться в зависимости от основного драйвера._

## Сообщения проверки

Вы можете сделать больше, чем просто реагировать на логическое yes/no, правильно ли сохранен ваш объект. Вы также можете вернуть некоторые сообщения о том, что именно было проблематично.

```php
// сохранить объект и сообщить об ошибках проверки
if (!$object->save()) {
    // @var modValidator $validator
    $validator = $object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'],$this->modx->lexicon($message['message']));
        }
    }
}
```

В конечном итоге, добавление поля error добавляет каждое сообщение в единственный объект ошибок MODX — `$modx->error`. Каждое сообщение представляет собой ассоциативный массив с ключами `id` и `msg`. В процессоре более краткая запись делает то же самое через `modError::checkValidation()`:

```php
if (!$object->save()) {
    $modx->error->checkValidation($object);
    return $this->failure($modx->lexicon($objectType . '_err_save'));
}
```

Смотрите `addFieldError()` в **core/src/Revolution/Processors/Processor.php** и `checkValidation()` в **core/src/Revolution/error/modError.php**.

## Смотрите также

-   [validate](extending-modx/xpdo/class-reference/xpdoobject/validation/validate)
-   [getValidator](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator)
-   [remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove)
