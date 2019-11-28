---
title: "save"
_old_id: "1208"
_old_uri: "2.x/class-reference/xpdoobject/persistence-methods/save"
---

## xPDOObject::save()

 Persist new or changed objects to the database container. Will also cascade and save any objects that have been added to it via related object addition methods (addOne, addMany).

## Syntax

 API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#save>

``` php
boolean save ([boolean|integer $cacheFlag = null])
```

## Examples

 Save a wand, along with its owner and parts.

``` php
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

 This can get a bit tricky when dealing with related objects, but you can skip a few steps (provided that you have defined your relation properly). For example, normally when dealing with join tables, you need to know the primary key from the related tables before you can add a row there. However, with xPDO, you can omit the primary key from one table when you reference the related table via addMany() or addOne().

``` php
$Product = $modx->newObject('Product');
$ProductImage = $modx->newObject('ProductImage');
$ProductImage->set('image_id', 123);
//$ProductImage->set('product_id', $lastInsertId); // You can skip this
$related = array();
$related[] = $ProductImage;
$Product->addMany($related);
$Product->save();
```

 If the operation did create a new record (instead of updating an existing one), you can tie into the underlying [PDO::lastInsertId()](http://php.net/manual/en/pdo.lastinsertid.php) method:

``` php
$modx->lastInsertId();
// OR
$object->getPrimaryKey();
// OR
$object->get('id'); // <-- or whatever the primary field is named
```

 _Success may vary depending on the underlying driver._

## Validation Messages

 You can do more than just react to a boolean yes/no of whether your object saved correctly. You can also return some messages about what exactly was problematic.

``` php
// save object and report validation errors
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

 Ultimately, adding a field error adds messages onto the MODX error stack ($modx->errors). Each message is an associative array with an id and a msg.

 You can be a bit more concise using code like this (cleanup needed):

``` php
if ($object->save() == false) {
    $modx->error->checkValidation($object);
    return $this->failure($modx->lexicon($objectType.'_err_save'));
}
```

 See modProcessor::addFieldError() in **modprocessor.class.php** and modError::addField() in **error/moderror.class.php**
