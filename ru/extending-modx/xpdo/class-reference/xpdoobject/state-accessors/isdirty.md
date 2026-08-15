---
title: "isDirty"
translation: "extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isdirty"
---

## xPDOObject::isDirty()

Указывает, было ли поле объекта изменено (или никогда не сохранено).

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::isDirty()>

```php
boolean isDirty (string $key)
```

## Пример

Проверьте, был ли изменен объект Skrewt.

```php
$skrewt = $xpdo->getObject('Skrewt',1);

echo $skrewt->isDirty() ? 1 : 0; // prints 0

$skrewt->set('poisonous',false);

echo $skrewt->isDirty() ? 1 : 0; // prints 1
```
