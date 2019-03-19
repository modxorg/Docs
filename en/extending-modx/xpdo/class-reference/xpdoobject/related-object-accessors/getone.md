---
title: "getOne"
_old_id: "1176"
_old_uri: "2.x/class-reference/xpdoobject/related-object-accessors/getone"
---

## xPDOObject::getOne()

Gets an object related to this instance by a foreign key relationship.

Use this for 1:? (one:zero-or-one) or 1:1 relationships, which you can distinguish by setting the nullability of the field representing the foreign key.

## Syntax

API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoobject.class.html#%5CxPDOObject::getOne()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::getOne())

``` php 
xPDOObject|null &getOne (
   string $alias,
   [object $criteria = null],
   [boolean|integer $cacheFlag = true]
)
```

## Example

Echo the email of a modUser with ID 1, which has a related object called modUserProfile, that has a field called "email" - set as "a@bc.com" for this user.

``` php 
$user = $modx->getObject('modUser',1);
$profile = $user->getOne('Profile');
echo $profile->get('email');
// prints "a@bc.com"
```

## See Also

- [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
- [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")