---
title: "getOne"
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone"
---

## xPDOObject::getOne()

Получает объект, связанный с этим экземпляром посредством отношения внешнего ключа.

Используйте это для 1:? (one:zero-or-one) или отношения 1:1, которые можно различить, установив обнуляемость поля, представляющего внешний ключ.

## Синтаксис

API Docs: [xPDOObject::getOne()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::getOne()>)

```php
xPDOObject|null &getOne (
   string $alias,
   [object $criteria = null],
   [boolean|integer $cacheFlag = true]
)
```

## Пример

Отобразите электронную почту пользователя `modUser` с идентификатором 1, у которого есть связанный объект с именем `modUserProfile`, у которого есть поле с именем «email» - для этого пользователя установлено «a@bc.com».

```php
$user = $modx->getObject('modUser',1);
$profile = $user->getOne('Profile');
echo $profile->get('email');
// prints "a@bc.com"
```

## Смотрите также

-   [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
-   [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
