---
title: "isDirty"
translation: "extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isdirty"
---

## xPDOObject::isDirty()

Указывает, было ли поле объекта изменено (или никогда не сохранено).

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#isDirty>

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
