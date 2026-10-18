---
title: "save"
description: "Persist new or changed objects to the database container."
_old_id: "1208"
_old_uri: "2.x/class-reference/xpdoobject/persistence-methods/save"
---

## xPDOObject::save()

Write this object and its changed fields to the database, then write the related objects attached to it.

## Syntax

``` php
boolean save ([boolean|integer $cacheFlag = null])
```

`$cacheFlag` overrides the cache lifetime of the object for this call. Pass `true` to use the configured lifetime, or an integer for a number of seconds. The default, `null`, keeps the lifetime the object was loaded with.

## Foreign Keys Are Filled In From the Relation Owner

Related objects reach the database through `addOne()` and `addMany()`, and the `owner` attribute of the relation decides who writes the key:

| `owner` | What happens on `save()` |
| --- | --- |
| `local` | The foreign key is written into the related object from this object's key, then the related object is saved. |
| `foreign` | The related object is saved first, then its key is written into this object's local field. |

When `owner` is missing, `save()` assumes `foreign` for a relation of `cardinality="many"` and `local` otherwise. This is what lets you attach an object to a new parent without knowing the parent's primary key yet:

``` php
$product = $modx->newObject('Product');
$image = $modx->newObject('ProductImage');
$image->fromArray(array('file' => 'case.jpg'));

$product->addMany(array($image));
$product->save(); // writes the image first, then product_image.product_id
```

## Objects With Unread Fields Are Not Saved

When a row is hydrated, xPDO puts every field of the class into the object's `_lazy` list and then removes from that list the fields the row actually contained. A query that selects the whole table leaves the list empty; a query that selects part of it does not.

`save()` refuses to run while `_lazy` is not empty: it writes `Attempt to save lazy object: ...` at ERROR level to the MODX log and returns `false`. Read the missing fields first — `get()` fetches a single lazy field, `toArray()` fetches all of them — then save.

## The Generated Key Lands in the Object

After an INSERT into a table with a native auto-increment key, the value is written into the object's fields. Read it back from the object rather than from the driver:

``` php
$page = $modx->newObject('modResource');
$page->fromArray(array('pagetitle' => 'My Page'));
$page->save();

echo $page->getPrimaryKey(); // the new id
```

`$modx->lastInsertId()` returns the same number, but only for the query that ran last.

## Validation Messages

`save()` runs `validate()` first and returns `false` without writing anything if validation fails. MODX turns this on through the `xPDO::OPT_VALIDATE_ON_SAVE` option, so in a processor it is already in effect. The validator holds the reason:

``` php
if (!$object->save()) {
    $validator = $object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
        }
    }
}
```

`addFieldError()` adds each message to the single error object on MODX, `$modx->error`. Every entry is an associative array with `id` and `msg`. Inside a processor, the shorter form does the same through `modError::checkValidation()`:

``` php
if (!$object->save()) {
    $modx->error->checkValidation($object);
    return $this->failure($modx->lexicon($objectType . '_err_save'));
}
```

See `addFieldError()` in `core/src/Revolution/Processors/Processor.php` and `checkValidation()` in `core/src/Revolution/error/modError.php`.

## See Also

- [validate](extending-modx/xpdo/class-reference/xpdoobject/validation/validate)
- [getValidator](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator)
- [remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove)